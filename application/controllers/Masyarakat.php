<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_masyarakat');
    }


    public function index(){
        $this->load->view('masyarakat/header');
        //jika variabel session login_status == OK maka tampilkan laporan pengaduan
        if ($this->session->userdata('login_status')=='ok'){
            $this->load->view('masyarakat/aduan');
        }
        //jika tidak munculkan login
        else{
            $this->load->view('masyarakat/login');
        }
        
        
        $this->load->view('masyarakat/footer');
    }

    public function registrasi(){
        $this->load->view('masyarakat/header');
        $this->load->view('masyarakat/registrasi');
        $this->load->view('masyarakat/footer');
    }

    public function registrasi_user(){
        $this->validasi_form();

        if($this->form_validation->run()==FALSE){
            $this->registrasi();
        }else{

            $pass=md5($_POST['password']);
            $data=array(
                'nik'=> $_POST['nik'],
                'nama'=>$_POST['nama'],
                'username'=>$_POST['username'],
                'password'=>$pass,
                'telp'=>$_POST['telepon']
            );
            if ($this->M_masyarakat->tambahMasyarakat($data)){
                $this->index();
            }
        }
    }

    public function validasi_form(){
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
    }

    public function validasi_form_login(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function login(){
        $this->validasi_form_login();

        if ($this->form_validation->run()==FALSE){
            $this->index();
        }else{
            $pass=md5($_POST['password']);

            $data=array(
                'username'=>$_POST['username'],
                'password'=>$pass
            );

            $data=$this->M_masyarakat->login($data);

            if(count($data)>0){
                    $this->session->set_userdata('login_status', 'ok');
                    $this->session->set_userdata('nik', $data[0]['nik']);
                    $this->session->set_userdata('nama', $data[0]['nama']);

                    $this->index();
            }else{
                $this->index();
            }
        }
    }

    public function logout(){
        unset(
            $_SESSION['login_status'],
            $_SESSION['nik'],
            $_SESSION['nama']
    );

    $this->index();
    }

    public function form_aduan(){
        $this->load->view('masyarakat/header');
        $this->load->view('masyarakat/form_aduan');
        $this->load->view('masyarakat/footer');
    }
	
}