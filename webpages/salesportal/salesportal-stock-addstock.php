<?php include "header.php";
$product_query = ("SELECT * FROM `tbl_product`");
$product_data = mysqli_query($conn, $product_query); 

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
                            <i class="fas fa-file-alt fa-2x"></i>
                        </span>
                        <span class="portal-font  has-text-left">Add New Stock</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <form onsubmit="func()">
                    <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Product</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="productid" id="productid" required>
                                            <option value="" disabled selected>Choose Product</option>
                                            <?php while ($row = mysqli_fetch_assoc($product_data)) { ?>
                                            <option value="<?php echo $row["productid"] ?>" style="text-transform:capitalize"> Product Code: #<?php echo $row["productcode"] ?> - Product : <?php echo $row["productname"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <p id="existing" class="help is-danger">Product already in the stock list.</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Date Added</label>
                                <div class="control">
                                    <input name="stockdate" id="stockdate" class="input" type="date" placeholder="Date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <div class="submit-button field is-grouped is-grouped-right">
                                <input class="button is-light" id="submit" name="submit" type="submit">
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
    $("#existing").hide();

    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    $("#productid").change(function() {
        var productid = $("#productid").val();
        var branchid = $("#branchid").val();
        
        $.ajax({
            type: 'POST',
            url: '../../phpaction/stock-validation.php',
            data: {
                branchid: branchid,
                productid: productid
            },
            success: function(data) {
                if (data === "existing") {
                    $('#submit').prop("disabled",true);
                    $("#existing").show();
                    $(".select").addClass("is-danger");
                } else if (data === "available") {
                    $('#submit').prop("disabled",false);
                    $("#existing").hide();
                    $(".select").removeClass("is-danger")
                    
                }
            }
        });
    });

    $('form').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../../phpaction/addnewstock.php',
            data: $('form').serialize(),
            success: function(data) {
                if (data === "success") {
                    swal("Stock Data Saved", "Succesfully", "success", {
                        buttons: false,
                        timer: 4000,
                        closeOnClickOutside: false
                    }), setTimeout(function() {
                        top.location.href = "salesportal-stock.php"
                    }, 2000);
                } else {
                    swal("Database Error", "Make sure the input is correct", "error")
                }
            },
        })
    });
});
</script>