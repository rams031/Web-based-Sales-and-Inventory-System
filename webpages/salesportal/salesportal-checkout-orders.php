<?php 
include "header.php" ;
$customerid = $_GET['csid'];
$customer_data = ("SELECT * FROM `tbl_customer` WHERE customerid = $customerid");
$data = mysqli_query($conn, $customer_data);

$stock_query = ("SELECT * FROM `tbl_stock`
JOIN `tbl_product` ON tbl_stock.productid=tbl_product.productid
JOIN `tbl_category` ON tbl_product.categoryid=tbl_category.categoryid
WHERE tbl_stock.branchid = $branchid && tbl_stock.stockquantity != 0");
$stock_data = mysqli_query($conn, $stock_query);

$customer_query = ("SELECT *  FROM `tbl_customer`
JOIN `tbl_branch` ON tbl_branch.branchid=tbl_customer.branchid 
WHERE tbl_branch.branchid = $branchid 
");
$customer_data = mysqli_query($conn, $customer_query);

$order_query = ("SELECT tbl_product.productcode, tbl_product.productname, tbl_order.orderquantity, tbl_order.totalamount, tbl_order.orderdate  FROM `tbl_order`
JOIN `tbl_customer` ON tbl_customer.customerid=tbl_order.customerid
JOIN `tbl_branch` ON tbl_branch.branchid=tbl_order.branchid
JOIN `tbl_inventory` ON tbl_inventory.inventoryid=tbl_order.inventoryid 
JOIN `tbl_product` ON tbl_product.productid=tbl_product.productid
WHERE tbl_order.branchid = $branchid  GROUP BY tbl_order.totalamount");
$order_data = mysqli_query($conn, $order_query);
?>
<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- BRANCH STOCK-->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>

    <div class="column is-10 ">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">
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
            <div class="row">
                <form class="checkout">
                    <div class="columns">
                        <div class="column is-10  ">
                            <?php include "sales_branch/salesportal-checkout-branch1.php" ?>   
                        </div>
                        <div class="column is-2">
                            <?php include "sales_branch/salesportal-checkout-branch2.php" ?> 
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <div class="submit-button field is-grouped is-grouped-right">
                                <input class="button is-light" id="submit" name="submit" type="submit" value="Checkout">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include "footer.php" ?>
<!-- header.php / nanjan ung header natin-->

<script>
$(document).ready(function() {

    var object = "";
    var now = new Date(),
    minDate = now.toISOString().substring(0,10);
    $('#checkoutdate').prop('min', minDate);
    $('#addcheckout').hide();
    $("#existing").hide();
    $('#submit').hide();
    var counter = 1;

    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    $("#stockunit").change(function() {
        var branchid = $("#branchid").val();
        var stockid = $("#stockunit").val();

        $('#quantitycheckout').removeAttr('Disabled');
        $("#quantitycheckout").removeClass("is-danger") 
        $("#existing").hide();
        
        $.ajax({
            type: 'POST',
            url: '../../phpaction/sales/checkprice.php',
            data: { 
                stockid: stockid,
                branchid: branchid },
            success: function(data) {
                if (data) {
                    $('#pricecheckout').val(data); 

                    $.ajax({
                        type: 'POST',
                        url: '../../phpaction/sales/checkproductquantity.php',
                        data: { 
                            stockid: stockid,
                            branchid: branchid },
                        success: function(data) {
                            if (data) {
                                $('#stockcheckout').val(data); 
                            } else {
                                swal("Database Error", "Make sure the input is correct", "error")
                            }
                        },
                    });   

                } else {
                    swal("Database Error", "Make sure the input is correct", "error")

                }
            }
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
        if ( parseInt(quantity) > parseInt(instockquantity)) {
            //console.log("mas malake");
            $('#addcheckout').hide();
            $("#quantitycheckout").addClass("is-danger")
            $("#existing").show();
        } else if (quantity == ""){
            $('#addcheckout').hide();

        } else {
            $("#existing").hide();
            $("#quantitycheckout").removeClass("is-danger")
            $('#addcheckout').show();
        }
    });

    $("#moneytendered").bind('input', function() {
        var totalamount = $('#amount').val();
        var moneytendered = $('#moneytendered').val();
        var balance = $('#balance').val();

        if (parseInt(totalamount) <= parseInt(moneytendered)){
            $('#submit').show();
        } else {
            $('#submit').hide();
        }
    });

    $('#addcheckout').on('click', function () {
        var stockid = $("#stockunit").val();
        var quantity = $('#quantitycheckout').val();
        var price = $('#pricecheckout').val();
        var totalamount = $('#totalamountcheckout').val();
        var TotalValue = 0;
        var orderalreadylisted = '';
        var data = [];
        
        $("#checkouttable tbody tr").each(function(row,tr) {
            var sub = {
              'stockid' : $(tr).find('td:eq(0)').text(),  
            };
            data.push(sub)
        });

        for (i = 0; i < data.length; ++i) {
            if (data[i]["stockid"] == stockid){ 
                $('#productcheckout').val('');
                $('#quantitycheckout').val('');
                $('#pricecheckout').val('');
                $('#stockunit').val('');
                $('#stockcheckout').val('');
                $('#quantitycheckout').attr( "disabled", "disabled" );
                $('#addcheckout').hide();
                $('#totalamountcheckout').val('');
                swal("The product is already on the list.", "Choose a product again.", "error")
                return false;
            } 
        }
        

        $.ajax({
            type: 'POST',
            url: '../../phpaction/sales/checkproductdetails.php',
            data: { stockid: stockid },
            success: function(data) {
                if (data) {

                    var html_code = "<tr id='row"+counter+"'>";
                    html_code += "<td class='stockid' contenteditable='false'>"+stockid+"</td>";
                    html_code += "<td class='product_name'>"+data+"</td>";
                    html_code += "<td class='product_quantity'>"+quantity+"</td>";
                    html_code += "<td class='product_price'>"+price+"</td>";
                    html_code += "<td class='product_totalamount' value="+totalamount+">"+totalamount+"</td>";
                    html_code += "<td><button type='button' name='remove' data-row='row"+counter+"' class='remove button is-light is-small'><i class='fas fa-trash-alt'></i></button></td>";   
                    html_code += "</tr>";  

                    $('#checkouttable').append(html_code);
                    $('#productcheckout').val('');
                    $('#quantitycheckout').val('');
                    $('#pricecheckout').val('');
                    $('#stockunit').val('');
                    $('#totalamountcheckout').val('');
                    $('#stockcheckout').val('');
                    $('#quantitycheckout').attr( "disabled", "disabled" );
                    $('#addcheckout').hide();

                    $("#checkouttable tr").each(function(){
                          TotalValue += Number($(this).find('.product_totalamount').text());
                    });
                    $('#amount').val(TotalValue);
                    counter = counter + 1;
                } 
            }
        });

    });

    $(document).on('click', '.remove', function(){
        var TotalValue = 0;
        var delete_row = $(this).data("row");
        $('#' + delete_row).remove();

        $("#checkouttable tr").each(function(){
            TotalValue += Number($(this).find('.product_totalamount').text());
        });
        $('#amount').val(TotalValue);
    });

    $("#moneytendered").bind('input', function() {
        var totalamount = $('#amount').val();
        var moneytendered = $('#moneytendered').val();
        var balance = parseFloat(moneytendered) - parseFloat(totalamount);
        $('#balance').val(balance);

    });

    $('form').on('submit', function(event) {

    event.preventDefault();

    var branchid = $('#branchid').val();
    var datecheckout = $('#datecheckout').val();
    var totalamount = $('#amount').val();
    var moneytendered = $('#moneytendered').val();
    var balance = $('#balance').val();
    var customerid = $('#customerid').val();
    var checkouttotalamount = $('#totalamount').val();
    var tabledata = [];

    $( "#checkouttable tbody tr" ).each(function(row,tr) {
        //table.cell($('#checkouttable td:eq(1)')).data(),
        var sub = {
          'stockid' : $(tr).find('td:eq(0)').text(),  
          'proname' : $(tr).find('td:eq(1)').text(),
          'quantity' : $(tr).find('td:eq(2)').text(),
          'productprice' : $(tr).find('td:eq(3)').text(),
          'totalamount' : $(tr).find('td:eq(4)').text()
        };
        tabledata.push(sub)
        //console.log(JSON.stringify(tabledata));
    });

    //console.log("after result" + JSON.stringify(tabledata));
    //console.log(tabledata);
    //console.log($('form').serialize())

    $.ajax({
        type: 'POST',
        url: '../../phpaction/addneworder.php',
        //crossOrigin: false,
        //dataType: 'json',
        data: {
            data:tabledata,
            customerid:customerid,
            branchid:branchid,
            datecheckout:datecheckout,
            totalamount:totalamount,
            moneytendered:moneytendered,
            balance:balance
        },
        success: function(data) {
            if (data = "successsuccesssuccess")
            swal("Order data Saved", "Saved to Transaction Portal", "success", {
                buttons: false,
                timer: 4000,
                closeOnClickOutside: false
            }), setTimeout(function() {
                top.location.href = "salesportal-checkout-orders.php"
            }, 2000);
        },
        error: function(data) {
            //swal("Database Error", "Make sure the input is correct", "error")
            object = data; 
            alert(object);
            console.log(object)
        }
    });

});

//var datecheckout = $('#datecheckout').val();
//var totalamount = $('#amount').val();
//var moneytendered = $('#moneytendered').val();
//var balance = $('#balance').val();

//var inventory_id = []; 
//var email = new Array();
//var inventory_id = [];
//var product_name = [];
//var product_quantity = [];
//var product_price = [];
//var product_totalamount = [];


//$('.inventory_id').each(function(tr){
//    inventory_id.push($(this).text());
//});
//
//var i = 0
//
////var inventoryid = JSON.stringify(inventory_id)
//
//console.log(inventory_id)
//console.log(JSON.stringify(inventory_id))





//$('.product_name').each(function(){
//    product_name.push($(this).text());
//});
//$('.product_quantity').each(function(){
//    product_quantity.push($(this).text());
//});
//$('.product_price').each(function(){
//    product_price.push($(this).text());
//});
//$('.product_totalamount').each(function(){
//    product_totalamount.push($(this).text());
//});
 
        //        
        //            //table.row.add([counter,data,quantity,price,totalamount]).draw(false);
        //            //var totalamountcheckout = table.column(4).data().sum();
        //            //console.log(data);
        //            //console.log(totalamountcheckout);
        //            //$('#amount').val(totalamountcheckout);
        //            //$('#productcheckout').val('');
        //            //$('#quantitycheckout').val('');
        //            //$('#pricecheckout').val('');
        //            //$('#totalamountcheckout').val('');
        //            //$('#stockcheckout').val('');
        //            //$('#quantitycheckout').attr( "disabled", "disabled" );
        //            //$('#addcheckout').hide();
        //            //
        //            ////var array = $.each(TableData, function(value, index) {
        //            ////    console.log([index] + ": " + [value]+ '<br>');
        //            ////});
////
        //            //console.log(table.rows().data()[0][3]);
        //            //console.log("1 " + table.cell($('#checkouttable td:eq(1)')).data())
        //            //console.log("2 " +   table.cell($('#checkouttable td:eq(2)')).data())
        //            //console.log("3 " +   table.cell($('#checkouttable td:eq(3)')).data())
        //            //console.log("4 " +   table.cell($('#checkouttable td:eq(4)')).data())
////
////
////
        //            ////var tabledata = new Array();
        //            ////
        //            ////tabledata = table.rows().data();
////
        //            //counter++
//
        //        } else {
        //            swal("Database Error", "Make sure the input is correct", "error")
        //            console.log(data)
        //        }
        //    },




    //$('#reset').on('click', function () {
    //    table
    //        .clear()
    //        .draw();
//
    //    $('#amount').val('');
    //    $('#productcheckout').val('');
    //    $('#quantitycheckout').val('');
    //    $('#pricecheckout').val('');
    //    $('#totalamountcheckout').val('');
    //    $('#stockcheckout').val('');
    //    $('#quantitycheckout').attr( "disabled", "disabled" );
    //    $('#addcheckout').hide();
//
    //    counter = 1;
    //})

    //$('#insertdata').on('click', function () {
//
    //    var tabledata = [];
//
    //    $( "#checkouttable tbody tr" ).each(function(row,tr) {
    //        //table.cell($('#checkouttable td:eq(1)')).data(),
    //        var sub = {
    //          'proname' : $(tr).find('td:eq(1)').text(),
    //          'quantity' : $(tr).find('td:eq(2)').text(),
    //          'productprice' : $(tr).find('td:eq(3)').text(),
    //          'totalamount' : $(tr).find('td:eq(4)').text()
    //        };
//
    //        console.log(table.rows().data()[0][3]);
//
    //        tabledata.push(sub);
//
    //        console.log(tabledata);
 //
    //    });
//
    //    $.ajax({
    //          type: 'POST',
    //          url: '../../phpaction/testaddproduct.php',
    //          data: {data :tabledata },
    //          dataType: 'JSON',
    //          success: function(data) {
    //              console.log(data);
    //          },
    //          error: function(data) {
    //              swal("Database Error", "Make sure the input is correct", "error")
    //              console.log(data)
    //          }
    //    });
//
    //
//
//
//
    //});
     

});
</script>
