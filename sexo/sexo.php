<?php
$cons_usuario="root";
$cons_contra="";
$cons_base_datos="proyecto";
$cons_equipo="localhost";

$obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
if(!$obj_conexion)
{
    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
}
else
{
    echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
}

/* ejemplo de una consulta */

$var_consulta= "select * from pesex_sexo";
$var_resultado = $obj_conexion->query($var_consulta);

if($var_resultado->num_rows>0)
  {
    echo"<table border='1' align='center'>
     <tr bgcolor='#E6E6E6'>
        <th>Campo1</th>
        <th>Campo2</th>
    </tr>";

while ($var_fila=$var_resultado->fetch_array())
{
    echo "<tr>
    <td>".$var_fila["PESEX_CODIGO"]."</td>";
    echo "<td>".$var_fila["PESEX_DESCRI"]."</td></tr>";

 }
}
else
  {
    echo "No hay Registros";

  }

?>