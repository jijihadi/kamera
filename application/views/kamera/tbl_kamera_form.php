<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KAMERA</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Kamera <?php echo form_error('nama_kamera') ?></td><td><input type="text" class="form-control" name="nama_kamera" id="nama_kamera" placeholder="Nama Kamera" value="<?php echo $nama_kamera; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Warna <?php echo form_error('warna') ?></td><td><input type="color" class="form-control" name="warna" id="warna" placeholder="Warna Kamera" value="<?php echo $warna; ?>" /></td>
					</tr>
	
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kamera" value="<?php echo $id_kamera; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('kamera') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>