<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
    }

    public function index()
    {
        check_already_login();
        $this->load->view('loginAdmin');
    }

    # Proses Login
    public function prosesLogin()
    {
        $post = $this->input->post(null, TRUE);

        if (isset($post['login'])) {

            $query = $this->auth_m->loginAdmin($post);

            if ($query->num_rows() > 0) {

                $row = $query->row();
                $sesi = [
                    'userid'     => $row->id,
                    'username'   => $row->username,
                    'email'      => $row->email,
                    'role'       => 'admin',
                    'deskripsi'  => $row->deskripsi
                ];

                $this->session->set_userdata($sesi);
                $this->session->set_flashdata('pesan', 'Selamat, Anda berhasil Login');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda gagal Login');
                redirect('login');
            }
        }
    }

    # Proses Logout
    public function logout()
    {
        $sesi = ['username', 'userid'];
        $this->session->unset_userdata($sesi);
        $this->session->set_flashdata('pesan', 'Anda berhasil Logout');
        redirect('login');
    }
}
