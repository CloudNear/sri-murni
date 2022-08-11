<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>EDIT OBAT</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('Obat/index');?>">List supplier</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="section-body">
            <form method="POST" action="<?= base_url('Obat/edit/').encrypt_url($obt['id_obat']); ?>" class="needs-validation" novalidate="" >
                <input type="hidden" name="id" value="<?= $obt['id_obat']; ?>">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Obat</h4>
                            </div>
                            <div class="card-body">
                            <div class="form-group">
                                    <label>Nama obat</label>
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-tablets"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control full-name" name="name" value="<?= $obt['nama_obat']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>stok</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-box-open"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control stok" name="stok" value="<?= $obt['stok']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <?= form_error('beli', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                               <i class="fas fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control beli" name="beli" id="tanpa-rupiah" value="<?= number_format($obt['hrg_beli'],0,",","."); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <?= form_error('jual', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                               <i class="fas fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control jual" name="jual" id="tanpa-rupiah-B" value="<?= number_format($obt['hrg_jual'],0,",","."); ?>">
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