<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/pbgfs/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/pbgf/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $pbgf->id?>" />

							<div class="form-group">
								<label for="nama">Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $pbgf->nama ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jk">Jenis Kelamin*</label>
								<input class="form-control <?php echo form_error('jk') ? 'is-invalid':'' ?>"
								 type="text" name="jk" placeholder="" value="<?php echo $pbgf->jk ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jk') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="jurusan">Jurusan*</label>
								<input class="form-control <?php echo form_error('jurusan') ? 'is-invalid':'' ?>"
								 type="text" name="jurusan" placeholder="Jurusan" value="<?php echo $pbgf->jurusan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jurusan') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="angkatan">Angkatan*</label>
								<input class="form-control <?php echo form_error('angkatan') ? 'is-invalid':'' ?>"
								 type="number" name="angkatan" min="2015" placeholder="Angkatan" value="<?php echo $pbgf->angkatan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('angkatan') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="asal">Asal*</label>
								<input class="form-control <?php echo form_error('asal') ? 'is-invalid':'' ?>"
								 type="text" name="asal" placeholder="Asal Daerah" value="<?php echo $pbgf->asal ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('asal') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="foto">Photo</label>
								<input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>"
								 type="file" name="foto" />
								<input type="hidden" name="old_foto" value="<?php echo $pbgf->foto ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('foto') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>