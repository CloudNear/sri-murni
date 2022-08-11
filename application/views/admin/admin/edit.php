<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>EDIT ADMIN</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('Admin/listEmployed');?>">List pegawai</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <?php
            $encrptopenssl =  new Opensslencryptdecrypt();
            $result  = $encrptopenssl->decrypt($adm['password_admin']);
        ?>
        <!-- Main Content -->
        <div class="section-body">
            <form method="POST" action="<?= base_url('Admin/edit/').encrypt_url($adm['id_admin']); ?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $adm['id_admin']; ?>">
                <input type="hidden" name="status" value="<?= $adm['status_admin']; ?>">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Pegawai</h4>
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
                                        <input type="text" class="form-control full-name" name="name" value="<?= $adm['nama_admin']; ?>">
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
                                        <input type="email" class="form-control email" name="email" value="<?= $adm['email_admin']; ?>">
                                        <input type="hidden" class="form-control email" name="oldemail" value="<?= $adm['email_admin']; ?>">
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
                                        <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="password" value="<?= $result; ?>">
                                        <input type="hidden" class="form-control pwstrength" data-indicator="pwindicator" name="oldpassword" value="<?= $adm['password_admin']; ?>">
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
                                        <input type="text" class="form-control alamat" name="alamat" value="<?= $adm['alamat_admin']; ?>">
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
                                        <input type="number" class="form-control telepon" name="telepon" value="<?= $adm['telepon_admin']; ?>">
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
                                            <?php if($adm['role_admin'] == 2): ?>
                                                <option value="2" selected>Kasir</option>
                                                <option value="3">Gudang</option>
                                            <?php elseif($adm['role_admin'] == 3): ?>
                                                <option value="3" selected>Gudang</option>
                                                <option value="2">Kasir</option>
                                            <?php endif; ?>
                                        </select>
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