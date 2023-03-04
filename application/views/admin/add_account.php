<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="row">
			<div class="col-xl">
				<div class="card mb-4">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h5 class="mb-0">Tambah User</h5>
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url('Administrator/add_account')?>">
							<div class="mb-3">
								<label class="form-label" for="basic-default-fullname">Name</label>
								<input type="text" class="form-control" id="basic-default-fullname"
									placeholder="John Doe" name="name"> 
							</div>
							<div class="mb-3">
								<label class="form-label" for="basic-default-company">Username</label>
								<input type="text" class="form-control" id="basic-default-company" 
									placeholder="Isi username" value="" name="username">
							</div>
							<div class="mb-3">
								<label class="form-label" for="basic-default-company">Password</label>
								<input type="password" class="form-control" id="basic-default-company" name="password">
							</div>
							<div class="mb-3">
								<label class="form-label" for="basic-default-phone">No Telepon</label>
								<input type="text" id="basic-default-phone" class="form-control phone-mask" name="telp">
							</div>
							<div class="mb-3">
							<label for="defaultSelect" class="form-label">Role</label>
							<select id="defaultSelect" name="role_id"  class="form-select">
								<option value="">Pilih role...</option>
								<?php foreach ($role as $r) : ?>
									<option value="<?php echo $r['id']; ?>"><?php echo $r['role']; ?></option>
								<?php endforeach; ?>
							</select>
							</div>
							<button type="submit" class="btn btn-primary">Send</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- / Content -->
