<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>PEGAWAI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item">List pegawai</div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New &nbsp; <a href="<?= base_url('Admin/add'); ?>" class="btn btn-icon btn-primary"><i class="fas fa-plus"></i></a></h4>
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
                            <th>Email</th>
                            <th>Password</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th style="text-align:center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($list as $lis): ?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= $lis['nama_admin'];?></td>
                                    <td><?= $lis['email_admin'];?></td>
                                    <td><?= $lis['password_admin'];?></td>
                                    <td><?= $lis['alamat_admin'];?></td>
                                    <td><?= $lis['telepon_admin'];?></td>
                                    <?php if($lis['role_admin'] == 2): ?>
                                      <td><span class="badge badge-primary">Kasir</span></td>
                                    <?php elseif($lis['role_admin'] == 3): ?>
                                      <td><span class="badge badge-success">Gudang</span></td>
                                    <?php endif; ?>
                                    <?php if($lis['status_admin'] == 1): ?>
                                      <td><a href="<?= base_url('Admin/changeStatus/').encrypt_url($lis['id_admin']).'/'.$lis['status_admin'];?>" class="btn btn-primary tombol-active">Active</a></td>
                                    <?php elseif($lis['status_admin'] == 0): ?>
                                      <td><a href="<?= base_url('Admin/changeStatus/').encrypt_url($lis['id_admin']).'/'.$lis['status_admin'];?>" class="btn btn-danger tombol-deactive">Non-Aktif</a></td>
                                    <?php endif; ?>
                                    <td style="text-align:center;">
                                        <a href="<?= base_url('Admin/detail/').encrypt_url($lis['id_admin']);?>" class="btn btn-success">Detail</a>
                                        <a href="<?= base_url('Admin/edit/').encrypt_url($lis['id_admin']);?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('Admin/delete/').encrypt_url($lis['id_admin']);?>" class="btn btn-danger tombol-cancel">Delete</a>
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