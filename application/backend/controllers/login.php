<?php

/*
 * Login.php
 * Created by : Mr.Gurpreet Singh
 * Created on: 9 Feb,2015
 * Purpose: File is used to handle the login related functionality
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//require_once(FRONT_BASE_URL.'/en/wp-load.php');
//define('WP_USE_THEMES',TRUE);
class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Login.php
     * Function :index
     * Created by : Mr.Gurpreet Singh
     * Created on: 9 Feb,2015
     * Purpose: Function server the login functionality of the admin
     * */

    public function index() {
	

	//	redirect(BASEURL.'/login/logininwp');
        $postdata = $this->input->post(NULL, true);
        if (isset($postdata) && !empty($postdata)) {
            $this->load->model('user_model');
            $validate = $this->user_model->check_admin_login($postdata);
            if (count($validate) == 0) {
                $data['invalid_login'] = true;
                $data['message'] = INVALID_CREDENTIALS;
            } else {
             if (isset($postdata['remember']) && $postdata['remember'] == 1) {
                    $cookie = array(
                        'name' => 'user_cookie',
                        'value' => $validate['hash'],
                        'expire' => time() + (30 * 24 * 60 * 60),
                        'domain' => '.' . $this->config->item('domain'),
                        'path' => '/',
                        'prefix' => '',
                    );
                    set_cookie($cookie);
                }
                $this->session->set_userdata('userdata', $validate);
                $this->session->set_flashdata('success', SUCCESSFUL_LOGIN);
                redirect(BASEURL);
            }
        }
        $data["master_title"] = "Login";   // Please enter the title of page......
        $data["master_body"] = "login";   // Please enter the title of page......
        $this->load->theme('login', $data);  // Loading theme		
    }
	/*public function logininwp()
	{
		$this->load->model('user_model');
		$postdata = $this->input->post(NULL, true);
		$validate = $this->user_model->wp_login($postdata);
	}*/

}
