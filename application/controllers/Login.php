<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller
{

   function  __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->helper('url');
        //$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        error_reporting(0);

    }

    public function index()
    {
        //if ($this->session->userdata('admin_login') == 1)
           // redirect(base_url() . 'admin', 'refresh');

        $this->load->view('login');
    }

    //Ajax login function
   function ajax_login()
    {
        $response = array();

        //Recieving post input of email, password from ajax request
        $email = $_POST["email"];
        $password = $_POST["password"];
        //$response['submitted_data'] = $_POST;

        //Validating login
        $login_status = $this->validate_login($email, $password);
        //$response['login_status'] = $login_status;
        if ($login_status == 'success') {
            redirect('admin', 'refresh');
        } elseif ($login_status == 'invalid') {
            $this->session->set_flashdata('login_failed', 'Login Failed');
            //$error = 0;
            redirect('login','refresh');
        }

        //Replying ajax request with validation response
        echo json_encode($response);
    }

    //Validating login from ajax request

    function validate_login($email = '', $password = '')
    {
        $credential = array('email' => $email, 'password' => $password);
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'admin');
            return 'success';
        }
        return 'invalid';
    }

    /*******LOGOUT FUNCTION *******/
    function logout()
    {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
}