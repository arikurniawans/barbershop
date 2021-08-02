<?php

class Auth_model extends CI_Model
{
    var $users = "users";

    public function logged_in()
    {
        return $this->session->userdata('id');
    }


    //fungsi check login
    public function check_login($data){
		$username = $data['username'];
        $password = $data['password'];		

        $cek = $this->db->get_where($this->users,array(
            'username' => $username
        ))->num_rows();
        $result = $this->db->get_where($this->users,array(
            'username'=>$username
        ))->result();

        if ($cek != 0){

            $pass_hash = $result[0]->password;

            if (password_verify($password,$pass_hash)){
					
                $hakAkses = $result[0]->id_user;
                $session['id'] = $result[0]->id_user;
                $session['nama'] = $result[0]->nama;
                $session['jenkel'] = $result[0]->jenkel;
                $session['alamat'] = $result[0]->alamat;
                $session['no_telpon'] = $result[0]->no_telpon;
                $session['user_status'] = $result[0]->user_status;


                $this->session->set_userdata($session);
                if($result[0]->user_status == 'owner'){
                    redirect('dashboard');
                }else if($result[0]->user_status == 'karyawan'){
                    redirect('transaksi');
                }
                
            }else{
                $this->session->set_flashdata("error1","failpassword");
                redirect('auth');
            }

        } else{
            $this->session->set_flashdata("error2","failaccount");
            redirect('auth');
        }
    }

    public function createPengguna($data)
    {
        $pengguna = $this->db->insert('users',$data);
        return $pengguna;
    }

    public function showPengguna()
    {
        $this->db->order_by('id_user','DESC');
        $this->db->where_not_in('user_status', 'owner');    
        $query = $this->db->get('users');     
        return $query;
    }

    public function editPass($id, $data)
    {
        $this->db->where('id_user',$id);
        $this->db->update('users',$data);
        return true;
    }
    public function deletePengguna($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('users');
        return true;
    }

    public function isNotLogin(){
        return $this->session->userdata('id') === null;
    }

}
