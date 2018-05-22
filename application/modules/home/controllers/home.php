<?php
class Home extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
	}

	function index()
	{
		$this->template->set_layout('home');
		meta_description("โสด เหงา ต้องการกำลังใจ หาเพื่อนพูดคุยปรับทุกข์เรื่องราวต่างๆ มาอยู่กับเราสิแล้วคุณจะไม่เหงาอีกต่อไป");
		$this->template->build('index');
	}

	public function lang($lang)
	{
		$this->load->library('user_agent');
		$this->session->set_userdata('lang',$lang);

		redirect($this->agent->referrer());
	}

	public function login(){
		//-------------------------------------------- Google Login --------------------------
		require_once('application/libraries/google.php');
		// หลังทำการล้อกอินด้วยอีเมล์ ระบบจะส่งรหัสมาทำการ authenticate ถ้าผ่านจะทำการสร้าง session ชื่อ access_token
		if (isset($_GET['code'])) {
		  $client->authenticate($_GET['code']);
		  // $_SESSION['access_token'] = $client->getAccessToken();
		  $this->session->set_userdata('access_token',$client->getAccessToken());
			if ($this->session->userdata('access_token') != "") {
			  $client->setAccessToken($this->session->userdata('access_token'));
				$user = $service->userinfo->get();
			}
		  //redirect('home/my_profile');

			$rs = new User();
			$rs->where('google_id = '.$user->id)->get();
			if(!$rs->exists()) // ถ้ายังไม่มีมี user นี้ใน database
			{
				$rs = new User();
				$_POST['login_type'] = 2;
				$_POST['google_id'] = $user->id;
				$_POST['google_name'] = $user->name;
				$_POST['google_email'] = $user->email;
				$_POST['google_link'] = $user->link;
				$_POST['google_picture_link'] = $user->picture;
				$_POST['display_name'] = $user->name;
				$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
				$_POST['status'] = 0;
				$rs->from_array($_POST);
				$rs->save();
				// $rs->check_last_query();
			}

			// อัพเดทเวลาล้อกอิน
			$this->db->query("UPDATE users SET updated = '".date("Y-m-d H:i:s")."', ip = '".$_SERVER['REMOTE_ADDR']."', google_picture_link = '".$user->picture."', google_name = '".$user->name."' where id = ".$rs->id);

			// created session
			$this->session->set_userdata('id',$rs->id);
			$this->session->set_userdata('login_type',$rs->login_type);
			$this->session->set_userdata('google_id',$rs->google_id);
			set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบ');
			redirect('home/my_profile');
		}

		redirect('home');
	}

	public function login_facebook(){
    	//-------------------------------------------- Facebook Login--------------------------
		$this->load->library('facebook'); // Automatically picks appId and secret from config
		$user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/'.$user, array('fields' => 'id,name,email'));

								$rs = new User();
								$rs->where('facebook_id = '.$data['user_profile']['id'])->get();
								if(!$rs->exists()) // ถ้ายังไม่มีมี user นี้ใน database ให้บันทึกข้อมูล
								{
			            			$rs = new User();
									$_POST['login_type'] = 1;
									$_POST['facebook_id'] = $data['user_profile']['id'];
	                				$_POST['facebook_name'] = $data['user_profile']['name'];
									$_POST['facebook_email'] = $data['user_profile']['email'];
									$_POST['display_name'] = $data['user_profile']['name'];
									$_POST['social_facebook'] = $data['user_profile']['id'];
									$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
									$_POST['status'] = 0;
					                $rs->from_array($_POST);
					                $rs->save();
									// $rs->check_last_query();
			          }

								// อัพเดทเวลาล้อกอิน
								$this->db->query("UPDATE users SET updated = '".date("Y-m-d H:i:s")."', ip = '".$_SERVER['REMOTE_ADDR']."', facebook_name = '".$data['user_profile']['name']."' where id = ".$rs->id);

								// created session
								$this->session->set_userdata('id',$rs->id);
								$this->session->set_userdata('login_type',$rs->login_type);
                				$this->session->set_userdata('facebook_id',$rs->facebook_id);
								set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบ');
								redirect('home/my_profile');

            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }
		
        redirect('home');
    }

	public function login_twitter(){
    	//-------------------------------------------- Twitter Login --------------------------
		require_once("application/libraries/twitter/twitteroauth.php");
		require_once('application/config/twconfig.php');
		if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {
		    // We've got everything we need
		    $twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
				// Let's request the access token
		    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
				// Save it in a session var
		    $_SESSION['access_token'] = $access_token;
				// Let's get the user's info
		    $user_info = $twitteroauth->get('account/verify_credentials');
				// Print user's info

			// echo '<pre>';
		    // print_r($user_info);
		    // echo '</pre><br/>';

		    if (isset($user_info->error)) {
		        // Something's wrong, go back to square 1
		        // header('Location: login-twitter.php');
		    } else {
					$rs = new User();
					$rs->where('twitter_id = '.$user_info->id)->get(1);
					if(!$rs->exists()) // ถ้ายังไม่มีมี user นี้ใน database
					{
						$rs = new User();
						$_POST['login_type'] = 3;
						$_POST['twitter_id'] = $user_info->id;
						$_POST['twitter_name'] = $user_info->name;
						$_POST['twitter_screen_name'] = $user_info->screen_name;
						$_POST['twitter_profile_image'] = str_replace("normal","400x400",$user_info->profile_image_url);
						$_POST['display_name'] = $user_info->name;
						$_POST['social_twitter'] = $user_info->screen_name;
						$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
						$_POST['status'] = 0;
						$rs->from_array($_POST);
						$rs->save();
						// $rs->check_last_query();
					}

					// อัพเดทเวลาล้อกอิน
					$this->db->query("UPDATE users SET updated = '".date("Y-m-d H:i:s")."', ip = '".$_SERVER['REMOTE_ADDR']."', twitter_profile_image = '".str_replace("normal","400x400",$user_info->profile_image_url)."', twitter_name = '".$user_info->name."' where id = ".$rs->id);

					// created session
					$this->session->set_userdata('id',$rs->id);
					$this->session->set_userdata('login_type',$rs->login_type);
					$this->session->set_userdata('twitter_id',$rs->twitter_id);
					set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบ');
					redirect('home/my_profile');
		    }
		}

        redirect('home');
    }
	
    public function logout(){
    	//----------- Facebook Logout -----------------------------
        $this->load->library('facebook');
        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.
        $this->session->sess_destroy();

        redirect('home');
    }

	public function inc_login_btn(){
		//--------------------- Google Button -------------------------------
		// $this->load->library('google');
		require_once('application/libraries/google.php');
		// เช็ก session ถ้าเป็นค่าว่าง ให้ทำการสร้างปุ่มสำหรับล้อกอิน google
		if ($this->session->userdata('access_token') == "") {
		  $data['authUrl'] = $client->createAuthUrl();
		}

		//--------------------- Facebook Button -------------------------------
		$this->load->library('facebook'); // Automatically picks appId and secret from config
	    $data['login_url'] = $this->facebook->getLoginUrl(array(
	        'redirect_uri' => site_url('home/login_facebook'),
	        'scope' => array("email") // permissions here
	    ));

    $this->load->view('inc_login',$data);
	}

	function oath_twitter(){
		redirect('application/libraries/login-twitter.php');
	}

	public function my_profile(){
		if($this->session->userdata('id') != ""){
			$data['rs'] = new User($this->session->userdata('id'));
			$this->db->close();
			$this->template->build('my_profile',$data);
		}else{
			set_notify('error', 'กรุณาเข้าสู่ระบบ');
			redirect('home');
		}
	}

	public function my_profile_save(){
		if($_POST){
			$rs = new User();

			// ถ้ามีการอัพโหลดรูป
			// if($_FILES['upload']['tmp_name'] != ""){
				// $image = file_get_contents($_FILES['upload']['tmp_name']);
				// $client_id="94af93212e2e617";//Your Client ID here
				// $ch = curl_init();
				// curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
				// curl_setopt($ch, CURLOPT_POST, TRUE);
				// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				// curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Authorization: Client-ID ' . $client_id ));
				// curl_setopt($ch, CURLOPT_POSTFIELDS, array( 'image' => base64_encode($image) ));
				// $reply = curl_exec($ch);
				// curl_close($ch);
				// $reply = json_decode($reply);
				// $_POST['image'] = @$reply->data->link;
			// }

			if($_POST['image'] != ""){ $_POST['image'] = strip_tags($_POST['image']); }
			$_POST['display_name'] = strip_tags($_POST['display_name']);
			$_POST['detail'] = strip_tags($_POST['detail']);
			if($_POST['social_line'] != ""){ $_POST['social_line'] = strip_tags($_POST['social_line']); }
			if($_POST['social_instagram'] != ""){ $_POST['social_instagram'] = strip_tags($_POST['social_instagram']); }
			if($_POST['social_twitter'] != ""){ $_POST['social_twitter'] = strip_tags($_POST['social_twitter']); }
			if($_POST['social_facebook'] != ""){ $_POST['social_facebook'] = strip_tags($_POST['social_facebook']); }
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('home/my_profile');
	}

	public function inc_home(){
		$condition = " 1=1 ";
		if(@$_GET['sex_id']){ $condition .= " and sex_id = ".$_GET['sex_id']; }
		if(@$_GET['province_id']){ $condition .= " and province_id = ".$_GET['province_id']; }
		if(@$_GET['social']){ $condition .= " and ".$_GET['social']." <> ''"; }
		if(@$_GET['age_start']){
			@$_GET['age_end'] = (@$_GET['age_end'] != "")? $_GET['age_end'] : 75 ;
			 $condition .= " and (age between ".$_GET['age_start']." and ".$_GET['age_end'].")";
		}
		if(@$_GET['age_end']){
			@$_GET['age_start'] = (@$_GET['age_start'] != "")? $_GET['age_start'] : 12 ;
			 $condition .= " and (age between ".$_GET['age_start']." and ".$_GET['age_end'].")";
		}
		$sql = "SELECT
						users.id,
						users.facebook_id,
						users.google_picture_link,
						users.twitter_profile_image,
						users.image,
						users.display_name,
						users.age,
						users.detail,
						users.vote,
						users.social_line,
						users.social_instagram,
						users.social_whatsapp,
						users.social_facebook,
						users.social_twitter,
						users.social_beetalk,
						sexs.color sex_color,
						sexs.title sex_title,
						provinces.`name` province_name
					FROM
						users
					LEFT JOIN provinces ON users.province_id = provinces.id
					LEFT JOIN sexs ON users.sex_id = sexs.id
					WHERE ".$condition."
					AND STATUS != 0
					AND banned is null
					AND hide is null
					ORDER BY
						updated desc";
		// echo $sql;

		$rs = new User();
    	$data['rs'] = $rs->sql_page($sql, 10);
		$data['pagination'] = $rs->sql_pagination;

		$this->db->close();
		$this->load->view('inc_home',$data);
	}

	public function profile($id){
		$data['rs'] = new User($id);
		if($data['rs']->hide != "" or $data['rs']->banned != ""){
			redirect('home');
		}
		$this->template->title('หาเพื่อนไลน์ '.$data['rs']->display_name.' - Addfriend');
		// $this->template->append_metadata('<meta property="og:image" content="'.check_image_url($data['rs']->image,$data['rs']->facebook_id,$data['rs']->google_picture_link,"original").'" />');
		meta_description($data['rs']->detail);
		$this->db->close();
		$this->template->build('profile',$data);
	}

	public function img_upload(){
		$this->template->build('img_upload');
	}

	function google_login(){
		$this->load->view('google_login');
	}

	function test2(){
		echo '<pre>';
		var_dump($this->session->userdata('access_token'));
		echo '</pre>';
		echo'<a href="home/logout">logout</a>';
	}

	function inc_sidebar(){
		$data['banners'] = new Banner();
		$data['banners']->where("start_date <= date(sysdate()) and end_date >= date(sysdate()) and status = 'approve'")->get();
		$this->load->view('inc_sidebar',$data);
	}

	function vote(){
		if($_POST){
			$user_id = $_POST['user_id'];
			$session_id = $this->session->userdata('session_id');
        	$check = $this->db->query("select id from jams where user_id = ".$user_id." and session_id = '".$session_id."' limit 1")->row_array();
			if(empty($check)){

				$_POST['user_id'] = $user_id;
				$_POST['member_id'] = @$this->session->userdata('id');
				$_POST['session_id'] = $session_id;
				$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
				$_POST['created'] = date("Y-m-d H:i:s");
				$this->db->insert('jams', $_POST);

				$this->db->query("UPDATE users SET vote = vote+1, updated = '".date("Y-m-d H:i:s")."' where id = ".$user_id);

				echo "yes";
			}else{
				echo "no";
			}
		}
	}

	function banned($id){
		if($this->session->userdata('facebook_id') == '1122018497830648'){
			$this->db->query("UPDATE users SET banned = 1 where id = ".$id);
			set_notify('success', 'ดำเนินการแบนเรียบร้อย');
		}else{
			set_notify('error', 'คำสั่งไม่ถูกต้อง');
		}
		redirect('home');
	}

	function unbanned($id){
		if($this->session->userdata('facebook_id') == '1122018497830648'){
			$this->db->query("UPDATE users SET banned = null where id = ".$id);
			set_notify('success', 'ดำเนินการปลดแบนเรียบร้อย');
		}else{
			set_notify('error', 'คำสั่งไม่ถูกต้อง');
		}
		redirect('home');
	}

	function closed($id){
		if($this->session->userdata('facebook_id') == '1122018497830648'){
			$this->db->query("UPDATE users SET status = 0 where id = ".$id);
			set_notify('success', 'ดำเนินการแบนเรียบร้อย');
		}else{
			set_notify('error', 'คำสั่งไม่ถูกต้อง');
		}
		redirect('home');
	}

	function user_delete($id){
		if($this->session->userdata('facebook_id') == '1122018497830648'){
			$user = new User($id);
            $user->delete();
            set_notify('success', lang('delete_data_complete'));
		}else{
			set_notify('error', 'คำสั่งไม่ถูกต้อง');
		}
		redirect('home');
	}

	function banner(){
		if($this->session->userdata('facebook_id') == '1122018497830648'){
			$data['rs'] = new Banner();
	        $data['rs']->order_by('end_date asc')->get_page();
	        $this->template->append_metadata(js_checkbox('approve'));

			$this->template->build('banner',$data);
		}else{
			set_notify('error', 'คำสั่งไม่ถูกต้อง');
			redirect('home');
		}
	}

	function banner_form($id=false){
		if($this->session->userdata('facebook_id') == '1122018497830648'){
			$data['banner'] = new Banner($id);
			$this->template->build('banner_form',$data);
		}else{
			set_notify('error', 'คำสั่งไม่ถูกต้อง');
			redirect('home');
		}
	}

	function banner_save(){
		if($_POST)
        {
            $banner = new Banner($id);
			$_POST['status'] = "approve";
            $_POST['start_date'] = Date2DB($_POST['start_date']);
            $_POST['end_date'] = Date2DB($_POST['end_date']);
            $banner->from_array($_POST);
            $banner->save();
            set_notify('success', lang('save_data_complete'));
        }
        redirect('home/banner');
	}

	function banner_delete($id=FALSE)
    {
        if($id)
        {
            $banner = new Banner($id);
            $banner->delete();
            set_notify('success', lang('delete_data_complete'));
        }
        redirect('home/banner');
    }
	
	function test(){
		session_start();
		require_once("application/libraries/Facebook/php-graph-sdk-5.0.0/src/Facebook/autoload.php");
		$this->template->build('test');
	}

	function info(){
		// phpinfo();
	}
}
?>
