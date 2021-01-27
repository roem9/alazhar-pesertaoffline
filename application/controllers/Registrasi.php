<?php
    class Registrasi extends CI_CONTROLLER {
        public function __construct(){
            parent::__construct();
            $this->load->model('Admin_model');
        }

        public function index(){
            $data['title'] = 'Form Registrasi';
            $this->load->view("templates/header-login", $data);
            $this->load->view("registrasi/formregistrasi");
            $this->load->view("templates/footer");
        }
   
        public function add_peserta(){
            $tgl_daftar = date("Y-m-d");
            $data = [
                'tgl_daftar' => $tgl_daftar,
                'nik' => $this->input->post('nik'),
                'nama_indo' => $this->input->post('nama_indo'),
                't4_lahir_indo' => $this->input->post('t4_lahir_indo'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk' => $this->input->post('jk'),
                'desa_kel_indo' => $this->input->post('desa_kel_indo'),
                'kec_indo' => $this->input->post('kec_indo'),
                'kota_kab_indo' => $this->input->post('kota_kab_indo'),
                'no_wa' => $this->input->post('no_wa'),
                // 'detail_pembayaran' => $this->input->post('detail_pembayaran'),
                'email' => $this->input->post('email'),
            ];

            $this->Admin_model->add_data("peserta", $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-check-circle text-success mr-1"></i> Berhasil mendaftarkan data Anda. Silahkan menghubungi Admin<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect("registrasi");
        }
    }