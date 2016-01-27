<?php
class Public_Controller extends Master_Controller
{
	function __construct()
	{
		parent::__construct();
		
		header('Content-type: text/html; charset=UTF-8');
		$this->template->title('Addfriend 2016');
		$this->template->set_theme('addfriend');
    	$this->template->set_layout('layout');
		$this->template->title('หาเพื่อน หาแฟน หากิ๊ก หาคู่ หาเพื่อนเล่นเกม แลกไอดีไลน์ - Addfriend');
		// Set js
		$this->lang->load('admin');
		$this->template->append_metadata(js_notify());
		
		meta_description();
		$this->template->append_metadata( meta('keywords',"โสด,เหงา,LINE,instagram,facebook,whatsapp,BBM,Sticker,Sticker LINE,สติ๊กเกอร์,หาเพื่อน,หาแฟน,หากิ๊ก,หาคู่,แลกไอดีไลน์,หาเพื่อนไลน์,หาเพื่อน LINE,หาเพื่อน instagram,หาเพื่อน facebook,หาเพื่อน whatsapp,หาเพื่อน BBM,หาเพื่อนชาย,หาเพื่อนหญิง,หาเพื่อนเกย์,หาเพื่อนทอม,หาเพื่อนดี้,หาเพื่อนสาวประเภทสอง,หาเพื่อนหน้าตาดี,หาเพื่อนเล่นเกม,คุ้กกี้รัน,cookie run,เกมเศรษฐี,Let's Get Rich,LINE ranger"));
        
        // Set Language
        // if(!$this->session->userdata('lang')) $this->session->set_userdata('lang','th');
//        
        // if(@$this->session->userdata('lang') == "th"){
            // $this->lang->load('public','thai');
        // }elseif(@$this->session->userdata('lang') == "en"){
            // $this->lang->load('public','english');
        // }else{
            // $this->lang->load('public','china');
        // }
	}
}
?>