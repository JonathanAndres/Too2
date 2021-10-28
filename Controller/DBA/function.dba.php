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
            echo "  <tr>
                        <td>
                            ".$row[0]."
                        </td>
                        <td>
                            ".$row[1]."
                        </td>
                        <td>
                            ".$row[2]."
                        </td>
                        <td>
                            ".$row[3]."
                        </td>
                        <td class='text-primary'>
                            ".$row[4]."
                        </td>
                        <td>
                            aqui deben ir otra cosa
                        </td>
                    </tr>";
        }
    }

?>