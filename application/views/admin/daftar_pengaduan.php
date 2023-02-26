<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Data Semua Pengaduan</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
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
          <td><?= $row['tgl_pengaduan'] ?></td>
          <td><?= $row['isi_laporan'] ?></td>
          <td class="col-2">
            <img src="<?php echo base_url() . './uploads/' . $row['foto'] ?>" width="150" style="margin: auto;">
          </td>
          <td><span class="badge bg-label-success me-1"><?= $row['status'] ?></span></td>
          <td><a href="<?= base_url('Administrator/tanggapan/'.$row['id'])?>">tanggapi</a>/ <a href="<?= base_url('Administrator/edit_pengaduan/'.$row['id'])?>">edit</a>/ <a href="<?= base_url('Administrator/delete_pengaduan/'.$row['id'])?>">delete</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
	</div>
</div>
<!-- / Content -->
