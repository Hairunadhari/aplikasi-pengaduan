<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Data Semua Pengaduan</h4>

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
							<th>Tanggal Pengaduan</th>
							<th>Isi Laporan</th>
							<th>Foto</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						<?php $no = 1?>
						<?php foreach ($pengaduan as $row) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= date('d-M-Y') ?></td>
							<td><?= $row['isi_laporan'] ?></td>
							<td class="col-2">
								<img src="<?php echo base_url() . './uploads/' . $row['foto'] ?>" width="150"
									style="margin: auto;">
							</td>
							<?php if($row['status'] == 'Diproses'){?>
							<td><span class="badge bg-primary me-1"><?= $row['status'] ?></span></td>
							<?php } else{?>
							<td><span class="badge bg-success me-1"><?= $row['status'] ?></span></td>
							<?php } ?>
							<td>
								<div class="dropdown">
									<button type="button" class="btn p-0 dropdown-toggle hide-arrow"
										data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
									<div class="dropdown-menu">
										<a class="dropdown-item"
											href="<?= base_url('Administrator/edit_pengaduan/'.$row['id'])?>"><i
												class="bx bx-edit-alt me-1"></i> Edit</a>
										<a class="dropdown-item"
											href="<?= base_url('Administrator/delete_pengaduan/'.$row['id'])?>"><i
												class="bx bx-trash me-1"></i> Delete</a>
										<a class="dropdown-item">
										<button type="button" class="btn btn-info" data-bs-toggle="modal"
													data-bs-target="#basicModal<?= $row['id']?>">Tanggapi
												</button></a>
										
									</div>
								</div>
							</td>
							<td> </td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<!-- MODAL -->
				<?php foreach ($pengaduan as $p) : ?>
				<div class="modal fade" id="basicModal<?= $p['id']?>" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel1">Form Tanggapan</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<form action="<?= base_url('Administrator/input_tanggapan')?>" method="post"
								enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">
										<div class="col mb-3">
											<label for="nameBasic" class="form-label">Isi Tanggapan</label>
											<input type="hidden" name="id_pengaduan" value="<?= $p['id']?>" />
											<input type="hidden" name="id_petugas"
												value="<?= $this->session->userdata('role_id')?>" />
											<input type="text" name="tanggapan" class="form-control"
												placeholder="Tanggapan Anda" />
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
										Close
									</button>
									<button type="submit" class="btn btn-primary">Save</button>
								</div>
							</form>

						</div>
					</div>
				</div>
				<?php endforeach; ?>

				<!-- TUTUP MODAL -->
			</div>
		</div>
	</div>
</div>
<!-- / Content -->
