<?php 
include "header.php";

$stock_query = ("SELECT * FROM `tbl_stock`
JOIN `tbl_product` ON tbl_stock.productid=tbl_product.productid
JOIN `tbl_category` ON tbl_product.categoryid=tbl_category.categoryid
WHERE tbl_stock.branchid = $branchid && tbl_stock.stockquantity");
$stock_data = mysqli_query($conn, $stock_query);

$supplier_query = ("SELECT * FROM `tbl_supplier` 
JOIN `tbl_branch` ON tbl_supplier.branchsupplierid = tbl_branch.branchid where tbl_supplier.branchid = $branchid");
$supplier_data = mysqli_query($conn, $supplier_query); 

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
                            <i class="fas fa-boxes fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Create Request Stock</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form class="checkout">
                    <div class="columns" style="background-color:#FAFAFA; padding:20px; border-radius:8px;">
                        <div class="column is-9">
                            <?php include "sales_branch/salesportal_request_branch1.php" ?>   
                        </div>
                        <div class="column is-3"  >
                            <?php include "sales_branch/salesportal_request_branch2.php" ?> 
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
        var quantity = $("#quantitycheckout").val();
 
        if (quantity > 0){
            $('#addcheckout').show();
        } else {
            $('#addcheckout').hide();
        }
    });


    $('#addcheckout').on('click', function () {

        var stockid = $("#stockunit").val();
        var quantity = $('#quantitycheckout').val();
        var price = $('#pricecheckout').val();
        var totalamount = $('#totalamountcheckout').val();
        var totalValue = 0;
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
                swal("The product is already on the list.", "Choose a stock again.", "error")
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

        if (data.length > 0) {

        }

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
    });

    $.ajax({
        type: 'POST',
        url: '../../phpaction/addneworder.php',
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
            object = data; 
            alert(object);
            console.log(object)
        }
    });

});

     

});
</script>
