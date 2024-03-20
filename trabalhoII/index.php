<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <title>Aividade</title>
</head>

<body>
    <div class="flex-container">
        <form method="post" action="">
            <h2>Lista de compras</h2>
            <label for="listaCompras">Insira aqui os itens da sua lista:
                <input type="text" name="listaCompras" id="listaCompras"><br>
            </label>
            <div class="buttom">
                <button type="submit" id="btn" name="btn" action='definirCookie'>Fazer lista</button>
            </div>
        </form>
    </div>

</body>

</html>


<?php

if(isset($_POST['btn'])) {
    // Function to list the items in the form input
    function listarCompras() {
        $listaCompras = $_POST["listaCompras"];
        // Split the input string into an array
        $lista = explode(" ", $listaCompras);
        return $lista;
    }

    // Get the list of items
    $listaCompras = listarCompras();

    // Create a cookie for each item in the list
    foreach ($listaCompras as $item) {
        // Generate a random number for the cookie name
        $randomNumber = rand(0, 9999999);
        // Set the cookie name
        $cookieName = "CookieTeste" . $randomNumber;
        // Set the cookie value to the input text value
        $cookieValue = $item;
        // Set the cookie
        setcookie($cookieName, $cookieValue, time() + 86400); // Cookie expires in 1 day
    }
}

?>