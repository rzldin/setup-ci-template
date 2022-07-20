<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
        check_not_login();
    }

    public function index()
    {
        $data['user'] = $this->auth_m->get()->result();

        $this->template->load('template','user/view', $data);
    }

    public function cek_email()
    {
        $email = $this->input->post('data');
        $cek_data = $this->auth_m->get_by_email($email)->row_array();
        $return_data = ($cek_data) ? "ADA" : "TIDAK ADA";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    public function simpan()
    {
        $post = $this->input->post();
        // var_dump($post);die;
        $this->auth_m->save($post);

        $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
        redirect('user');
    }

    public function get_edit()
    {
        $id   = $this->input->post('id');
        $data = $this->auth_m->get($id)->row_array();
        
        header('Content-Type: application/json');
        echo json_encode($data); 
    }

    # Proses Update Data User
    public function update()
    {
        $post = $this->input->post();
        $this->auth_m->update($post);

        $this->session->set_flashdata('pesan','Data Pengguna Berhasil Di Update');
        redirect('user');
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->auth_m->hapus($id);

        $this->session->set_flashdata('pesan','Data Pengguna Berhasil Di Hapus');
        redirect('user');
    }

}