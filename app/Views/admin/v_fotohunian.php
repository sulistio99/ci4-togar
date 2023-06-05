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
            <th>Nama Tempat</th>
            <th>Cover</th>
            <th>Jumlah Foto</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($hunian as $key => $value) { ?>
            <?php
            $db = \Config\Database::connect();
            $totalfotohunian = $db->table('tb_gambar')
              ->where('id_hunian', $value['id_hunian'])
              ->countAllResults();
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value['nama_hunian']; ?></td>
              <td><img src="<?= base_url('foto/hunian/' . $value['gambar']); ?>" width="120px"></td>
              <td><?= $totalfotohunian; ?></td>
              <td class="text-center">
                <a href="<?= base_url('Admin/TambahFotoHunian/' . $value['id_hunian']); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Tambah Foto</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- modal Hapus -->
<?php foreach ($hunian as $key => $value) { ?>
  <div class="modal fade" id="modal-delete<?= $value['id_hunian'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data hunian</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open(base_url('Admin/DeleteHunian/' . $value['id_hunian'])) ?>
          <div class="form-group">
            <label>Yakin Mau Hapus? <b><?= $value['nama_hunian']; ?></b></label>
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