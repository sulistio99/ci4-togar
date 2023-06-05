<div class="col-md-12" style="font-weight: bold;">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header text-center">
            <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <tr>
                    <th>No.</th>
                    <th>Nama Pemilik</th>
                    <th>Nama tempat</th>
                    <th>Status</th>
                    <th>Harga</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = 1;
                foreach ($datahunian as $key => $value) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['nama_pemilik']; ?></td>
                        <td><?= $value['nama_hunian']; ?></td>
                        <td><?= $value['status_hunian']; ?></td>
                        <td><?= $value['harga_hunian']; ?></td>
                        <td><?= $value['alamat_hunian']; ?></td>
                        <td>
                            <a href="<?= base_url('Home/UbahTempat/' . $value['id_hunian']); ?>" class="btn btn-warning btn-sm btn-flat">Ubah</a>
                            <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_hunian'] ?>">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- /.card-body -->
<?php echo form_close() ?>
<!-- /.card -->

<!-- modal Hapus -->
<?php foreach ($datahunian as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value['id_hunian'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data hunian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <?php echo form_open(base_url('Home/DeleteHunian/' . $value['id_hunian'])) ?>
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