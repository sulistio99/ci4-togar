<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $title; ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart('Admin/UbahDataHunian/' . $hunian['id_hunian']) ?>
    <div class="card-body">
      <!-- notifikasi validasi data-->
      <?php
      $errors = session()->getFlashdata('errors');
      if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
          <h4>Periksa entry form</h4>
          <ul>
            <?php
            foreach ($errors as $key => $error) { ?>
              <li><?= esc($error); ?></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>
      <!-- notifikasi-->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Nama Pemilik</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="nama_pemilik" value="<?= $hunian['nama_pemilik']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Alamat</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="alamat_hunian" value="<?= $hunian['alamat_hunian']; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Nama Hunian</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="nama_hunian" value="<?= $hunian['nama_hunian']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Jenis Hunian</label>
            <!-- value old untuk tidak input ulang lagi -->
            <select name="id_kategori" class="form-control">
              <option value="<?= $hunian['id_kategori']; ?>"><?= $hunian['nama_kategori']; ?></option>
              <?php foreach ($kategori as $key => $value) { ?>
                <option value="<?= $value['id_kategori']; ?>" <?= old('id_kategori') == $value['id_kategori'] ? "selected" : ''; ?>><?= $value['nama_kategori']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Luas Tanah m²</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="number" class="form-control" name="luas_tanah" value="<?= $hunian['luas_tanah']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Luas Bangunan m²</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="number" class="form-control" name="luas_bangunan" value="<?= $hunian['luas_bangunan']; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Fasilitas Hunian</label>
            <!-- value old untuk tidak input ulang lagi -->
            <textarea name="deskripsi_hunian" cols="10" rows="5" class="form-control"><?= $hunian['deskripsi_hunian']; ?></textarea>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Info Hunian</label>
            <!-- value old untuk tidak input ulang lagi -->
            <textarea name="info" cols="10" rows="5" class="form-control"><?= $hunian['info']; ?></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Status Hunian</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="status_hunian" value="<?= $hunian['status_hunian']; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Harga Hunian</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="harga_hunian" value="<?= $hunian['harga_hunian']; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-sm-12">
              <label>Gambar Hunian</label>
              <div class="form-group ">
                <img src="<?= base_url('foto/hunian/' . $hunian['gambar']); ?>" class="img-fluid" width="200px" height="200px" id="gambar_load">
              </div>
              <div class="col-sm-12">
                <div class="form-group ">
                  <input type="file" name="gambar" accept="image/*" id="preview_gambar">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
  <a href="<?= base_url('Admin/Hunian'); ?>" class="btn btn-warning"><i class="fas fa-share"></i> Kembali</a>
  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Ubah</button>
</div>
<?php echo form_close() ?>
<!-- /.card -->