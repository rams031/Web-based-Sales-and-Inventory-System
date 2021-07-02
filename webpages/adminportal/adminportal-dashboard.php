<?php include "header.php";
$sales_query = ("SELECT COUNT(transactionid) as totalsales FROM `tbl_transaction`");
$sales_data = mysqli_query($conn, $sales_query);

while ($row = mysqli_fetch_assoc($sales_data)) {
    $salesdata = $row["totalsales"];
}

$stock_query = ("SELECT COUNT(stockid) as totalstock FROM `tbl_stock` WHERE branchid = $branchid");
$stock_data = mysqli_query($conn, $stock_query);

while ($row = mysqli_fetch_assoc($stock_data)) {
    $stockdata = $row["totalstock"];
}

$branch_query = ("SELECT COUNT(branchid) as totalbranch  FROM `tbl_branch`");
$branch_data = mysqli_query($conn, $branch_query);

while ($row = mysqli_fetch_assoc($branch_data)) {
    $branchdata = $row["totalbranch"];
}

$supplier_query = ("SELECT COUNT(supplierid) as totalsupplier FROM `tbl_supplier` WHERE branchid = $branchid");
$supplier_data = mysqli_query($conn, $supplier_query);

while ($row = mysqli_fetch_assoc($supplier_data)) {
    $supplierdata = $row["totalsupplier"];
}

$user_query = ("SELECT COUNT(userid) as totaluser FROM `tbl_users`");
$user_data = mysqli_query($conn, $user_query);

while ($row = mysqli_fetch_assoc($user_data)) {
    $userdata = $row["totaluser"];
}

$product_query = ("SELECT COUNT(productid) as totalproduct FROM `tbl_product`");
$product_data = mysqli_query($conn, $product_query);

while ($row = mysqli_fetch_assoc($product_data)) {
    $productdata = $row["totalproduct"];
}

$branch_query = ("SELECT * FROM `tbl_branch` WHERE branchid = $branchid");
$branch_data = mysqli_query($conn, $branch_query);

while ($row = mysqli_fetch_assoc($branch_data)) {
    $branchname = $row["branchname"];
}
?>
<!-- header.php / nanjan ung header natin  nandito narin yung top navigation sa loob nito-->

<!-- DASHBOARD -->
<div class="columns">

    <div id="sidenavcustom" class="column is-narrow navigationbar">
        <?php include "sidenavigation.php" ?>
        <!-- sidenavigation.php / d2 ung tab sa leftside -->
    </div>

    <div class="column is-10">
        <div class="rows card is-shadowless animate__animated animate__fadeInDown">


            <div class="row is-full">
                <span class="icon">
                    <i class="fas fa-tachometer-alt fa-2x"></i>
                </span>
                <span class="portal-font" style="text-transform:capitalize">Dashboard (<?php echo $branchname ?>)</span>
            </div>
            

        </div>

            <div class="row animate__animated animate__fadeInDown" style="margin:50px;">
                <div class="columns">     
                    <div class="column is-12">                        
                        <div class="tile is-ancestor ">
                          <div class="tile is-parent">
                            <article class="tile is-child box is-shadowless">
                              <span class="title dashtitle"> Total Sales</span>
                              <p class="title totalnumbers"><?php echo $salesdata ?></p>
                            </article>
                          </div>
                          <div class="tile is-parent">
                            <article class="tile is-child box is-shadowless">
                              <p class="title dashtitle">Total Stock</p>
                              <p class="title totalnumbers"><?php echo $stockdata ?></p>
                            </article>
                          </div>
                          <div class="tile is-parent">
                            <article class="tile is-child box is-shadowless">
                              <p class="title dashtitle">Total Branch</p>
                              <p class="title totalnumbers"><?php echo $branchdata ?></p>
                            </article>
                          </div>
                          <div class="tile is-parent">
                            <article class="tile is-child box is-shadowless">
                              <p class="title dashtitle">Total Supplier</p>
                              <p class="title totalnumbers"><?php echo $supplierdata ?></p>
                            </article>
                          </div>
                        </div>
                    </div>                 
                </div>
            </div>
            <div class="row animate__animated animate__fadeInDown" style="margin:50px;">
                <div class="columns">     
                    <div class="column is-12">                        
                        <div class="tile is-ancestor ">
                          <div class="tile is-parent">
                            <article class="tile is-child box is-shadowless">
                              <span class="title dashtitle"> Total Users</span>
                              <p class="title totalnumbers"><?php echo $userdata ?></p>
                            </article>
                          </div>
                          <div class="tile is-parent">
                            <article class="tile is-child box is-shadowless">
                              <p class="title dashtitle">Total Product</p>
                              <p class="title totalnumbers"><?php echo $productdata ?></p>
                            </article>
                          </div>
                        </div>
                    </div>                 
                </div>
            </div>
    </div>
    

</div>

<?php include "footer.php" ?>
<!-- header.php / nanjan ung header natin-->

<script>
    $(document).ready(function() {
        $(".navbar-burger").click(function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    });
</script>