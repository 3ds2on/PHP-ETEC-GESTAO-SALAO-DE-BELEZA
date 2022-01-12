<?php
session_start();
if($_SESSION["acesso_logado"] == 2) //usuário limitado
{
echo "<script>alert('VOCÊ NÃO TEM ACESSO A ESSA FUNÇÃO!');
window.location='../index.php';</script>";		
exit;
}  
else
{
//RECEBENDO DADOS PARA CADASTRO DO HTML
include('../model/produtos_servicos.php'); //incluir arquivo 
$v = new VincularFilho(); //instância da classe 
$v->cadSetor = $_POST["id_categoria_z"]; //Consumindo a clase para atribuir um valor
$v->cadPai = $_POST["id_sub_categoria_z"]; //Consumindo a clase para atribuir um valor
$v->cadFilho = $_POST["id_sub_categoria_zz"]; ; //Consumindo a clase para atribuir um valor
$v->vincular_pai_filho(); //Consumindo a clase e acionando o metodo		
}
?>
