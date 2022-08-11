<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>PENJUALAN OBAT</h1>
        </div>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
        <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
        <?php $this->session->unset_userdata('flash-success'); ?>
        <?php $this->session->unset_userdata('flash-error'); ?>
        <div class="section-body">
            <form role="form" method="post" action="<?= base_url('Penjualan/save'); ?>">
                <?php 
                    $faktur = "FAKTUR-".date('Ymdhis');
                    $date = date('Y-m-d');
                ?>
                <input type="hidden" name="admin" value="<?= $admin['id_admin']; ?>">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>FAKTUR</h4>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" name="faktur" value="<?= $faktur; ?>" readonly>
                                <input type="text" class="form-control mt-3" name="date" value="<?= $date; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>KONSUMEN & ADMIN</h4>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control mt-3" name="konsumen" placeholder="Nama konsumen" required>
                                <input type="text" class="form-control mt-3" name="user" value="<?= $admin['nama_admin']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>TOTAL</h4>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" id="gross_amount" name="gross_amount" disabled autocomplete="off">
                                <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-4">
                        <table class="table table-responsive" id="product_info_table">
                        <thead>
                            <tr>
                            <th style="width:45%">Obat</th>
                            <th style="width:7%">Qty</th>
                            <th style="width:7%">Stok</th>
                            <th style="width:20%">Harga</th>
                            <th style="width:21%">Sub-total</th>
                            <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr id="row_1">
                            <td>
                                    <select class="form-control select2 produk" data-row-id="row_1" id="product_1" name="product[]" style="width:100%;" onchange="getProductData(1)" required>
                                        <option value=""></option>
                                        <?php foreach ($obat as $k => $v): ?>
                                        <option value="<?php echo $v['id_obat']; ?>"><?php echo $v['nama_obat']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                                <td><input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="qty[]" min="1" id="qty_1"  class="form-control" required onkeyup="getTotal(1)"></td>
                                <td><input type="text" name="stok[]" id="stok_1" class="form-control" readonly ></td>
                                <td>
                                <input type="text" name="harga[]" id="harga_1" class="form-control" autocomplete="off" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="getTotal(1)" readonly>
                                <input type="hidden" name="harga_value[]" id="harga_value_1" class="form-control" autocomplete="off">
                                </td>
                                <td>
                                <input type="text" name="subtotal[]" id="subtotal_1" class="form-control" disabled autocomplete="off">
                                <input type="hidden" name="subtotal_value[]" id="subtotal_value_1" class="form-control" autocomplete="off">
                                </td>
                                <td><button type="button" class="btn btn-default" onclick="removeRow('1')"><i class="fa fa-trash"></i></button></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
                <button type="submit" name="print" value="1" class="btn btn-primary">Save Nota</button>
            </form>
        </div>
    </section>
