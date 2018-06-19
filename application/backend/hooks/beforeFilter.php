<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class beforeFilter {

    public function chechAuthenticationForValidRedirection() {

        $this->CI = & get_instance();
        $controller = $this->CI->router->class;
        $this->CI->load->model('user_model');
        $this->CI->load->helper('cookie');
        $this->CI->load->library('session');
        $cookie = get_cookie('user_cookie');
        if (!empty($cookie) && $controller == 'login') {
            $validate = $this->CI->user_model->getAdminByCookie($cookie);
            if (count($validate) == 0) {
                delete_cookie('user_cookie');
                redirect(BASEURL . '/login');
            } else {
                redirect(BASEURL);
            }
        }

        $userdata = $this->CI->session->userdata('userdata');
        $userid = $userdata['id'];
        if (isset($userid) && !empty($userid)) {
            $validate = $this->CI->user_model->getAdminByUserId($userid);
            if (count($validate) != 0) {
                if ($controller == 'login') {
                    redirect(BASEURL);
                }
            } else {
                if ($controller != 'login') {
                    redirect(BASEURL . '/login');
                }
            }
        } else {
            if ($controller != 'login') {
                redirect(BASEURL . '/login');
            }
        }
    }
}
