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
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {
            $data['logout_url'] = site_url('home/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('home/login'), 
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view('login',$data);
	}

    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('home/login');
    }
}
?>