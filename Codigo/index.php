<?php
$conexion = new mysqli('localhost', 'root', "", 'tiendadb');
if($conexion->connect_error){
die('Error en la conexión' . $conexion->connect_error);
}
?>

<?php
$conexion->set_charset('utf8'); //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
$sql = "SELECT titulo, cantidad
		FROM pelicula, lineacompra
		WHERE cantidad >= 3 AND idpelicula = id";
$resultado = $conexion->query($sql);
if (!$resultado) {
die("No se puede realizar la consulta $conexion->errno: $conexion->error");
}

// Mostramos una tabla con el resultado de la consulta
echo "<center><h1>TABLA CLIENTES</h1><br><br>";
echo "<center><table border=2><tr><th>TITULO</th> <th>CANTIDAD</th></tr>";
while($registro = $resultado->fetch_assoc()) {
	echo "<tr>";
	foreach ($registro as $campo)
	echo "<td>".$campo."</td>";
	echo "</tr>";
	}
echo "</table>";


?>

<?php
$conexion->set_charset('utf8'); //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
$sql = "SELECT nombre, apellido, titulo, duracion
        FROM lineacompra, cliente c, pelicula p
		WHERE  duracion <= 2 AND idpelicula = id AND idcliente = dni";
$resultado = $conexion->query($sql);
if (!$resultado) {
die("No se puede realizar la consulta $conexion->errno: $conexion->error");
}

// Mostramos una tabla con el resultado de la consulta
echo "<h1>TABLA PEDIDOS</h1><br><br>";
echo "<center><table border=2><tr> <th>NOMBRE</th> <th>APELLIDO</th><th>PELICULA</th> <th>DURACIÓN (h)</th></tr>";
while($registro = $resultado->fetch_assoc()) {
	echo "<tr>";
	foreach ($registro as $campo)
	echo "<td>".$campo."</td>";
	echo "</tr>";
	}
echo"</table>";
?>




