
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TIPE KAMERA</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Kamera</td>
				<td><?php echo $id_kamera; ?></td>
			</tr>
	
			<tr>
				<td>Nama Tipe Kamera</td>
				<td><?php echo $nama_tipe_kamera; ?></td>
			</tr>
	<tr>
				<td>Warna Tipe Kamera</td>
				<td><button class="btn btn-lg" style="background-color:<?php echo $warna; ?>;width: 30%; height: 10%;"> </button></td>
			</tr>
			<tr>
				<td>Update Time</td>
				<td><?php echo $update_at; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tipe_kamera') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>