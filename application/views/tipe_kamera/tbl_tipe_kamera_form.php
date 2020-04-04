<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TIPE KAMERA</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
				
				<table class='table table-bordered'>
					<tr>
						<td width='200'>Nama Kamera <?php echo form_error('id_kamera') ?></td><td><?php echo cmb_dinamis('id_kamera', 'tbl_kamera', 'nama_kamera', 'id_kamera',$id_kamera) ?></td>
					</tr>
					
					
					<tr>
						<td width='200'>Nama Tipe Kamera <?php echo form_error('nama_tipe_kamera') ?></td><td><input type="text" class="form-control" name="nama_tipe_kamera" id="nama_tipe_kamera" placeholder="Nama Tipe Kamera" value="<?php echo $nama_tipe_kamera; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Warna <?php echo form_error('warna') ?></td><td><input type="color" class="form-control" name="warna" id="warna" placeholder="Nama Tipe Kamera" value="<?php echo $warna; ?>" /></td>
					</tr>
					
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_tipe_kamera" value="<?php echo $id_tipe_kamera; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tipe_kamera') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
					
				</table>
			</form>
		</div>
	</section>
</div>