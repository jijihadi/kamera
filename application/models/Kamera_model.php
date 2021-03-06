<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kamera_model extends CI_Model
{

    public $table = 'tbl_kamera';
    public $id = 'id_kamera';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    // datatables
    function json() {
        $this->datatables->select('id_kamera,nama_kamera,warna as kode_warna,update_time');
        $this->datatables->from('tbl_kamera');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_kamera.field = table2.field'); 
        $this->datatables->add_column('warna', anchor(site_url('kamera'),'<button class="btn btn-lg" style="background-color: $1;width: 30%; height: 10%;"></button>'), 'kode_warna');


        $this->datatables->add_column('action', anchor(site_url('kamera/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('kamera/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('kamera/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_kamera');
        return $this->datatables->generate();
    }
 function getlayananbyidkamera($id_kamera){

        $this->db->select('id_tipe_kamera,nama_tipe_kamera');
        $this->db->where('id_kamera', $id_kamera);
        $query = $this->db->get('tbl_tipe_kamera');
        $output = '<option value="">Pilih tipe kamera</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->id_tipe_kamera.'">'.$row->nama_tipe_kamera.'</option>';
     }
     return $output;

 }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kamera', $q);
    $this->db->or_like('nama_kamera', $q);
	$this->db->or_like('warna', $q);
	$this->db->or_like('update_time', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kamera', $q);
    $this->db->or_like('nama_kamera', $q);
	$this->db->or_like('warna', $q);
	$this->db->or_like('update_time', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Kamera_model.php */
/* Location: ./application/models/Kamera_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-18 05:05:25 */
/* http://harviacode.com */