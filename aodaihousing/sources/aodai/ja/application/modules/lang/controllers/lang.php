<?php
class Lang extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }
	
	
    function index($language = "") {
        
    }
	
    function switchLanguage($language = "") {
        echo $language = $this->uri->segment(2);
        exit ;
        $language = ($language != "") ? $language : "jp";
        
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER']);
    }
}