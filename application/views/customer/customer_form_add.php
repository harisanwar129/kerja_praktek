<section class="content-header">
	<h1>Pelanggan
	</h1>
	<ol class="breadcrumb">
		<li><a><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Pelanggan</li>
	</ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tambah Pelanggan</h3>
			<div class="pull-right">
				<a href="<?= site_url('customer') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Kembali</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<?php // echo validation_errors() 
					?>
					<form action="" method="post" autocomplete="off">
						<div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
							<label for="name">Nama</label>
							<input type="text" name="name" onkeypress="return hanyaHuruf(event);" id="name" value="<?= set_value('name') ?>" class="form-control">
							<?= form_error('name') ?>
							<script type="text/javascript">
							function hanyaHuruf(evt){
								var charCode = (evt.which) ? evt.which : event.keyCode
								 if(charCode > 31 && (charCode < 48 || charCode >57))
								return true;
								return false;
							}
							</script>
						</div>
						
						<div class="form-group <?= form_error('gender') ? 'has-error' : null ?>">
							<label for="gender">Jenis Kelamin *</label>
							<select name="gender" id="gender" class="form-control">
								<option value="">- Pilih -</option>
								<option value="1" <?= set_value('gender') == 1 ? 'selected' : null ?>>Laki-Laki</option>
								<option value="2" <?= set_value('gender') == 2 ? 'selected' : null ?>>Perempuan</option>
							</select>
							<?= form_error('gender') ?>
						</div>

						<div class="form-group <?= form_error('phone') ? 'has-error' : null ?>">
							<label for="phone">Nomor Telepon</label>
							<input type="number" min="0" name="phone" id="phone" value="<?= set_value('phone') ?>" class="form-control">
							<?= form_error('phone') ?>
						</div>
						<div class="form-group <?= form_error('address') ? 'has-error' : null ?>">
							<label for="address">Alamat</label>
							<input style="height:80px;" type="address" name="address" id="address" value="<?= set_value('address') ?>" class="form-control">
							<?= form_error('address') ?>
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="add" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
							<button type="reset" class="btn btn-flat">Ulangi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

