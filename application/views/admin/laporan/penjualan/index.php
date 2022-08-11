<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>LAPORAN PENJUALAN</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item">Laporan Penjualan</div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>PENJUALAN KESELURUHAN</h4>
                  </div>
                  <div class="card-body">
                    <?= 'Rp. '.number_format($alltime['total'],0,",",".");?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>PENJUALAN BULAN INI</h4>
                  </div>
                  <div class="card-body">
                    <?= 'Rp. '.number_format($month['total'],0,",",".");?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>PENJUALAN HARI INI</h4>
                  </div>
                  <div class="card-body">
                    <?= 'Rp. '.number_format($day['total'],0,",",".");?>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#lapservice">Cetak</button>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>Tanggal</th>
                            <th>Faktur</th>
                            <th>Obat</th>
                            <th>Qty</th>
                            <th>Sub total</th>
                            <th>Admin</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($log as $row): ?>
                                <tr>
                                    <td><?= $row['tgl_jual']; ?></td>
                                    <td><?= $row['faktur'];?></td>
                                    <td><?= $row['nama_obat'];?></td>
                                    <td><?= $row['qty'];?></td>
                                    <td><?= number_format($row['subtotal']);?></td>
                                    <td><?= $row['nama_admin'];?></td>
                                </tr>                                 
                            <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- END Main Content -->
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="lapservice">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Laporan per tanggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="post" action="<?= base_url('Laporan/cetakJual'); ?>">
                <div class="modal-body">  
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">Dari tanggal</div>
                            </td>
                            <td align="center" width="5%">
                                <div class="form-group">:</div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" class="form-control" required name="tgl_a">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">Sampai tanggal</div>
                            </td>
                            <td align="center" width="5%">
                                <div class="form-group">:</div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" class="form-control" required name="tgl_b">
                                </div>
                            </td>
                        </tr>                                   
                    </table>     
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">View</button>
                </div>
            </form>     
        </div>
    </div>
</div>
