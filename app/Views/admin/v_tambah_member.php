<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $title; ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart('Admin/SimpanDataMember') ?>
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
        <div class="col">
          <div class="form-group">
            <label>Nama Member</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="nama_member" placeholder="Nama Lengkap">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Password Member</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="pass_member" placeholder="Password">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Email Member</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="email_member" placeholder="E-Mail">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Status</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="status" placeholder="Pekerjaan / Mahasiswa">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>No Hp</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="nohp" placeholder="Nomor Handphone">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Alamat</label>
            <!-- value old untuk tidak input ulang lagi -->
            <input type="text" class="form-control" name="alamat_member" placeholder="Alamat">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
  <a href="<?= base_url('Admin/Member'); ?>" class="btn btn-warning"><i class="fas fa-share"></i> Kembali</a>
  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Tambah</button>
</div>
<?php echo form_close() ?>
<!-- /.card -->