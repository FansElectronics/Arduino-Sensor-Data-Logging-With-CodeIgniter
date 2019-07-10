<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['app_name'] = 'ESP8266 IoT Data Logging';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

        $data['datalog'] = $this->db->get('monitoring')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
    }
}
