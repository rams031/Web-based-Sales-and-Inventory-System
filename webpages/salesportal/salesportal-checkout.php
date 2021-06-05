<?php
include "header.php";
$inventory_data = ("SELECT SUM(tbl_inventory.quantity) as sumofquantity, 
tbl_product.productname, tbl_product.productprice, tbl_product.productcode, 
tbl_inventory.inventoryid,tbl_inventory.quantity, tbl_supplier.suppliername  FROM `tbl_inventory`
JOIN `tbl_product` ON tbl_product.productid=tbl_inventory.productid 
JOIN `tbl_receiving` ON tbl_receiving.receivingid=tbl_inventory.receivingid
JOIN `tbl_supplier` ON tbl_supplier.supplierid=tbl_receiving.supplierid
WHERE tbl_inventory.branchid = $branchid && tbl_inventory.quantity != 0 GROUP BY tbl_product.productcode ORDER BY RAND()");
$data = mysqli_query($conn, $inventory_data);


$customer_query = ("SELECT *  FROM `tbl_customer`
JOIN `tbl_branch` ON tbl_branch.branchid=tbl_customer.branchid 
WHERE tbl_branch.branchid = $branchid 
");
$customer_data = mysqli_query($conn, $customer_query);


$order_query = ("SELECT tbl_product.productcode, tbl_product.productname, tbl_order.quantity, tbl_order.totalamount, tbl_order.orderdate  FROM `tbl_order`
JOIN `tbl_customer` ON tbl_customer.customerid=tbl_order.customerid
JOIN `tbl_branch` ON tbl_branch.branchid=tbl_order.branchid
JOIN `tbl_inventory` ON tbl_inventory.inventoryid=tbl_order.inventoryid 
JOIN `tbl_product` ON tbl_product.productid=tbl_product.productid
WHERE tbl_order.branchid = $branchid  GROUP BY tbl_order.totalamount");
$order_data = mysqli_query($conn, $order_query);
?>
<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- CHECKOUT-->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>

    <div class="column is-10">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
            <form class="checkout">
                <div class="row">
                    <div class="columns">
                        <div class="column" style="margin-left:10px;">
                            <span class="icon">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                            </span>
                            <span class="portal-font  has-text-left">Check Out</span>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-9 content">
                        <?php include "sales_branch/salesportal-checkout-branch1.php" ?>   
                    </div>
            </form>
                <div class="column is-3">
                    <?php include "sales_branch/salesportal-checkout-branch2.php" ?> 
                </div>
            </div>
    </div>
</div>

<?php include "footer.php" ?>

<!-- header.php / nanjan ung header natin-->

<script>
    
    $(document).ready(function() {

        var table = $('#checkouttable').DataTable({ 
            "responsive": true, 
            "bPaginate": false,
            "bLengthChange": false, 
            "retrieve": true, 
            "paging": false, 
            "columnDefs": [{
              "defaultContent": "-",
              "targets": "_all"
            }]
            });

        $('#addcheckout').on('click', function () {
            var inventoryid = $('#productcheckout').val();
            var quantity = $('#quantitycheckout').val();
            var price = $('#pricecheckout').val();
            var totalamount = $('#totalamountcheckout').val();
            var counter = 1;

            $.ajax({
                type: 'POST',
                url: '../../phpaction/sales/checkproductdetails.php',
                data: { inventoryid: inventoryid },
                success: function(data) {
                    if (data) {
                        console.log(data);
                        
            
                        table.row.add([counter,data,quantity,price,totalamount]).draw();

                        $('#productcheckout').val('');
                        $('#quantitycheckout').val('');

                        counter++
                        
                    } else {
                        swal("Database Error", "Make sure the input is correct", "error")
                        console.log(data)
                    }
                },
            }); 
            
        } );

        
        $("#addcheckout").click(function() {
            var dataTable = $(".display").DataTable();
            var quantity = $('#productcheckout').val();
            dataTable.row.add(quantity).draw();
        });

        var now = new Date(),
        minDate = now.toISOString().substring(0,10);
        $('#checkoutdate').prop('min', minDate);
        $("#existing").hide();

        $(".navbar-burger").click(function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });

        $( "#productcheckout" ).change(function() {
           $('#quantitycheckout').removeAttr('Disabled');
            var product = $( "#productcheckout" ).val();
           
            $.ajax({
            type: 'POST',
            url: '../../phpaction/sales/checkproduct.php',
            data: { inventoryid: product },
            success: function(data) {

                var quantity = $('#quantitycheckout').val();
                var price = $('#pricecheckout').val();

                if (data) {
                    $('#pricecheckout').val(data); 
                    $('#quantitycheckout').val('');
                    var totalamount = (parseInt(quantity) * parseInt($('#pricecheckout').val(data)))
                    $('#totalamountcheckout').val(totalamount); 

                    $.ajax({
                        type: 'POST',
                        url: '../../phpaction/sales/checkproductquantity.php',
                        data: { inventoryid: product },
                        success: function(data) {
                            if (data) {
                                $('#stockcheckout').val(data); 
                                
                            } else {
                                swal("Database Error", "Make sure the input is correct", "error")
                                console.log(data)
                            }
                        },
                    });   
                } else {
                    swal("Database Error", "Make sure the input is correct", "error")
                    console.log(data)
                }
            },
            });

        });

        $("#quantitycheckout").bind('input', function() {
            var quantity = $('#quantitycheckout').val();
            var price = $('#pricecheckout').val();
            var totalamount = (parseInt(quantity) * parseInt(price))
            var instockquantity = $('#stockcheckout ').val();
            
            if (quantity) {
                $('#totalamountcheckout').val(totalamount);
                
            }

            if (parseInt(quantity) > parseInt(instockquantity)) {
                console.log("mas malake");
                $('#addcheckout').prop("disabled",true);
                $("#quantitycheckout").addClass("is-danger")
                $("#existing").show();
            } else {
                $("#existing").hide();
                $("#quantitycheckout").removeClass("is-danger")
                $('#addcheckout').prop("disabled",false);
            }
        });


        
    });
</script>