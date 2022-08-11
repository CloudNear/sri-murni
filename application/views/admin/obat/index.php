<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>OBAT</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item">List obat</div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New &nbsp; <a href="<?= base_url('Obat/add'); ?>" class="btn btn-icon btn-primary"><i class="fas fa-plus"></i></a></h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Harga beli</th>
                            <th>Harga jual</th>
                            <th style="text-align:center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($obat as $row): ?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= $row['nama_obat'];?></td>
                                    <?php if($row['stok'] == 0): ?>
                                        <td style="background-color: #FC4F4F; color:azure"><b><?= $row['stok'];?></b></td>
                                    <?php elseif($row['stok'] < 5): ?>
                                        <td style="background-color: #FF9F45; color:azure"><b><?= $row['stok'];?></b></td>
                                    <?php else: ?>
                                        <td style="background-color: #00B8A9; color:azure"><b><?= $row['stok'];?></b></td>
                                    <?php endif; ?>
                                    <td><?= number_format($row['hrg_beli']);?></td>
                                    <td><?= number_format($row['hrg_jual']);?></td>
                                    <td style="text-align:center;">
                                        <a href="<?= base_url('Obat/edit/').encrypt_url($row['id_obat']);?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('Obat/delete/').encrypt_url($row['id_obat']);?>" class="btn btn-danger tombol-cancel">Delete</a>
                                    </td>
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