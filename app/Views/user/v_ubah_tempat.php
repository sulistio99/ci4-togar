<div class="col-md-12" style="font-weight: bold;">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header text-center">
            <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php echo form_open_multipart('Home/UbahDataHunian/' . $tempatmember['id_hunian']) ?>
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<h5><i class="icon fas fa-check"></i> ';
                echo session()->getFlashdata('pesan');
                echo '</h5> </div>';
            }
            ?>
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
                        <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik Tempat" value="<?= $tempatmember['nama_pemilik']; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <input type="text" class="form-control" name="alamat_hunian" placeholder="Alamat Tempat" value="<?= $tempatmember['alamat_hunian']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Tempat</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <input type="text" class="form-control" name="nama_hunian" placeholder="Nama Tempat" value="<?= $tempatmember['nama_hunian']; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jenis Hunian</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <select class="form-control" name="id_kategori">
                            <option>-Pilih Kategori-</option>
                            <?php
                            foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value['id_kategori']; ?>" <?= $tempatmember['id_kategori'] == $value['id_kategori'] ? 'selected' : ""; ?>><?= $value['nama_kategori']; ?></option>
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
                        <input type="number" class="form-control" name="luas_tanah" placeholder="Luas Tanah m²" value="<?= $tempatmember['luas_tanah']; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Luas Bangunan m²</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <input type="number" class="form-control" name="luas_bangunan" placeholder="Luas Bangunan m²" value="<?= $tempatmember['luas_bangunan']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <select class="form-control" name="id_provinsi">
                            <option>-Pilih Provinsi-</option>
                            <?php
                            foreach ($provinsi as $key => $value) { ?>
                                <option value="<?= $value['id_provinsi']; ?>" <?= $tempatmember['id_provinsi'] == $value['id_provinsi'] ? 'selected' : ""; ?>><?= $value['nama_provinsi']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>kabupaten</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <select class="form-control" name="id_kabupaten">
                            <option>-Pilih Kabupaten-</option>
                            <?php
                            foreach ($kabupaten as $key => $value) { ?>
                                <option value="<?= $value['id_kabupaten']; ?>" <?= $tempatmember['id_kabupaten'] == $value['id_kabupaten'] ? 'selected' : ""; ?>><?= $value['nama_kabupaten']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>kecamatan</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <select class="form-control" name="id_kecamatan">
                            <option>-Pilih Kecamatan-</option>
                            <?php
                            foreach ($kecamatan as $key => $value) { ?>
                                <option value="<?= $value['id_kecamatan']; ?>" <?= $tempatmember['id_kecamatan'] == $value['id_kecamatan'] ? 'selected' : ""; ?>><?= $value['nama_kecamatan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Fasilitas Hunian</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <textarea name="deskripsi_hunian" cols="10" rows="5" class="form-control" value="<?= old('deskripsi_hunian'); ?>"><?= $tempatmember['deskripsi_hunian']; ?></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Info Hunian</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <textarea name="info" cols="10" rows="5" class="form-control" value="<?= old('info'); ?>"><?= $tempatmember['info']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Status Hunian</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <select name="status_hunian" class="form-control">
                            <option value="kosong" <?= $tempatmember['status'] == 'kosong' ? 'selected' : ""; ?>>Kosong</option>
                            <option value="terkunci" <?= $tempatmember['status'] == 'terkunci' ? 'selected' : ""; ?>>Terkunci</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <!-- value old untuk tidak input ulang lagi -->
                        <input type="text" class="form-control" name="harga_hunian" value="<?= $tempatmember['harga_hunian']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Gambar Hunian</label>
                            <div class="form-group ">
                                <img src="<?= base_url('foto/hunian/' . $tempatmember['gambar']); ?>" class="img-fluid" width="200px" height="200px" id="gambar_load">
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
        <div class="card-footer">
            <a href="<?= base_url('Home/Tempat/' . $tempatmember['id_member']); ?>" class="btn btn-warning"><i class="fas fa-share"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Ubah</button>
        </div>
    </div>
</div>
<!-- /.card-body -->
<?php echo form_close() ?>
<!-- /.card -->