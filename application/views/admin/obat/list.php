<p>
	<a href="<?php echo base_url('admin/obat/tambah') ?>" class="btn btn-success btn-sm">
		<i class="nav-icon fa fa-plus"></i> Tambah Obat</a>
</p>

<?php  
	// Notifikasi
	if ($this->session->flashdata('sukses')) {
		echo '<p class="alert alert-success">';
		echo $this->session->flashdata('sukses');
	}
?>

<table id="example2" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>JENIS</th>
			<th>KATEGORI</th>
			<th>STOK</th>
			<th>HARGA</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($obat as $obat) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $obat->NAMA_OBAT ?></td>
				<td><?php echo $obat->NAMA_JENIS_OBAT ?></td>
				<td><?php echo $obat->NAMA_KATEGORI_OBAT ?></td>
				<td><?php echo $obat->STOK_OBAT ?></td>
				<td><?php echo number_format($obat->HARGA_OBAT,'0',',','.') ?></td>
				<td>
					<a href="<?php echo base_url('admin/obat/edit/'.$obat->ID_OBAT) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php include ('delete.php'); ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>