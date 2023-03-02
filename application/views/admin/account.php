<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Management User</h4>

		<!-- Basic Bootstrap Table -->
		<div class="card">
			<div class="nav-item d-flex align-items-center m-4">
				<i class="bx bx-search fs-4 lh-0"></i>
				<input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
					aria-label="Search..." />
			</div>

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
                            <td><a class="" href="<?= base_url('Administrator/edit_pengaduan/'.$row['petugas_id'])?>"><i
                                                    class=""></i> Edit</a> / <a class=""
                                                href="<?= base_url('Administrator/delete_pengaduan/'.$row['petugas_id'])?>"><i
                                                    class=""></i> Delete</a>
                                   
                                           
                                          
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
