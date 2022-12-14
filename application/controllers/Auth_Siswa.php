<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // if($this->session->userdata('nis')) {
        //     redirect('user');
        // }

        $this->form_validation->set_rules('nis', 'NIS', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'form login';
            $this->load->view('template/header', $data);
            $this->load->view('siswa/login');
            $this->load->view('template/footer');
        } else {
            // validasi berhasil
            $this->_login();
        }
    }

    private function _login()
    {
        $siswa = $this->input->post('nis');
        $password = $this->input->post('password');

        $user = $this->db->get_where('siswa', ['nis' => $nis])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nis' => $user['nis'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    }else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function registrasi() {
        $data['judul'] = 'Registrasi Siswa';
        $this->load->view('template/header', $data);
        $this->load->view('siswa/registrasi_siswa');
        $this->load->view('template/footer');
    }
}
