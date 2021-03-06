<section class="content-header">
	<h1>Pengguna
	</h1>
	
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Ubah Pengguna</h3>
			<div class="pull-right">
				<a href="<?= site_url('user') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i>Kembali</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="" method="post" autocomplete="off">
						<div class="form-group">
							<label for="name">Nama</label>
							<input type="hidden" name="user_id" value="<?= $row->user_id ?>">
							<input type="text" name="name" onkeypress="return hanyaHuruf(event);" id="name" value="<?= $row->name ?>" class="form-control" required>
							<script type="text/javascript">
							function hanyaHuruf(evt){
								var charCode = (evt.which) ? evt.which : event.keyCode
								 if(charCode > 31 && (charCode < 48 || charCode >57))
								return true;
								return false;
							}
							</script>
						</div>
						<div class="form-group">
							<label for="username">Nama Pengguna</label>
							<input type="text" name="username" id="username" value="<?= $row->username ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="password">Kata Sandi</label>
							<input type="password" name="password" id="password"  value="<?= $row->password ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="address">Alamat</label>
							<input style="height:80px;" name="address" id="address" class="form-control" value="<?= $row->address ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="level">Level</label>
							<select name="level" id="level" class="form-control" required>
								<option value="">- Pilih -</option>
								<option value="1" <?= $row->level == 1 ? 'selected' : null ?>>Admin</option>
								<option value="2" <?= $row->level == 2 ? 'selected' : null ?>>Kasir</option>
							</select>
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="edit" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
							<button type="reset" class="btn btn-flat">Ulangi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>