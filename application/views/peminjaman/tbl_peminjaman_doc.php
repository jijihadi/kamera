<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_peminjaman List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Pemesan</th>
		<th>Alamat</th>
		<th>No Hp</th>
		<th>Id Kamera</th>
		<th>Id Tipe Kamera</th>
		<th>Waktu Pemesanan</th>
		<th>Waktu Pengambilan</th>
		<th>Waktu Pengembalian</th>
		<th>Keterangan</th>
		<th>Status Pinjaman</th>
		
            </tr><?php
            foreach ($peminjaman_data as $peminjaman)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $peminjaman->nama_pemesan ?></td>
		      <td><?php echo $peminjaman->alamat ?></td>
		      <td><?php echo $peminjaman->no_hp ?></td>
		      <td><?php echo $peminjaman->id_kamera ?></td>
		      <td><?php echo $peminjaman->id_tipe_kamera ?></td>
		      <td><?php echo $peminjaman->waktu_pemesanan ?></td>
		      <td><?php echo $peminjaman->waktu_pengambilan ?></td>
		      <td><?php echo $peminjaman->waktu_pengembalian ?></td>
		      <td><?php echo $peminjaman->keterangan ?></td>
		      <td><?php echo $peminjaman->status_pinjaman ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>