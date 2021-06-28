<section class="content-header">
	<h1>Satuan Barang
	</h1>
	<ol class="breadcrumb">
		<li><a><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Satuan Barang</li>
	</ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tambah Satuan Barang</h3>
			<div class="pull-right">
				<a href="<?= site_url('unit') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Kembali</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<?php // echo validation_errors() 
					?>
					<form action="" method="post" autocomplete="off">
						<div class="form-group <?= form_error('uname') ? 'has-error' : null ?>">
							<label for="uname">Nama Satuan Barang</label>
							<input type="text" name="uname" onkeypress="return hanyaHuruf(event);" id="uname" value="<?= set_value('uname') ?>" class="form-control">
							<?= form_error('uname') ?>
							<script type="text/javascript">
							function hanyaHuruf(evt){
								var charCode = (evt.which) ? evt.which : event.keyCode
								 if(charCode > 31 && (charCode < 48 || charCode >57))
								return true;
								return false;
							}
							</script>
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

