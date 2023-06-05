<h2 class="ml-auto mr-auto">Form Sewa Lokasi</h2>
<div class="colorlib-product">
  <div class="container">
    <div class="row row-pb-lg product-detail-wrap">
      <div class="col-sm-8">
        <div class="<?= $gambarhunian ? 'owl-carousel' : ''; ?>">
          <div class="item">
            <div class="product-entry border">
              <a href="#" class="prod-img">
                <img src="<?= base_url('foto/hunian/' . $detailhunian['gambar']); ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
              </a>
            </div>
          </div>
          <?php foreach ($gambarhunian as $key => $value) { ?>
            <div class="item">
              <div class="product-entry border">
                <a href="#" class="prod-img">
                  <img src="<?= base_url('foto/albumhunian/' . $value['gambar']); ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-sm-4">
        <?php echo form_open('User/Pesan/' . session('id_member')) ?>
        <div class="product-desc font-weight-bold">
          <h3><?= $detailhunian['nama_hunian']; ?></h3>
          Luas Tanah : <?= $detailhunian['luas_tanah']; ?> m² | Luas Bangunan : <?= $detailhunian['luas_bangunan']; ?> m²
          <br>
          <i class="icon-location"></i> <?= $detailhunian['alamat_hunian']; ?>
          <p class="price">
            <span><?= number_to_currency($detailhunian['harga_hunian'], 'Rp.') ?> / Bulan</span>
          </p>
          <p>
            <span>Status : <?= $detailhunian['status_hunian']; ?></span>
          </p>
          <a href="https://wa.me/089635789232" class="btn btn-success btn-addtocart btn-block"> <i class="icon-whatsapp"></i> Hubungi Pemilik Tempat
          </a>

          <div class="size-wrap">
            <div class="block-26 mb-2">
              <h4>Tanggal Mulai</h4>
              <input type="date" class="form-control" name="tanggal_mulai" required>
            </div>
            <div class="block-26 mb-2">
              <h4>Durasi Per Bulan</h4>
              <input type="hidden" value="<?= $detailhunian['id_hunian']; ?>" name="id_hunian">
              <input type="radio" name="durasi" value="1 Bulan" />
              <label for="contactChoice1">1 Bulan</label>
              <input type="radio" name="durasi" value="3 Bulan" />
              <label for="contactChoice1">3 Bulan</label>
              <input type="radio" name="durasi" value="6 Bulan" />
              <label for="contactChoice1">6 Bulan</label>
              <input type="radio" name="durasi" value="12 Bulan" />
              <label for="contactChoice1">12 Bulan</label>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-center">
              <?php if (!session('id_member')) { ?>
                <a href="<?= base_url('Auth'); ?>" class="btn btn-primary btn-addtocart">
                  <i class="icon-lock"></i> Sewa
                </a>
              <?php } ?>
              <?php if (session('id_member')) { ?>
                <button type="submit" class="btn btn-primary btn-addtocart">
                  <i class="icon-lock"></i> Sewa
                </button>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-12 pills">
            <div class="bd-example bd-example-tabs">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <li class="nav-item">
                  <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Alamat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Fasilitas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Info </a>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                  <h5>Lihat Map : </h5>
                  <p> <i class="icon-location"></i> <?= $detailhunian['alamat_hunian']; ?></p>
                </div>

                <div class="tab-pane border fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                  <p> <i class="icon-plus"></i> <?= $detailhunian['deskripsi_hunian']; ?></p>
                </div>

                <div class="tab-pane border fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                  <p><?= $detailhunian['info']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>