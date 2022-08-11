<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>DETAIL PEGAWAI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('Admin/listEmployed');?>">List pegawai</a></div>
                <div class="breadcrumb-item">Detail</div>
            </div>
        </div>
        <?php
            $encrptopenssl =  new Opensslencryptdecrypt();
            $result  = $encrptopenssl->decrypt($detail['password_admin']);
        ?>

        <!-- Main Content -->
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Fullname</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-address-card"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control full-name" name="name" value="<?= $detail['nama_admin']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control email" name="email" value="<?= $detail['email_admin']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="password" value="<?= $result; ?>" readonly>
                                </div>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control alamat" name="alamat" value="<?= $detail['alamat_admin']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-address-book"></i>
                                        </div>
                                    </div>
                                    <input type="number" class="form-control telepon" name="telepon" value="<?= $detail['telepon_admin']; ?>" readonly>
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
                                    <?php if($detail['role_admin'] == 2):?>
                                        <input type="text" class="form-control role" name="role" value="Kasir" readonly>
                                    <?php elseif($detail['role_admin'] == 3) : ?>
                                        <input type="text" class="form-control role" name="role" value="Gudang" readonly>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Main Content -->
    </section>
</div>