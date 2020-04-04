<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kamera extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kamera_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kamera/tbl_kamera_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kamera_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kamera_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kamera' => $row->id_kamera,
        'nama_kamera' => $row->nama_kamera,
		'warna' => $row->warna,
		'update_time' => $row->update_time,
	    );
            $this->template->load('template','kamera/tbl_kamera_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamera'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kamera/create_action'),
        'id_kamera' => set_value('id_kamera'),
	    'warna' => set_value('warna'),
	    'nama_kamera' => set_value('nama_kamera'),
	);
        $this->template->load('template','kamera/tbl_kamera_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'nama_kamera' => $this->input->post('nama_kamera',TRUE),
		'warna' => $this->input->post('warna',TRUE),
	    );

            $this->Kamera_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kamera'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kamera_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kamera/update_action'),
		'id_kamera' => set_value('id_kamera', $row->id_kamera),
        'nama_kamera' => set_value('nama_kamera', $row->nama_kamera),
		'warna' => set_value('warna', $row->warna),
	    );
            $this->template->load('template','kamera/tbl_kamera_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamera'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kamera', TRUE));
        } else {
            $data = array(
        'nama_kamera' => $this->input->post('nama_kamera',TRUE),
		'warna' => $this->input->post('warna',TRUE),
	    );

            $this->Kamera_model->update($this->input->post('id_kamera', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kamera'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kamera_model->get_by_id($id);

        if ($row) {
            $this->Kamera_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kamera'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamera'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_kamera', 'nama kamera', 'trim|required');
	$this->form_validation->set_rules('warna', 'warna', 'trim|required');

	$this->form_validation->set_rules('id_kamera', 'id_kamera', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_kamera.xls";
        $judul = "tbl_kamera";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Kamera");
	xlsWriteLabel($tablehead, $kolomhead++, "warna");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Time");

	foreach ($this->Kamera_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kamera);
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
        header("Content-Disposition: attachment;Filename=tbl_kamera.doc");

        $data = array(
            'tbl_kamera_data' => $this->Kamera_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kamera/tbl_kamera_doc',$data);
    }

}

/* End of file Kamera.php */
/* Location: ./application/controllers/Kamera.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-21 17:18:10 */
/* http://harviacode.com */