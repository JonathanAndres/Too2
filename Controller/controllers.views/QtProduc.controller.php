<?php
require("../DBA/conexionDBA.php");
$q = intval($_GET['q']);
$c = intval($_GET['c']);

$return_arr = array();

$query = "SELECT * FROM producto WHERE CodBarras = '" . $q . "'";

$result = $mysqli->query($query);

$row = mysqli_fetch_array($result);
$id = $row['id'];
$name = $row['NombreProducto'];
$price = $row['precio'];

// $return_arr[] = array(
//     "id" => $id,
//     "name" => $name,
//     "price" => $price
// );

//echo json_encode($return_arr); 
?>
<tr>
    <td><input class="itemRow" type="checkbox"></td>
    <td><input type="text" name="productCode[]" id="productCode_<?php echo $c ?>" class="form-control" autocomplete="off" value="<?php echo $id ?>"></td>
    <td><input type="text" name="productName[]" id="productName_<?php echo $c ?>" class="form-control" autocomplete="off" value="<?php echo $name ?>"></td>
    <td><input type="number" name="quantity[]" id="quantity_<?php echo $c ?>" class="form-control quantity" autocomplete="off"></td>
    <td><input type="number" name="price[]" id="price_<?php echo $c ?>" class="form-control price" autocomplete="off" value="<?php echo $price ?>"></td>
    <td><input type="number" name="total[]" id="total_<?php echo $c ?>" class="form-control total" autocomplete="off"></td>
</tr>