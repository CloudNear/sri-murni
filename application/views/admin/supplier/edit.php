<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>EDIT SUPPLIER</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('Supplier/index');?>">List supplier</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="section-body">
            <form method="POST" action="<?= base_url('Supplier/edit/').encrypt_url($sply['id_suplier']); ?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $sply['id_suplier']; ?>">
                <input type="hidden" name="status" value="<?= $sply['status_suplier']; ?>">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Suplier</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-address-card"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control full-name" name="name" value="<?= $sply['nama_suplier']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control alamat" name="alamat" value="<?= $sply['alamat_suplier']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-address-book"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control telepon" name="telepon" value="<?= $sply['telepon_suplier']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- END Main Content -->
    </section>
</div>