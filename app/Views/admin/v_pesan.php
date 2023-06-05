<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title"><b><?= $title; ?></b></h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <!-- notifikasi-->
      <?php
      if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo '<h5><i class="icon fas fa-check"></i> ';
        echo session()->getFlashdata('pesan');
        echo '</h5> </div>';
      }
      ?>
      <table id="example1" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>No Hp</th>
            <th>Nama Hunian</th>
            <th>Tanggal Mulai</th>
            <th>Durasi Per/Bulan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($pesan as $key => $value) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value['nama_member']; ?></td>
              <td><?= $value['nohp']; ?></td>
              <td><?= $value['nama_hunian']; ?></td>
              <td><?= $value['tanggal_mulai']; ?></td>
              <td><?= $value['durasi']; ?></td>
              <td class="text-center">
                <button type="button" class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#modal-edit<?= $value['id_pesan'] ?>">
                  <i class="fas fa-edit"></i> Ubah
                </button>
                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_pesan'] ?>">
                  <i class="fas fa-trash"></i> Hapus
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- modal Ubah -->
<?php foreach ($pesan as $key => $value) { ?>
  <div class="modal fade" id="modal-edit<?= $value['id_pesan'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Pembayaran Sewa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open(base_url('Admin/SimpanUbahPesan/' . $value['id_pesan'])) ?>
          <div class="form-group">
            <label>Nama Member</label>
            <input type="text" value="<?= $value['nama_member']; ?>" class="form-control" disabled>
          </div>
          <div class="form-group">
            <label>Durasi/Bulan</label><br>
            <input type="radio" value="1 Bulan" name="durasi" <?= $value['durasi'] == '1 Bulan' ? 'checked' : ''; ?>>
            <label for="contactChoice1">1 Bulan</label>
            <input type="radio" value="3 Bulan" name="durasi" <?= $value['durasi'] == '3 Bulan' ? 'checked' : ''; ?>>
            <label for="contactChoice1">3 Bulan</label>
            <input type="radio" value="6 Bulan" name="durasi" <?= $value['durasi'] == '6 Bulan' ? 'checked' : ''; ?>>
            <label for="contactChoice1">6 Bulan</label>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-flat">Ubah</button>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal -->

<!-- modal Hapus -->
<?php foreach ($pesan as $key => $value) { ?>
  <div class="modal fade" id="modal-delete<?= $value['id_pesan'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data pesan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open(base_url('Admin/DeletePesan/' . $value['id_pesan'])) ?>
          <div class="form-group">
            <label>Yakin Mau Hapus? <b><?= $value['nama_member']; ?></b></label>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-flat">Hapus</button>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal -->