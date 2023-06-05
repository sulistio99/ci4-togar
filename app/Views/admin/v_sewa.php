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
            <th>Nama Member</th>
            <th>Hunian</th>
            <th>Tanggal Pembayaran</th>
            <th>Nominal</th>
            <th>Bukti Transfer Sewa</th>
            <th>status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($sewa as $key => $value) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value['nama_member']; ?></td>
              <td><?= $value['nama_hunian']; ?></td>
              <td><?= $value['tanggal']; ?></td>
              <td><?= $value['nominal']; ?></td>
              <td><img src="<?= base_url('foto/bukti/' . $value['gambar_bukti']); ?>" width="120px"></td>
              <td><?= $value['status_sewa']; ?></td>
              <td class="text-center">
                <button type="button" class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#modal-edit<?= $value['id_sewa'] ?>">
                  <i class="fas fa-edit"></i> Ubah
                </button>
                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_sewa'] ?>">
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
<?php foreach ($sewa as $key => $value) { ?>
  <div class="modal fade" id="modal-edit<?= $value['id_sewa'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Pembayaran Sewa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open(base_url('Admin/SimpanKonfirmasiBayar/' . $value['id_sewa'])) ?>
          <input type="hidden" value="<?= $value['id_pesan']; ?>" name="id_pesan">
          <div class="form-group">
            <label>Nama Member</label>
            <input type="text" value="<?= $value['nama_member']; ?>" class="form-control" disabled>
          </div>
          <div class="form-group">
            <label>Status Pembayaran</label><br>
            <input type="radio" value="LUNAS" name="status_sewa" <?= $value['status_sewa'] == 'LUNAS' ? 'checked' : ''; ?>>
            <label for="contactChoice1">LUNAS</label>
            <input type="radio" value="BELUM LUNAS" name="status_sewa" <?= $value['status_sewa'] == 'BELUM LUNAS' ? 'checked' : ''; ?>>
            <label for="contactChoice1">BELUM LUNAS</label>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-flat">Konfirmasi</button>
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
<?php foreach ($sewa as $key => $value) { ?>
  <div class="modal fade" id="modal-delete<?= $value['id_sewa'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data pesan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart(base_url('Admin/DeleteSewa/' . $value['id_sewa'])) ?>
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