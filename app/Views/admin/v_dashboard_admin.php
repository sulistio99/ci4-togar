<div class="col">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-4 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Member</span>
              <span class="info-box-number"><?= $totalmember; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-4 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lock"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Sewa</span>
              <span class="info-box-number">
                <?= $totalsewa; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-4 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-envelope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Pesan</span>
              <span class="info-box-number"><?= $totalpesan; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-4 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-home"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Hunian</span>
              <span class="info-box-number"><?= $totalhunian; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    </div>
  </section>
</div>