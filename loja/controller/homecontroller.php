<?php
class homecontroller
{
    function inicio()
    {
        $this->logado();
        //abrir form inicial (home.php)
        include_once "view/home.php";
        //include_once "view/inicio.php";
    }

    function logado()
    {
        if(!isset($_SESSION["cod_logado"])) //não existe
        {
            header("location:index.php?classe=usuario&metodo=abrirlogin"); //volta para o index o qual direcionará para o login
        }
    }
}

?>