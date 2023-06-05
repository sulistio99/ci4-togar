<h2 class="ml-auto mr-auto">Form Komplain</h2>
<div class="colorlib-product">
  <div class="container">
    <div class="row row-pb-lg product-detail-wrap">
      <div class="col-sm-8">
        <!-- <div class="owl-carousel"> -->
        <div class="item">
          <div class="product-entry border">
            <a href="#" class="prod-img">
              <img src="<?= base_url('foto/hunian/' . $detailhunian['gambar']); ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
            </a>
          </div>
          <!-- </div> -->

        </div>
      </div>
      <div class="col-sm-4">
        <div class="product-desc">
          <?php echo form_open('User/Komplain/' . session('id_member')) ?>
          <h3><?= $detailhunian['nama_hunian']; ?></h3>
          <div class="size-wrap">
            <div class="block-26 mb-2">
              <h4>Perihal</h4>
              <input type="hidden" value="<?= $detailhunian['id_hunian']; ?>" name="id_hunian">
              <input type="radio" name="perihal" value="Air" />
              <label for="contactChoice1">Air</label>
              <input type="radio" name="perihal" value="Keran" />
              <label for="contactChoice1">Keran</label>
              <input type="radio" name="perihal" value="Listri" />
              <label for="contactChoice1">Listrik</label>
              <input type="radio" name="perihal" value="Lampu" />
              <label for="contactChoice1">Lampu</label>
              <input type="radio" name="perihal" value="Lainnya" />
              <label for="contactChoice1">Lainnya</label>
            </div>
            <div class="block-26 mb-2">
              <h4>Isi Komplain</h4>
              <textarea name="isi" cols="20" rows="5" class="form-control"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 text-center">
              <p class="addtocart">
                <?php if (!session('id_member')) { ?>
                  <a href="<?= base_url('Auth'); ?>" class="btn btn-primary btn-addtocart"><i class="icon-send"></i> Kirim</a>
                <?php } ?>
                <?php if (session('id_member')) { ?>
                  <button type="submit" class="btn btn-primary btn-addtocart">
                    <i class="icon-send"></i> Kirim
                  </button>
                <?php } ?>
              </p>
            </div>
          </div>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>