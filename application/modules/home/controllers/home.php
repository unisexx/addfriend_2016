<?php
class Home extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->template->set_layout('home');
		$this->template->build('index');
	}

	public function lang($lang)
	{
		$this->load->library('user_agent');
		$this->session->set_userdata('lang',$lang);

		redirect($this->agent->referrer());
	}

	public function login(){
		$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

		$user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me', array('fields' => 'id,name,email'));

								$rs = new User();
	            	$rs->where('facebook_id = '.$data['user_profile']['id'])->get();
								if(!$rs->exists()) // ถ้ายังไม่มีมี user นี้ใน database ให้บันทึกข้อมูล
            		{
            			$rs = new User();
									$_POST['facebook_id'] = $data['user_profile']['id'];
	                $_POST['facebook_name'] = $data['user_profile']['name'];
									$_POST['facebook_email'] = $data['user_profile']['email'];
									$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
									$_POST['status'] = 0;
	                $rs->from_array($_POST);
	                $rs->save();
									// $rs->check_last_query();
            		}

								// อัพเดทเวลาล้อกอิน
								$this->db->query("UPDATE users SET updated = '".date("Y-m-d H:i:s")."' where id = ".$rs->id);

								// created session
								$this->session->set_userdata('id',$rs->id);
                $this->session->set_userdata('facebook_id',$rs->facebook_id);

								redirect('home/my_profile');

            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

	}

    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        $this->session->sess_destroy();

        redirect('home');
    }

	public function inc_login_btn(){
		$this->load->library('facebook'); // Automatically picks appId and secret from config

        $data['login_url'] = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url('home/login'),
            'scope' => array("email") // permissions here
        ));

        $this->load->view('inc_login',$data);
	}

	public function my_profile(){
		if($this->session->userdata('facebook_id') != ""){
			$data['rs'] = new User($this->session->userdata('id'));
			$this->template->build('my_profile',$data);
		}else{
			redirect('home');
		}
	}

	public function my_profile_save(){
		$rs = new User();
		$rs->from_array($_POST);
		$rs->save();
		redirect('home/my_profile');
	}

	public function inc_home(){
		$data['rs'] = new User();
		$data['rs']->where("status != 0")->order_by('updated desc');
		$data['rs']->get_page(10);
		$this->load->view('inc_home',$data);
	}

	public function profile($id){
		$data['rs'] = new User($id);
		$this->template->build('profile',$data);
	}
}
?>
