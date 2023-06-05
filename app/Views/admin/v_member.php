<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title"><b><?= $title; ?></b> | <a href="<?= base_url('Admin/TambahMember'); ?>" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-plus"></i> Add</a></h5>
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
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Member</th>
            <th>Password</th>
            <th>E-Mail</th>
            <th>Status</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($member as $key => $value) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value['nama_member']; ?></td>
              <td><?= $value['pass_member']; ?></td>
              <td><?= $value['email_member']; ?></td>
              <td><?= $value['status']; ?></td>
              <td><?= $value['nohp']; ?></td>
              <td><?= $value['alamat_member']; ?></td>
              <td class="text-center">
                <a href="<?= base_url('Admin/UbahMember/' . $value['id_member']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i> Ubah</a>
                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_member'] ?>">
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

<!-- modal Hapus -->
<?php foreach ($member as $key => $value) { ?>
  <div class="modal fade" id="modal-delete<?= $value['id_member'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data Member</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open(base_url('Admin/DeleteMember/' . $value['id_member'])) ?>
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