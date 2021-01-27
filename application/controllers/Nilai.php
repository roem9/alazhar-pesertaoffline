<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    
    public function input($id_kelas, $pelajaran){
        $kelas = $this->Admin_model->get_one("kelas", ["MD5(id_kelas)" => $id_kelas, "status" => "aktif"]);
        $materi = $this->Admin_model->get_one("pelajaran_kelas", ["program" => $kelas['program'], "md5(pelajaran)" => $pelajaran]);
        if($kelas && $materi){
            $peserta = $this->Admin_model->get_all("kelas_peserta", ["id_kelas" => $kelas['id_kelas']]);
            
            $data['peserta'] = [];
            foreach ($peserta as $i => $peserta) {
                $dataPeserta = $this->Admin_model->get_one("peserta", ["id_peserta" => $peserta['id_peserta']]);
                $data['peserta'][$i] = $dataPeserta;
                $nilai = $this->Admin_model->get_one("nilai_peserta", ["id_kelas" => $kelas['id_kelas'], "id_peserta" => $peserta['id_peserta'], "pelajaran" => $materi['pelajaran']]);
                if($nilai) $data['peserta'][$i]['nilai'] = $nilai['nilai'];
                else $data['peserta'][$i]['nilai'] = 0;
            }

            usort($data['peserta'], function($a, $b) {
                return $a['nama_indo'] <=> $b['nama_indo'];
            });

            $data['kelas'] = $kelas;
            $data['pelajaran'] = $materi['pelajaran'];

            $data['title'] = "Form Input Nilai '".$materi['pelajaran']."' Kelas '".$kelas['nama_kelas']."'";
            $this->load->view("templates/header-login", $data);
            $this->load->view("pages/nilai/form-input-nilai", $data);
            $this->load->view("templates/footer");

            // var_dump($data);
        } else {
            echo "link error";
        }
    }
}

/* End of file Nilai.php */
