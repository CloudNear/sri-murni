<div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/img/stisla-fill.svg'); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header"><h4>Login Admin</h4></div>

                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
                                <?php $this->session->unset_userdata('message'); ?>
                                <form method="POST" action="<?= base_url('Auth'); ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" placeholder="Please fill in your email" value="<?= set_value('email'); ?>" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" value="<?= set_value('password'); ?>" >
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>