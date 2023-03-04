<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">

		<!-- Basic Bootstrap Table -->
		<div class="card">
			<div class=" d-flex justify-content-between">
				<h5 class="card-header">User Management</h5>
				<div class="d-flex align-items-center">
					<i class="bx bx-search fs-4"></i>
					<input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
						aria-label="Search..." />
				</div>
			</div>
			<a href="<?= base_url('Administrator/form_add_account')?>">tambah</a>
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive text-nowrap">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>No Telepon</th>
							<th>Role</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						<?php $no = 1?>
						<?php foreach ($akun as $row) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= $row['username'] ?></td>
							<td><?= $row['telp'] ?></td>
							<?php if($row['role_id'] == 1){?>
							<td><?= 'Administrator'?></td>
							<?php } elseif($row['role_id'] == 2){?>
							<td><?= 'Petugas'?></td>
							<?php }?>
							<td>
								<a class="" href="<?= base_url('Administrator/edit_account/'.$row['petugas_id'])?>">Edit</a> /
								<a class="" onclick="return confirm('Apakah anda yakin akan menghapus user ini?')" href="<?= base_url('Administrator/delete_account/'.$row['petugas_id'])?>" >Delete</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- / Content -->
