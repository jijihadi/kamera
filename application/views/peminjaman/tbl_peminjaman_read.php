
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PEMINJAMAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Pemesan</td>
				<td><?php echo $nama_pemesan; ?></td>
			</tr>
	
			<tr>
				<td>Alamat</td>
				<td><?php echo $alamat; ?></td>
			</tr>
	
			<tr>
				<td>No Hp</td>
				<td><?php echo $no_hp; ?></td>
			</tr>
	
			<tr>
				<td>Nama Kamera</td>
				<td><?php echo $id_kamera; ?></td>
			</tr>
	
			<tr>
				<td>Nama Tipe Kamera</td>
				<td><?php echo $id_tipe_kamera; ?></td>
			</tr>
	
			<tr>
				<td>Waktu Pemesanan</td>
				<td><?php echo $waktu_pemesanan; ?></td>
			</tr>
	
			<tr>
				<td>Waktu Pengambilan</td>
				<td><?php echo $waktu_pengambilan; ?></td>
			</tr>
	
			<tr>
				<td>Waktu Pengembalian</td>
				<td><?php echo $waktu_pengembalian; ?></td>
			</tr>
	
			<tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan; ?></td>
			</tr>
	
			<tr>
				<td>Status Pinjaman</td>
				<td><?php echo $status_pinjaman; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('peminjaman') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>