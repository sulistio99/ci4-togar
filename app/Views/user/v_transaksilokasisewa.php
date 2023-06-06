<h2 class="ml-auto mr-auto">Data Transaksi Pemesan Lokasi Sewa</h2>
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
        <tr>
          <td></td>
          <td>Nama pemesan</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>Status</td>
        </tr>
      </table>
    </div>
  </div>
</div>