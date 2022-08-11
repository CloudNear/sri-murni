<div class="main-content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <section class="section">
        <div class="section-header">
            <h1>ADD OBAT</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Admin/index')?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('Obat/index');?>">List obat</a></div>
                <div class="breadcrumb-item">Add</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="section-body">
            <form method="POST" action="<?= base_url('Obat/add'); ?>" class="needs-validation" novalidate="">
                <?php 
                    $id = rand();
                ?>
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Obat</h4>
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
                                        <input type="text" class="form-control full-name" name="name" value="<?= set_value('name'); ?>">
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
                                        <input type="text" class="form-control stok" name="stok" value="0" readonly>
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
                                        <input type="text" class="form-control beli" name="beli" id="tanpa-rupiah" value="<?= set_value('beli'); ?>">
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
                                        <input type="text" class="form-control jual" name="jual" id="tanpa-rupiah-B" value="<?= set_value('jual'); ?>">
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