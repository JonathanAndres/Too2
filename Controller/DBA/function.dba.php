<?php 
    require ("../Controller/DBA/conexionDBA.php");

    function cbx($var,$mysqli)
    {
        $query = $mysqli -> query("Select ".$var[0].",".$var[1]." From ".$var[2]);
        while($valores = mysqli_fetch_array($query)){
            echo '<option value="'.$valores[$var[0]].'">'.$valores[$var[1]].'</option>';
        }
    }

    function dtgrd($var,$mysqli)
    {
        $query = $mysqli -> query("Select * From ".$var);
        while($row = mysqli_fetch_array($query))
        {
            echo '  <tr>
                        <td style="text-align: center;"> 
                            ".$row[0]."
                        </td>
                        <td style="text-align: center;">
                            ".$row[1]."
                        </td>
                        <td style="text-align: center;">
                            ".$row[2]."
                        </td>
                        <td class="text-primary" style="text-align: center;">
                            ".$row[3]."
                        </td>
                        <td style="text-align: center;">
                        <a href="javascript:window.open("../views/registroPerson.view.php","","width=500,height=500")"> <img src="../assets/img/icons/edit.png" width="20"  /> </a>
                           <img src="../assets/img/icons/delete.png" width="20"  />
                        </td>
                    </tr>';
        }
    }

    function VecDatos($var,$mysqli,$id){
        $query = $mysqli -> query("Select * From ".$var." WHERE Cedula = '".$id."' ");
        $VectorDatos = mysqli_fetch_array($query);
        return $VectorDatos;
    }

?>