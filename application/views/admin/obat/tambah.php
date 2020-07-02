<?php
	// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
echo form_open_multipart(base_url('admin/obat/tambah'),' class="form_horizontal"');
?>

<div class="card card-primary">
	<div class="card-header"></div>
	<form role="form">
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Nama Obat</label>
				<input type="text" name="NAMA_OBAT" class="form-control" placeholder="Nama Obat" value="<?php echo set_value('NAMA_OBAT') ?>" required>
			</div>
			<div class="form-group">
				<label>Jenis Obat</label>
				<select name="ID_JENIS_OBAT"class="form-control">
					<?php foreach ($jenis as $jenis) {?>
						<option value="<?php echo $jenis->ID_JENIS_OBAT ?>">
							<?php echo $jenis->NAMA_JENIS_OBAT ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Kategori Obat</label>
				<select name="ID_KATEGORI_OBAT"class="form-control">
					<?php foreach ($kategori as $kategori) {?>
						<option value="<?php echo $kategori->ID_KATEGORI_OBAT ?>">
							<?php echo $kategori->NAMA_KATEGORI_OBAT ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Stok Obat</label>
				<input type="text" name="STOK_OBAT" class="form-control" placeholder="Stok Obat" value="<?php echo set_value('STOK_OBAT') ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Harga Obat</label>
				<input type="text" name="HARGA_OBAT" class="form-control" placeholder="Harga Obat" value="<?php echo set_value('HARGA_OBAT') ?>" required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
	</form>
</div>

<?php echo form_close(); ?>