<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->model('Kamera_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','peminjaman/tbl_peminjaman_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Peminjaman_model->json();
    }
     function fetch_tipe_kamera()
    {
      if($this->input->post('id_kamera'))
      {
         echo $this->Kamera_model->getlayananbyidkamera($this->input->post('id_kamera'));
     }
 }
    public function jsonselesai() {
        header('Content-Type: application/json');
        echo $this->Peminjaman_model->jsonselesai();
    }

    public function read($id) 
    {
        $row = $this->Peminjaman_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_pemesanan' => $row->id_pemesanan,
              'nama_pemesan' => $row->nama_pemesan,
              'alamat' => $row->alamat,
              'no_hp' => $row->no_hp,
              'id_kamera' => $row->nama_kamera,
              'id_tipe_kamera' => $row->nama_tipe_kamera,
              'waktu_pemesanan' => $row->waktu_pemesanan,
              'waktu_pengambilan' => $row->waktu_pengambilan,
              'waktu_pengembalian' => $row->waktu_pengembalian,
              'keterangan' => $row->keterangan,
              'status_pinjaman' => $row->status_pinjaman,
          );
            $this->template->load('template','peminjaman/tbl_peminjaman_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('peminjaman/create_action'),
            'id_pemesanan' => set_value('id_pemesanan'),
            'nama_pemesan' => set_value('nama_pemesan'),
            'alamat' => set_value('alamat'),
            'no_hp' => set_value('no_hp'),
            'id_kamera' => set_value('id_kamera'),
            'id_tipe_kamera' => set_value('id_tipe_kamera'),
            'waktu_pengambilan' => set_value('waktu_pengambilan'),
            'waktu_pengembalian' => set_value('waktu_pengembalian'),
            'keterangan' => set_value('keterangan'),
        );
        $this->template->load('template','peminjaman/tbl_peminjaman_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'nama_pemesan' => $this->input->post('nama_pemesan',TRUE),
              'alamat' => $this->input->post('alamat',TRUE),
              'no_hp' => $this->input->post('no_hp',TRUE),
              'id_kamera' => $this->input->post('id_kamera',TRUE),
              'id_tipe_kamera' => $this->input->post('id_tipe_kamera',TRUE),
              'waktu_pengambilan' => $this->input->post('waktu_pengambilan',TRUE),
              'waktu_pengembalian' => $this->input->post('waktu_pengembalian',TRUE),
              'keterangan' => $this->input->post('keterangan',TRUE),
          );

            $this->Peminjaman_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('peminjaman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Peminjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('peminjaman/update_action'),
                'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
                'nama_pemesan' => set_value('nama_pemesan', $row->nama_pemesan),
                'alamat' => set_value('alamat', $row->alamat),
                'no_hp' => set_value('no_hp', $row->no_hp),
                'id_kamera' => set_value('id_kamera', $row->id_kamera),
                'id_tipe_kamera' => set_value('id_tipe_kamera', $row->id_tipe_kamera),
                'waktu_pengambilan' => set_value('waktu_pengambilan', $row->waktu_pengambilan),
                'waktu_pengembalian' => set_value('waktu_pengembalian', $row->waktu_pengembalian),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );
            $this->template->load('template','peminjaman/tbl_peminjaman_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemesanan', TRUE));
        } else {
            $data = array(
              'nama_pemesan' => $this->input->post('nama_pemesan',TRUE),
              'alamat' => $this->input->post('alamat',TRUE),
              'no_hp' => $this->input->post('no_hp',TRUE),
              'id_kamera' => $this->input->post('id_kamera',TRUE),
              'id_tipe_kamera' => $this->input->post('id_tipe_kamera',TRUE),
              'waktu_pengambilan' => $this->input->post('waktu_pengambilan',TRUE),
              'waktu_pengembalian' => $this->input->post('waktu_pengembalian',TRUE),
              'keterangan' => $this->input->post('keterangan',TRUE),
          );

            $this->Peminjaman_model->update($this->input->post('id_pemesanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peminjaman'));
        }
    }

    public function update_status($id,$pil) 
    {
        if ($pil=='belum') {
           $data = array(
            'status_pinjaman' =>'1'
        );
       }else{
           $data = array(
            'status_pinjaman' =>'0'
        );
       }

       $this->Peminjaman_model->update($id, $data);
       $this->session->set_flashdata('message', 'Update Record Success');
       redirect(site_url('peminjaman'));

   }

   public function delete($id) 
   {
    $row = $this->Peminjaman_model->get_by_id($id);

    if ($row) {
        $this->Peminjaman_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('peminjaman'));
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('peminjaman'));
    }
}

public function _rules() 
{
   $this->form_validation->set_rules('nama_pemesan', 'nama pemesan', 'trim|required');
   $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
   $this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
   $this->form_validation->set_rules('id_kamera', 'nama kamera', 'trim|required');
   $this->form_validation->set_rules('id_tipe_kamera', 'nama tipe kamera', 'trim|required');
   $this->form_validation->set_rules('waktu_pengambilan', 'waktu pengambilan', 'trim|required');
   $this->form_validation->set_rules('waktu_pengembalian', 'waktu pengembalian', 'trim|required');
   $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

   $this->form_validation->set_rules('id_pemesanan', 'id_pemesanan', 'trim');
   $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

public function excel()
{
    $this->load->helper('exportexcel');
    $namaFile = "tbl_peminjaman.xls";
    $judul = "tbl_peminjaman";
    $tablehead = 0;
    $tablebody = 1;
    $nourut = 1;
        //penulisan header
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=" . $namaFile . "");
    header("Content-Transfer-Encoding: binary ");

    xlsBOF();

    $kolomhead = 0;
    xlsWriteLabel($tablehead, $kolomhead++, "No");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Pemesan");
    xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
    xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Kamera");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Tipe Kamera");
    xlsWriteLabel($tablehead, $kolomhead++, "Waktu Pemesanan");
    xlsWriteLabel($tablehead, $kolomhead++, "Waktu Pengambilan");
    xlsWriteLabel($tablehead, $kolomhead++, "Waktu Pengembalian");
    xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

    foreach ($this->Peminjaman_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_pemesan);
        xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_kamera);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_tipe_kamera);
        xlsWriteLabel($tablebody, $kolombody++, $data->waktu_pemesanan);
        xlsWriteLabel($tablebody, $kolombody++, $data->waktu_pengambilan);
        xlsWriteLabel($tablebody, $kolombody++, $data->waktu_pengembalian);
        xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}

public function word()
{
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=tbl_peminjaman.doc");

    $data = array(
        'tbl_peminjaman_data' => $this->Peminjaman_model->get_all(),
        'start' => 0
    );

    $this->load->view('peminjaman/tbl_peminjaman_doc',$data);
}

}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-20 10:33:29 */
/* http://harviacode.com */