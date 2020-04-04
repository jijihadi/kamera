<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{

    public $table = 'tbl_peminjaman';
    public $id = 'id_pemesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select("id_pemesanan,nama_pemesan,alamat,no_hp,CONCAT_WS('/',nama_kamera,nama_tipe_kamera) as kamera,waktu_pengambilan,waktu_pengembalian,keterangan,status_pinjaman");
        $this->datatables->from('tbl_peminjaman');
        $this->datatables->where(array('status_pinjaman' => '0' ));
        //add this line for join
        //$this->datatables->join('table2', 'tbl_peminjaman.field = table2.field');
        $this->datatables->join('tbl_kamera', 'tbl_peminjaman.id_kamera = tbl_kamera.id_kamera');
        $this->datatables->join('tbl_tipe_kamera', 'tbl_peminjaman.id_kamera = tbl_tipe_kamera.id_kamera');
        $this->datatables->group_by('id_pemesanan');


        $this->datatables->add_column('action', anchor(site_url('peminjaman/update_status/$1/belum'),'<i class="fa fa-check" aria-hidden="true"></i>', 'class="btn btn-info btn-sm"  onclick="javascript: return confirm(\'Ubah status ?\')"')." 
            ".anchor(site_url('peminjaman/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('peminjaman/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('peminjaman/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'id_pemesanan');
        return $this->datatables->generate();
    }
     function jsonselesai() {
        $this->datatables->select("id_pemesanan,nama_pemesan,alamat,no_hp,CONCAT_WS('/',nama_kamera,nama_tipe_kamera) as kamera,waktu_pengambilan,waktu_pengembalian,keterangan,status_pinjaman");
        $this->datatables->from('tbl_peminjaman');
        $this->datatables->where(array('status_pinjaman' => '1' ));
        //add this line for join
        //$this->datatables->join('table2', 'tbl_peminjaman.field = table2.field');
        $this->datatables->join('tbl_kamera', 'tbl_peminjaman.id_kamera = tbl_kamera.id_kamera');
        $this->datatables->join('tbl_tipe_kamera', 'tbl_peminjaman.id_kamera = tbl_tipe_kamera.id_kamera');
        $this->datatables->group_by('id_pemesanan');


        $this->datatables->add_column('action', anchor(site_url('peminjaman/update_status/$1/selesai'),'<i class="fa fa-check" aria-hidden="true"></i>', 'class="btn btn-info btn-sm"  onclick="javascript: return confirm(\'Ubah status ?\')"')." 
            ".anchor(site_url('peminjaman/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('peminjaman/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('peminjaman/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'id_pemesanan');
        return $this->datatables->generate();
    }
       function get_all_peminjaman() {
        $this->db->select('id_pemesanan,nama_pemesan,alamat,no_hp,tbl_peminjaman.id_kamera,nama_kamera,tbl_peminjaman.id_tipe_kamera,nama_tipe_kamera,waktu_pemesanan,waktu_pengambilan,waktu_pengembalian,keterangan','status_pinjaman');
        $this->db->from('tbl_peminjaman');
        $this->db->where(array('status_pinjaman' => '0' ));
        //add this line for join
        //$this->datatables->join('table2', 'tbl_peminjaman.field = table2.field');
        $this->db->join('tbl_kamera', 'tbl_peminjaman.id_kamera = tbl_kamera.id_kamera');
        $this->db->join('tbl_tipe_kamera', 'tbl_peminjaman.id_kamera = tbl_tipe_kamera.id_kamera');
        $this->db->group_by('id_pemesanan');
      $query = $this->db->get();

    return $query->result();
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
        $this->db->select('id_pemesanan,nama_pemesan,alamat,no_hp,tbl_peminjaman.id_kamera,nama_kamera,tbl_peminjaman.id_tipe_kamera,nama_tipe_kamera,waktu_pemesanan,waktu_pengambilan,waktu_pengembalian,keterangan,status_pinjaman');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_peminjaman.field = table2.field');
        $this->db->join('tbl_kamera', 'tbl_peminjaman.id_kamera = tbl_kamera.id_kamera');
        $this->db->join('tbl_tipe_kamera', 'tbl_peminjaman.id_kamera = tbl_tipe_kamera.id_kamera');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pemesanan', $q);
    $this->db->or_like('nama_pemesan', $q);
    $this->db->or_like('alamat', $q);
    $this->db->or_like('no_hp', $q);
    $this->db->or_like('id_kamera', $q);
    $this->db->or_like('id_tipe_kamera', $q);
    $this->db->or_like('waktu_pemesanan', $q);
    $this->db->or_like('waktu_pengambilan', $q);
    $this->db->or_like('waktu_pengembalian', $q);
    $this->db->or_like('keterangan', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pemesanan', $q);
    $this->db->or_like('nama_pemesan', $q);
    $this->db->or_like('alamat', $q);
    $this->db->or_like('no_hp', $q);
    $this->db->or_like('id_kamera', $q);
    $this->db->or_like('id_tipe_kamera', $q);
    $this->db->or_like('waktu_pemesanan', $q);
    $this->db->or_like('waktu_pengambilan', $q);
    $this->db->or_like('waktu_pengembalian', $q);
    $this->db->or_like('keterangan', $q);
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

/* End of file Peminjaman_model.php */
/* Location: ./application/models/Peminjaman_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-20 10:33:29 */
/* http://harviacode.com */