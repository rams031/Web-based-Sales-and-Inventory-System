

<?php

include '../database/dbsql.php';

$array = array();
$inventory_data = ("SELECT * FROM `tbl_product`");
$data = mysqli_query($conn, $inventory_data);


while ($row = mysqli_fetch_assoc($data)) {
    $array[] = $row
}

echo json_encode($array);

?>