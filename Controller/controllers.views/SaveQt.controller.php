<?php 

require ("../DBA/conexionDBA.php");

    $Cliente = $_POST['Cli_codigo'];
    $subTotal = $_POST['subTotal'];
    $iva = $_POST['taxRate'];
    $total = $_POST['totalAftertax'];
    $numFac = $_POST['numFac'];


    $query = "INSERT INTO cabecera_factura(id_Cliente , NumFactura , TotalVenta , iva , Subtotal) 
              VALUES ($Cliente,$numFac,$total,$iva,$subTotal)";
    $ejecuta = $mysqli->query($query);

    for($i = 0; $i < count($_POST['productCode']); $i++){
        
        $proID = $_POST['productCode'][$i];
        $cantidad = $_POST['quantity'][$i];
        $price = $_POST['price'][$i];
        $totalPro = $_POST['total'][$i];

        $queryDt = "INSERT INTO detalle_factura(productoid,precio,cantidad,total,numFac)
                    VALUES ($proID,$price, $cantidad,$totalPro,$numFac)";

        $ejecuta2 = $mysqli->query($queryDt);
    }


    if($ejecuta == true )
       echo "si se ejecuto la Cabecera";
    else
        echo "error";
    

    if($ejecuta == true )
        echo "si se ejecuto el Detalle";
     else
         echo "error";       
     
    
        header("Location:../views/guia.view.php")


        /* $sqlInsert = "
			INSERT INTO ".$this->invoiceOrderTable."(user_id, order_receiver_name, order_receiver_address, order_total_before_tax, order_total_tax, order_tax_per, order_total_after_tax, order_amount_paid, order_total_amount_due, note) 
			VALUES ('".$POST['userId']."', '".$POST['companyName']."', '".$POST['address']."', '".$POST['subTotal']."', '".$POST['taxAmount']."', '".$POST['taxRate']."', '".$POST['totalAftertax']."', '".$POST['amountPaid']."', '".$POST['amountDue']."', '".$POST['notes']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "
			INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
			VALUES ('".$lastInsertId."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}      */

?>