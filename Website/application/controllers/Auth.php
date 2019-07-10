<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username wajib diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password wajib diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $data['app_name'] = 'ESP8266 IoT Data Logging';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer', $data);
        } else {
            //validasinya
            $this->_login();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-check"></i> Berhasil!</h4>Kamu berhasil keluar!</div>');
        redirect('auth');
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        if ($user) {
            if ($user['is_active'] == '1') {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');                        // arahkan ke user
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Password Error!</h4>Kata sandi salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i>Username Error!</h4>Username ini belum diaktifkan!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i> Username Error!</h4>Usernanem ini belum terdaftar!</div>');
            redirect('auth');
        }
    }
}
