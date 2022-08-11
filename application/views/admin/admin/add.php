<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>ADD ADMIN</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('Admin/listEmployed');?>">List pegawai</a></div>
                <div class="breadcrumb-item">Add</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="section-body">
            <form method="POST" action="<?= base_url('Admin/add'); ?>" class="needs-validation" novalidate="">
                <?php 
                    $id = rand();
                ?>
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Pegawai</h4>
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
                                        <input type="text" class="form-control full-name" name="name" value="<?= set_value('name'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="email" class="form-control email" name="email" value="<?= set_value('email'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
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
                                        <input type="text" class="form-control alamat" name="alamat" value="<?= set_value('alamat'); ?>">
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
                                        <input type="number" class="form-control telepon" name="telepon" value="<?= set_value('telepon'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user-tag"></i>
                                            </div>
                                        </div>
                                        <select class="form-control" name="role">
                                            <option value="2">Kasir</option>
                                            <option value="3">Gudang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Save
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