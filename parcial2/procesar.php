<?php
echo "
<head>
    <meta charset='UTF-8'>
    <title>Mi Negocio</title>
    <link rel='stylesheet' href='styles.css'>
</head>
";
echo "<h1>Pedido recibido en Heladería Doña Nieve</h1>";

echo "<p>Nombre: " . $_POST["nombre"] . "</p>";
echo "<p>Correo: " . $_POST["correo"] . "</p>";
echo "<p>Sabores: " . $_POST["sabores"] . "</p>";

$productos = [
    "Cono simple" => 8,
    "Copa doble" => 15,
    "Litro para llevar" => 35
];

echo "<h2>Productos</h2>";

echo "<ul>";

foreach ($productos as $producto => $precio) {
    echo "<li>$producto - $precio Bs</li>";
}

echo "</ul>";

echo "<p>Te atiende: Wilson Lopez</p>";

?>