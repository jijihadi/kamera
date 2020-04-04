<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipe_kamera extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipe_kamera_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tipe_kamera/tbl_tipe_kamera_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tipe_kamera_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tipe_kamera_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tipe_kamera' => $row->id_tipe_kamera,
		'id_kamera' => $row->nama_kamera,
        'nama_tipe_kamera' => $row->nama_tipe_kamera,
		'warna' => $row->tipe_warna,
		'update_at' => $row->update_at,
	    );
            $this->template->load('template','tipe_kamera/tbl_tipe_kamera_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipe_kamera'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tipe_kamera/create_action'),
	    'id_tipe_kamera' => set_value('id_tipe_kamera'),
        'id_kamera' => set_value('id_kamera'),
	    'warna' => set_value('warna'),
	    'nama_tipe_kamera' => set_value('nama_tipe_kamera'),
	);
        $this->template->load('template','tipe_kamera/tbl_tipe_kamera_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kamera' => $this->input->post('id_kamera',TRUE),
        'nama_tipe_kamera' => $this->input->post('nama_tipe_kamera',TRUE),
		'warna' => $this->input->post('warna',TRUE),
	    );

            $this->Tipe_kamera_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tipe_kamera'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tipe_kamera_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tipe_kamera/update_action'),
		'id_tipe_kamera' => set_value('id_tipe_kamera', $row->id_tipe_kamera),
		'id_kamera' => set_value('id_kamera', $row->id_kamera),
        'nama_tipe_kamera' => set_value('nama_tipe_kamera', $row->nama_tipe_kamera),
		'warna' => set_value('warna', $row->nama_tipe_kamera),
	    );
            $this->template->load('template','tipe_kamera/tbl_tipe_kamera_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipe_kamera'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tipe_kamera', TRUE));
        } else {
            $data = array(
		'id_kamera' => $this->input->post('id_kamera',TRUE),
        'nama_tipe_kamera' => $this->input->post('nama_tipe_kamera',TRUE),
		'warna' => $this->input->post('warna',TRUE),
	    );

            $this->Tipe_kamera_model->update($this->input->post('id_tipe_kamera', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tipe_kamera'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tipe_kamera_model->get_by_id($id);

        if ($row) {
            $this->Tipe_kamera_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tipe_kamera'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipe_kamera'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kamera', 'Nama kamera', 'trim|required');
    $this->form_validation->set_rules('nama_tipe_kamera', 'nama tipe kamera', 'trim|required');
	$this->form_validation->set_rules('warna', 'warna tipe kamera', 'trim|required');

	$this->form_validation->set_rules('id_tipe_kamera', 'id_tipe_kamera', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_tipe_kamera.xls";
        $judul = "tbl_tipe_kamera";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kamera");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Tipe Kamera");
	xlsWriteLabel($tablehead, $kolomhead++, "Warna Tipe Kamera");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Time");

	foreach ($this->Tipe_kamera_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kamera);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_tipe_kamera);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_time);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_tipe_kamera.doc");

        $data = array(
            'tbl_tipe_kamera_data' => $this->Tipe_kamera_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tipe_kamera/tbl_tipe_kamera_doc',$data);
    }

}

/* End of file Tipe_kamera.php */
/* Location: ./application/controllers/Tipe_kamera.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-21 17:18:33 */
/* http://harviacode.com */