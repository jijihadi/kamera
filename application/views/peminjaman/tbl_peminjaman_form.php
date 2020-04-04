<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PEMINJAMAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Pemesan <?php echo form_error('nama_pemesan') ?></td><td><input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" placeholder="Nama Pemesan" value="<?php echo $nama_pemesan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Alamat <?php echo form_error('alamat') ?></td><td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>No Hp <?php echo form_error('no_hp') ?></td><td><input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" /></td>
					</tr>
	
					<!-- <tr>
						<td width='200'>Nama Kamera <?php echo form_error('id_kamera') ?></td><td><?php echo cmb_dinamis('id_kamera', 'tbl_kamera', 'nama_kamera', 'id_kamera',$id_kamera) ?></td>
					</tr>
	
					<tr>
						<td width='200'>Nama tipe Kamera <?php echo form_error('id_tipe_kamera') ?></td><td><?php echo cmb_dinamis('id_tipe_kamera', 'tbl_tipe_kamera', 'nama_tipe_kamera', 'id_tipe_kamera',$id_tipe_kamera) ?></td>
					</tr> -->

					 <tr>
						<td width='200'>Nama Kamera <?php echo form_error('id_kamera') ?></td><td><?php echo cmb_dinamis('id_kamera', 'tbl_kamera', 'nama_kamera', 'id_kamera',$id_kamera) ?></td>
					</tr>

                        <tr><td width="200">Nama tipe Kamera</td><td> <div class="form-group">
                           <select name="id_tipe_kamera" id="tipe_kamera" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value="">Silahkan Pilih</option>
                        </select>
	
					<tr>
						<td width='200'>Waktu Pengambilan <?php echo form_error('waktu_pengambilan') ?></td><td><input type="date" class="form-control" name="waktu_pengambilan" id="waktu_pengambilan" placeholder="Waktu Pengambilan" value="<?php echo $waktu_pengambilan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Waktu Pengembalian <?php echo form_error('waktu_pengembalian') ?></td><td><input type="date" class="form-control" name="waktu_pengembalian" id="waktu_pengembalian" placeholder="Waktu Pengembalian" value="<?php echo $waktu_pengembalian; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_pemesanan" value="<?php echo $id_pemesanan; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('peminjaman') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
       $('#tbl_kamera').change(function(){
          var id_kamera = $('#tbl_kamera').val();
          if(id_kamera != '')
          {
             $.ajax({
                url:"<?php echo base_url(); ?>Peminjaman/fetch_tipe_kamera",
                method:"POST",
                data:{id_kamera:id_kamera},
                success:function(data)
                {
                   $('#tipe_kamera').html(data);
               }
           });
         }
         else
         {
             $('#tipe_kamera').html('<option value="">Silahkan Pilih</option>');  }
         });


   });
</script>