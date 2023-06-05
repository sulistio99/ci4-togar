<h2 class="ml-auto mr-auto">STATUS PEMBAYARAN</h2>
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
      $data = $db->table('tb_sewa')
        ->join('tb_member', 'tb_member.id_member=tb_sewa.id_member')
        ->join('tb_hunian', 'tb_hunian.id_hunian=tb_sewa.id_hunian')
        ->join('tb_pesan', 'tb_pesan.id_member=tb_member.id_member')
        ->where('tb_sewa.id_member', session('id_member'))
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
          <span class="price"><?= $data['tanggal']; ?></span>
        </div>
      </div>
      <div class="one-eight text-center">
        <div class="display-tc">
          <span class="price"><?= $data['durasi']; ?></span>
        </div>
      </div>
      <div class="one-eight text-center">
        <div class="display-tc">
          <span class="price"><?= $data['status_sewa']; ?></span>
        </div>
      </div>
    <?php } ?>
  </div>
</div>