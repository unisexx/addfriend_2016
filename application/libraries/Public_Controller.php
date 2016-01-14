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
        
        // Set Language
        if(!$this->session->userdata('lang')) $this->session->set_userdata('lang','th');
       
        if(@$this->session->userdata('lang') == "th"){
            $this->lang->load('public','thai');
        }elseif(@$this->session->userdata('lang') == "en"){
            $this->lang->load('public','english');
        }else{
            $this->lang->load('public','china');
        }
	}
}
?>