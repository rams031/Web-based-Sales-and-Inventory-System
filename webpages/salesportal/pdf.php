<?php
require('../api/fpdf1/fpdf.php');

session_start(); 
$branchid = $_SESSION['branchid'];
include '../database/dbsql.php';
include '../phpaction/userbased.php';

if ($_SESSION['userid'] == '' && $_SESSION['name'] == '' && $_SESSION['lastname'] == '' && $_SESSION['usertype'] == '')
{
    echo '<script>alert("Make sure to login before access")</script>';
    header("Location: ../index.php");
} 
$transactionid = $_GET['transactionid'];

$order_query= ("SELECT * FROM `tbl_order` 
JOIN `tbl_inventory` ON tbl_order.inventoryid=tbl_inventory.inventoryid  
JOIN `tbl_product` ON tbl_inventory.productid=tbl_product.productid  
where tbl_order.transactionid = $transactionid && tbl_order.branchid = $branchid");
$order_data = mysqli_query($conn, $order_query); 


$transaction_query= ("SELECT * FROM `tbl_transaction` 
JOIN `tbl_customer` ON tbl_transaction.customerid=tbl_customer.customerid  
WHERE tbl_transaction.transactionid = $transactionid LIMIT 1");
$transaction_data = mysqli_query($conn, $transaction_query); 
while ($row = mysqli_fetch_assoc($transaction_data)) { 
    $customername = $row["customername"];
    $date = $row["date"];
    $orderamount = $row["orderamount"];
    $moneytendered = $row["moneytendered"];
    $balance = $row["balance"];
} 


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();
?>