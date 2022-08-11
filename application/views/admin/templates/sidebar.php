<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SRI MURNI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="<?= base_url('Admin/index');?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Obat</li>
            <li><a class="nav-link" href="<?= base_url('Obat/index');?>"><i class="fas fa-pills"></i> <span>List obat</span></a></li>

            <li class="menu-header">Transaksi</li>
            <li><a class="nav-link" href="<?= base_url('Pembelian/index');?>"><i class="fas fa-cart-plus"></i> <span>Pembelian</span></a></li>
            <li><a class="nav-link" href="<?= base_url('Penjualan/index');?>"><i class="fas fa-cash-register"></i> <span>Penjualan</span></a></li>

            <li class="menu-header">Data Transaksi</li>
            <li><a class="nav-link" href="<?= base_url('Pembelian/log');?>"><i class="fas fa-file-invoice-dollar"></i> <span>Pembelian</span></a></li>
            <li><a class="nav-link" href="<?= base_url('Penjualan/log');?>"><i class="fas fa-file-invoice-dollar"></i> <span>Penjualan</span></a></li>

            <li class="menu-header">Laporan</li>
            <li><a class="nav-link" href="<?= base_url('Laporan/penjualan');?>"><i class="fas fa-file-pdf"></i> <span>Penjualan</span></a></li>
            <li><a class="nav-link" href="<?= base_url('Laporan/pembelian');?>"><i class="fas fa-file-pdf"></i> <span>Pembelian</span></a></li>

            <?php if($admin['role_admin'] == 1): ?>
                <li class="menu-header">Settings</li>
                <li><a class="nav-link" href="<?= base_url('Admin/listEmployed');?>"><i class="fas fa-user-tie"></i> <span>Pegawai</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Supplier/index');?>"><i class="fas fa-dolly"></i> <span>Supplier</span></a></li>
            <?php endif; ?>
        </ul>
    </aside>
</div>