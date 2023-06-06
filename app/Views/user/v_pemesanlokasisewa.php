<h2 class="ml-auto mr-auto">Data Pemesan Lokasi Sewa</h2>
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
<?php
$db = \Config\Database::connect();
$nama_pemesan = $db->table('tb_pesan')
  ->join('tb_member', 'tb_member.id_member=tb_pesan.id_member')
  ->where('tb_member.id_member', session('id_member'))
  ->get()->getRowArray();
?>
<div class="row ml-auto mr-auto">
  <div class="col-md-12">
    <div class="table">
      <table>
        <tr>
          <th>No.</th>
          <th>Nama pemesan</th>
          <th>Nama Tempat</th>
          <th>Tanggal Mulai</th>
          <th>Durasi Sewa</th>
          <th>Jenis Usaha</th>
          <th>Status</th>
        </tr>

        <?php
        $no = 1;
        foreach ($datapemesan as $key => $value) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['id_pemesan']; ?> <?= $nama_pemesan['nama_member']; ?></td>
            <td><?= $value['nama_hunian']; ?></td>
            <td><?= $value['tanggal_mulai']; ?></td>
            <td><?= $value['durasi']; ?></td>
            <td><?= $value['jenis_usaha']; ?></td>
            <td>Status</td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>