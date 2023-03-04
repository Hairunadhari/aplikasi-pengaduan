<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="row">
			<div class="col-xl">
				<div class="card mb-4">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h5 class="mb-0">Form Edit User</h5>
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url('Administrator/update_account')?>">
							<div class="mb-3">
								<label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="hidden" name="petugas_id" value="<?php echo $pengaduan['petugas_id']; ?>">
								<input type="text" class="form-control" id="basic-default-fullname" value="<?php echo $pengaduan['name']; ?>"
									placeholder="John Doe" name="name"> 
							</div>
							<div class="mb-3">
								<label class="form-label" for="basic-default-company">Username</label>
								<input type="text" class="form-control" id="basic-default-company" value="<?php echo $pengaduan['username']; ?>"
									placeholder="ACME Inc." name="username">
							</div>
							<div class="mb-3">
								<label class="form-label" for="basic-default-company">Password</label>
								<input type="password" class="form-control" id="basic-default-company" value="<?= $this->encryption->decrypt($pengaduan['password']) ?>" name="password">
							</div>
							<div class="mb-3">
								<label class="form-label" for="basic-default-phone">No Telepon</label>
								<input type="text" id="basic-default-phone" class="form-control phone-mask" value="<?php echo $pengaduan['telp']; ?>" name="telp">
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
