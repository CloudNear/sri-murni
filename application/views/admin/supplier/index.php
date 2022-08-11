<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>SUPPLIER</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item">List supplier</div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New &nbsp; <a href="<?= base_url('Supplier/add'); ?>" class="btn btn-icon btn-primary"><i class="fas fa-plus"></i></a></h4>
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
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Status</th>
                            <th style="text-align:center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($supplier as $row): ?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= $row['nama_suplier'];?></td>
                                    <td><?= $row['alamat_suplier'];?></td>
                                    <td><?= $row['telepon_suplier'];?></td>
                                    <?php if($row['status_suplier'] == 1): ?>
                                      <td><a href="<?= base_url('Supplier/changeStatus/').encrypt_url($row['id_suplier']).'/'.$row['status_suplier'];?>" class="btn btn-primary tombol-active">Active</a></td>
                                    <?php elseif($row['status_suplier'] == 0): ?>
                                      <td><a href="<?= base_url('Supplier/changeStatus/').encrypt_url($row['id_suplier']).'/'.$row['status_suplier'];?>" class="btn btn-danger tombol-deactive">Non-Aktif</a></td>
                                    <?php endif; ?>
                                    <td style="text-align:center;">
                                        <a href="<?= base_url('Supplier/edit/').encrypt_url($row['id_suplier']);?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('Supplier/delete/').encrypt_url($row['id_suplier']);?>" class="btn btn-danger tombol-cancel">Delete</a>
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