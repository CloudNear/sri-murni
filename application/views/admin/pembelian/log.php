<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>RIWAYAT PEMBELIAN</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item">Log Pembelian</div>
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
                            <th>Nota</th>
                            <th>Obat</th>
                            <th>Qty</th>
                            <th>Sub total</th>
                            <th>Suplier</th>
                            <th>Admin</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($log as $row): ?>
                                <tr>
                                    <td><?= $row['tgl_beli']; ?></td>
                                    <td><?= $row['nota'];?></td>
                                    <td><?= $row['nama_obat'];?></td>
                                    <td><?= $row['qty'];?></td>
                                    <td><?= number_format($row['subtotal']);?></td>
                                    <td><?= $row['nama_suplier'];?></td>
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