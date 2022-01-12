<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="sortcut icon" href="images/favicon.gif" type="image/gif"/>;
  
</head>
</html>
<?php
session_start();
if(isset($_GET["classe"]) && isset($_GET["metodo"]) ) //verificar se existe
{
    //acessando a classe controller e o método dentro da classe
    $classe = $_GET["classe"].'controller';
    $metodo = $_GET["metodo"];

    include_once "controller/$classe.php";
    $obj = new $classe();
    $obj->$metodo();
}
else
{
    include "controller/homecontroller.php";
    $home = new homecontroller();
    $home->inicio();
}

?>