</div>
<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
  
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('assets/js/stisla.js')?>"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
  <script src="<?= base_url('assets/js/custom.js'); ?>"></script>
  <script src="<?= base_url('assets/'); ?>dist/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/myscript.js"></script>

  <!-- Page Specific JS File -->

  <script src="<?= base_url('assets/modules/select2/dist/js/select2.full.min.js');?>"></script>



    <script>
        var base_url = "<?php echo base_url(); ?>";
        $(document).ready(function() {                                   
            $("#add_row").unbind('click').bind('click', function() {
                var table = $("#product_info_table");
                var count_table_tbody_tr = $("#product_info_table tbody tr").length;
                var row_id = count_table_tbody_tr + 1;

                $.ajax({
                    url: base_url + 'Pembelian/getTableProductRow/',
                    type: 'post',
                    dataType: 'json',
                    success:function(response) {
                        

                        var html = '<tr id="row_'+row_id+'">'+
                            '<td>'+ 
                                '<select class="form-control select2 product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="product[]" style="width:100%;" onchange="getProductData('+row_id+')" required>'+
                                    '<option value=""></option>';
                                    $.each(response, function(index, value) {
                                    html += '<option value="'+value.id_obat+'">'+value.nama_obat+'</option>';             
                                    });
                                    
                                html += '</select>'+
                                '</td>'+ 
                                '<td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="qty[]" id="qty_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')" requireds></td>'+
                                '<td><input type="text" name="stok[]" readonly id="stok_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+
                                '<td><input type="text" name="harga[]" id="harga_'+row_id+'" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="getTotal('+row_id+')" readonly><input type="hidden" name="harga_value[]" id="harga_value_'+row_id+'" class="form-control"></td>'+
                                '<td><input type="text" name="subtotal[]" id="subtotal_'+row_id+'" class="form-control" disabled><input type="hidden" name="subtotal_value[]" id="subtotal_value_'+row_id+'" class="form-control"></td>'+
                                '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-trash"></i></button></td>'+
                                '</tr>';

                            if(count_table_tbody_tr >= 1) {
                            $("#product_info_table tbody tr:last").after(html);  
                        }
                        else {
                            $("#product_info_table tbody").html(html);
                        }

                        $(".product").select2();

                    }
                    });

                return false;
            });

        });
        
        
        function getProductData(row_id)
        {
            var product_id = $("#product_"+row_id).val();    
            if(product_id == "") {
            $("#harga_"+row_id).val("");
            $("#harga_value_"+row_id).val("");

            $("#qty_"+row_id).val("");
            $("#stok_"+row_id).val("");           

            $("#subtotal_"+row_id).val("");
            $("#subtotal_value_"+row_id).val("");

            } else {
            $.ajax({
                url: base_url + 'Pembelian/getProductValueById',
                type: 'post',
                data: {product_id : product_id},
                dataType: 'json',
                success:function(response) {
                // setting the harga value into the harga input field
        
                $("#harga_"+row_id).val(response.hrg_jual);
                $("#harga_value_"+row_id).val(response.hrg_jual);

                $("#qty_"+row_id).val(1);
                $("#stok_"+row_id).val(response.stok);

                var total = Number(response.hrg_jual) * 1;
                total = total;
                $("#subtotal_"+row_id).val(total);
                $("#subtotal_value_"+row_id).val(total);
                                
                subAmount();
                } // /success
            }); // /ajax function to fetch the product data 
            }
        }

        function getTotal(row = null) {
            if(row) {
                var total = Number($("#harga_"+row).val()) * Number($("#qty_"+row).val());
                $("#subtotal_"+row).val(total);
                $("#subtotal_value_"+row).val(total);

                if(Number($("#qty_"+row).val()) > Number($("#stok_"+row).val())){
                    Swal.fire(
                                'Perhatian!',
                                'Qty melebihi Stok!',
                                'error'
                            )
                    
                    Number($("#qty_"+row).val(1));        
                    var akhir = Number($("#harga_value_"+row).val()) * 1;
                    akhir = akhir;
                    $("#subtotal_"+row).val(akhir);
                    $("#subtotal_value_"+row).val(akhir);
                    $("#gross_amount").val(akhir);
                    $("#gross_amount_value").val(akhir);
                    subAmount();

                }else{
                    subAmount();
                }

                
            } else {
                alert('no row !! please refresh the page');
            }
        }

        // calculate the total amount of the order
        function subAmount() {

            var tableProductLength = $("#product_info_table tbody tr").length;
            var totalSubAmount = 0;
            
            for(x = 0; x < tableProductLength; x++) {
                var tr = $("#product_info_table tbody tr")[x];
                var count = $(tr).attr('id');
                count = count.substring(4);

                totalSubAmount = Number(totalSubAmount) + Number($("#subtotal_"+count).val());
            } 

            $("#gross_amount").val(totalSubAmount);
            $("#gross_amount_value").val(totalSubAmount);

        } 

        function removeRow(tr_id)
        {
            $("#product_info_table tbody tr#row_"+tr_id).remove();
            subAmount();
        }
    </script>
</body>
</html>