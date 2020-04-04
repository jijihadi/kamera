<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Peminjaman_model');
		$this->load->model('Kamera_model');
		$this->load->model('Tipe_kamera_model');


	}

	public function index()
	{
		$datapeminjaman = $this->Peminjaman_model->get_all_peminjaman();
		$custompeminjaman = array();
		foreach ($datapeminjaman as $key => $value) {
			$datetime = new DateTime($value->waktu_pengambilan);
			$pecahtanggal= explode("-", $datetime->format('Y-m-d'));
			$pecahwaktu= explode(":", $datetime->format('H:i:s'));
			$pecahtanggal[1]=$pecahtanggal[1]-1;

			$datetime1 = new DateTime($value->waktu_pengembalian);
			$pecahtanggal1= explode("-", $datetime1->format('Y-m-d'));
			$pecahwaktu1= explode(":", $datetime1->format('H:i:s'));
			$pecahtanggal1[1]=$pecahtanggal1[1]-1;

			$temp = array('Id' => $value->id_pemesanan,
				'Subject' => $value->nama_pemesan,
				'StartTime' => "new Date($pecahtanggal[0],$pecahtanggal[1],$pecahtanggal[2],$pecahwaktu[0],$pecahwaktu[1])",
				'EndTime' => "new Date($pecahtanggal1[0],$pecahtanggal1[1],$pecahtanggal1[2],$pecahwaktu1[0],$pecahwaktu1[1])",
				'Description' => $value->alamat.'/'.$value->keterangan,
				'Location' => $value->no_hp,
				'TaskId' => $value->id_tipe_kamera,
				'ProjectId' => $value->id_kamera );
			array_push($custompeminjaman, $temp);
		}
		$data['datakamera'] = $this->Kamera_model->get_all();
		$data['datatipekamera'] = $this->Tipe_kamera_model->get_all();
		$data['datapinjaman'] =$custompeminjaman;
        $this->template->load('template','dashboard/dashboard',$data);
		// echo '<pre>';
		// print_r($data['datatipekamera']);
		// echo '</pre>';
		
	}
	public function dashboard2()
	{
		$datapeminjaman = $this->Peminjaman_model->get_all_pembelian();
		$custompeminjaman = array();
		foreach ($datapeminjaman as $key => $value) {
			$datetime = new DateTime($value->waktu_pengambilan);
			$pecahtanggal= explode("-", $datetime->format('Y-m-d'));
			$pecahwaktu= explode(":", $datetime->format('H:i:s'));
			$pecahtanggal[1]=$pecahtanggal[1]-1;

			$datetime1 = new DateTime($value->waktu_pengembalian);
			$pecahtanggal1= explode("-", $datetime1->format('Y-m-d'));
			$pecahwaktu1= explode(":", $datetime1->format('H:i:s'));
			$pecahtanggal1[1]=$pecahtanggal1[1]-1;

			$temp = array('Id' => $value->id_pemesanan,
				'Subject' => $value->nama_pemesan,
				'StartTime' => "new Date($pecahtanggal[0],$pecahtanggal[1],$pecahtanggal[2],$pecahwaktu[0],$pecahwaktu[1])",
				'EndTime' => "new Date($pecahtanggal1[0],$pecahtanggal1[1],$pecahtanggal1[2],$pecahwaktu1[0],$pecahwaktu1[1])",
				'Description' => $value->alamat.'/'.$value->keterangan,
				'Location' => $value->no_hp,
				'TaskId' => $value->id_tipe_kamera,
				'ProjectId' => $value->id_kamera );
			array_push($custompeminjaman, $temp);
		}
		$data['datakamera'] = $this->Kamera_model->get_all();
		$data['datatipekamera'] = $this->Tipe_kamera_model->get_all();
		$data['datapinjaman'] =$custompeminjaman;
		$this->template->load('template','dashboard/dashboard2',$data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */