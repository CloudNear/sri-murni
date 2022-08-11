<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>DASHBOARD</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                            <h4>PEMBELIAN BULAN INI</h4>
                        </div>
                        <div class="card-body">
                            <?= 'Rp. '.number_format($monthBuy['total'],0,",",".");?>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                            <h4>PENJUALAN BULAN INI</h4>
                        </div>
                        <div class="card-body">
                            <?= 'Rp. '.number_format($monthSell['total'],0,",",".");?>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-secondary">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                            <h4>LABA BULAN INI</h4>
                        </div>
                        <?php $laba = $monthBuy['total'] - $monthSell['total']; ?>
                        <div class="card-body">
                            <?= 'Rp. '.number_format($laba,0,",",".");?>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                            <h4>PENJUALAN HARI INI</h4>
                        </div>

                        <div class="card-body">
                            <?= 'Rp. '.number_format($daySell['total'],0,",",".");?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>OBAT PALING BANYAK TERJUAL</h5>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>                                 
                                <tr>
                                    <th>No</th>
                                    <th>Obat</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1; ?>
                                <?php foreach ($rank as $row): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_obat']; ?></td>
                                        <td><?= $row['rank'];?></td>
                                    </tr>                                 
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</div>