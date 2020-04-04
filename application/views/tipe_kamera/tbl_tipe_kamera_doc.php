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
        <h2>Tbl_tipe_kamera List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kamera</th>
		<th>Nama Tipe Kamera</th>
		<th>Update Time</th>
		
            </tr><?php
            foreach ($tipe_kamera_data as $tipe_kamera)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tipe_kamera->id_kamera ?></td>
		      <td><?php echo $tipe_kamera->nama_tipe_kamera ?></td>
		      <td><?php echo $tipe_kamera->update_time ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>