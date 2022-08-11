<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan penjualan obat</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Athiti&display=swap');
        body { 
                font-family: 'Athiti', sans-serif; 
                font-size: 12px;
            }
    </style>
</head><body>
    <h2 align="center">LAPORAN PENNJUALAN OBAT</h2>
    
    <table style="margin: 10px 0; width:50%;" cellspacing="0" cellpadding="0" >
        <tr>
            <td>Dari tanggal</td>
            <td>:</td>
            <td><?= $tgl_x ?></td>
        </tr>
        <tr>
            <td>Sampai tanggal</td>
            <td>:</td>
            <td><?= $tgl_y ?></td>
        </tr>
    </table>
    <table border="1" cellspacing="0" cellpadding="1" style="width:100%;">
        <tr>
            <td align="center" colspan="6">PENJUALAN</td>
        </tr>
        <tr style="text-align:center;">
            <td>NO</td>
            <td>TANNGAL</td>
            <td>FAKTUR</td>
            <td>OBAT</td>
            <td>QTY</td>
            <td>HARGA</td>
        </tr>
        <?php $no=1; ?>
        <?php $total_harga = 0; ?>
        <?php foreach($laporan as $row): ?>
            <?php $harga[] = $row['subtotal']; $total_harga = array_sum($harga); ?>
            <tr>
                <td style="text-align:center;"><?= $no++; ?></td>
                <td><?= $row['tgl_jual']; ?></td>
                <td><?= $row['faktur']; ?></td>
                <td><?= $row['nama_obat']; ?></td>
                <td style="text-align: center;"><?= $row['qty']; ?></td>
                <td  style="text-align: right;"><?= number_format($row['subtotal']); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <?php if($total_harga == 0): ?>
                <td colspan="5" align="center">TOTAL</td>
                <td style="text-align: right;">0</td>
            <?php else : ?>
                <td colspan="5" align="center">TOTAL</td>         
                <td style="text-align: right;"><?= number_format($total_harga, 0, ".", "."); ?></td>
            <?php endif; ?>
           
            
        </tr>
    </table>
</body></html>