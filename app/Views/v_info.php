<h2 class="text-left">Rekomendasi Sewa Lokasi</h2>
<hr>
<!-- pesan valdasi berhasil regist -->
<?php
if (session()->getFlashdata('pesan')) {
  echo '<div class="alert alert-success" role="alert">';
  echo session()->getFlashdata('pesan');
  echo '</div>';
}
?>
<div class="row ml-auto">
  <div class="col">
    <?php echo form_open('Home/Info') ?>
    <div class="input-group">
      <input type="search" class="form-control" placeholder="Pencarian" name="keywoard" style="border-radius: 50px;" size="50px">
      <label></label>Harga : </label>
      <select class="form-control">
        <option>Terendah</option>
        <option>Tertinggi</option>
      </select>
      <button class="btn btn-success text-center" type="submit"><i class="fas fa-search"></i> Cari</button>
    </div>
    <?php echo form_close() ?>
  </div>
</div>

<div class="colorlib-product">
  <div class="container text-center">
    <div class="row row-pb-md">
      <?php foreach ($h as $key => $value) { ?>
        <div class="col-md-3 col-lg-3 mb-4 text-center">
          <div class="product-entry border">
            <a href="#" class="prod-img">
              <img src="<?= base_url('foto/hunian/' . $value['gambar']); ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
            </a>
            <div class="desc">
              <h2><?= $value['nama_hunian']; ?></h2>
              <p> LT: <?= $value['luas_tanah']; ?> m² | LB: <?= $value['luas_bangunan']; ?> m²</p>
              <p><i class="icon-location"></i> <?= $value['alamat_hunian']; ?></p>
              <span class="price"><?= number_to_currency($value['harga_hunian'], 'Rp.') ?> / Bulan</span>
            </div>
            <p>
              <a href="<?= base_url('Home/Pesan/' . $value['id_hunian']); ?>" class="btn btn-success 
              btn-sm">Pesan</a>
              <a href="<?= base_url('Home/Komplain/' . $value['id_hunian']); ?>" class="btn btn-danger btn-sm">Komplain</a>
            </p>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php
    if ($h) { ?>
      <?= $pager->links('h', 'paging'); ?>
    <?php }
    ?>
  </div>
</div>

<?php if (!$h) { ?>
  <div class="row text-center ml-auto mr-auto">
    <div class="col text-center">
      <img src="<?= base_url('foto/emptysearch.png'); ?>" width="120" class="img-fluid">
      <h5>Data tidak ditemukan ditoko ini.</h5>
    </div>
  </div>
<?php } ?>