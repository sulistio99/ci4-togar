<h2 class="ml-auto mr-auto">STATUS SEWA TEMPAT</h2>
<?php
if (session()->getFlashdata('pesan')) {
  echo '<div class="alert alert-success alert-dismissible">';
  echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
  echo '<h5><i class="icon fas fa-check"></i> ';
  echo session()->getFlashdata('pesan');
  echo '</h5> </div>';
}
?>

<?php
$errors = session()->getFlashdata('errors');
if (!empty($errors)) {
?>
  <div class="alert alert-danger" role="alert">
    <ul>
      <?php foreach ($errors as $key => $error) : ?>
        <li><?= esc($error); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php } ?>
<div class="col-md-12">
  <div class="product-name d-flex">
    <div class="one-forth text-left px-4">
      <span>Nama</span>
    </div>
    <div class="one-eight text-center">
      <span>Nama Tempat</span>
    </div>
    <div class="one-eight text-center">
      <span>Tanggal Mulai</span>
    </div>
    <div class="one-eight text-center">
      <span>Masa-Bulan</span>
    </div>
    <div class="one-eight text-center">
      <span>Status</span>
    </div>
  </div>
  <div class="product-cart d-flex">
    <?php foreach ($datamember as $key => $value) { ?>
      <?php
      $db = \Config\Database::connect();
      $data = $db->table('tb_pesan')
        ->join('tb_member', 'tb_member.id_member=tb_pesan.id_member')
        ->join('tb_hunian', 'tb_hunian.id_hunian=tb_pesan.id_hunian')
        ->where('tb_pesan.id_member', session('id_member'))
        ->get()->getRowArray();
      ?>
      <div class="one-forth">
        <div class="product-img" style="background-image: url(images/item-8.jpg);">
        </div>
        <div class="display-tc">
          <h3><?= $data['nama_member']; ?></h3>
        </div>
      </div>
      <div class="one-eight text-center">
        <div class="display-tc">
          <span class="price"><?= $data['nama_hunian']; ?></span>
        </div>
      </div>
      <div class="one-eight text-center">
        <div class="display-tc">
          <span class="price"><?= $data['tanggal_mulai']; ?></span>
        </div>
      </div>
      <div class="one-eight text-center">
        <div class="display-tc">
          <span class="price"><?= $data['durasi']; ?></span>
        </div>
      </div>
      <div class="one-eight text-center">
        <div class="display-tc">
          <?php if ($value['status_pesan'] == '') { ?>
            <span class="price">
              <button type="button" class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#modal-edit">
                <i class="fas fa-edit"></i> Bayar
              </button>
            </span>
          <?php } ?>
          <?php if ($value['status_pesan'] == 'Proses' || $value['status_pesan'] == 'LUNAS') { ?>
            <span class="price">
              <?= $value['status_pesan']; ?>
            </span>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php foreach ($datamember as $key => $value) { ?>
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Pembayaran </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart(base_url('User/SimpanBayarMember/' . session('id_member'))) ?>
          <input type="hidden" value="<?= $value['id_hunian']; ?>" name="id_hunian">
          <input type="hidden" value="<?= $value['id_pesan']; ?>" name="id_pesan">
          <input type="hidden" value="<?= date("M Y", strtotime($value['tanggal_mulai'])); ?>" name="bulan">
          <div class="form-group">
            <label>Tanggal Pembayaran</label>
            <input type="date" class="form-control" name="tanggal">
          </div>
          <div class="form-group">
            <label>Nominal</label>
            <input type="number" class="form-control" name="nominal">
          </div>
          <div class="form-group">
            <label>Bukti Pembayaran</label>
            <input id="preview_gambar" type="file" name="gambar_bukti">
            <img id="gambar_load" class="text-center" style="border: none;" src="<?= base_url('foto/gallery.png'); ?>" width="100%" height="200">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat">Bayar</button>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php } ?>