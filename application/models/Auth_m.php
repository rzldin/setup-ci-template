<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model
{   
    

    # LOGIN ADMIN
    public function loginAdmin($post)
    {
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        $this->db->select();
        $this->db->from('pengguna');
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']) );
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        $this->db->select();
        $this->db->from('pengguna');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

     # cek get Berdasarkan No Peserta
     public function get_by_email($email)
     {
         $this->db->select();
         $this->db->from('pengguna');
         $this->db->where('email', $email);
         $query = $this->db->get();
         return $query;
     } 
     
     # fungsi register peserta individu
     public function save($post)
     {
         $data = [
             'username'  => $post['username'],
             'email'     => $post['email'],
             'password'  => md5($post['password']),
             'deskripsi' => $post['deskripsi'],
             'created_at'=> date('Y-m-d H:i:s')
         ];
 
         $this->db->insert('pengguna', $data);
     }

     public function update($post)
     {
         $data = [
             'username'  => $post['username'],
             'email'     => $post['email'],
             'password'  => md5($post['password']),
             'deskripsi' => $post['deskripsi']
         ];
 
         $this->db->where('id', $post['id']);
         $this->db->update('pengguna', $data);
     }

     public function hapus($id)
     {
         $this->db->where('id', $id);
         $this->db->delete('pengguna');
     }

    
     
}