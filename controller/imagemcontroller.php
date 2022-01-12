<?php
class imagemcontroller
{
    function abrir()
    {
        $this->logado();
        include_once "view/cadimagem.php";
    }

    function cadastrar()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include_once "model/imagem.php";
        $img = new imagem();
        $img->codproduto = $_POST["codproduto"];
        
        //upload de arquivos (imagem)
        $nome_arquivo = $_FILES["nomeimagem"]["name"];
        $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
        $permitidas = array("jpg","png","gif");
        if(in_array(strtolower($extensao),$permitidas))
        {
            $destino = "view/arquivos/$nome_arquivo";
            $nome_temp = $_FILES["nomeimagem"]["tmp_name"];
            move_uploaded_file($nome_temp,$destino);

            $img->nomeimagem = $nome_arquivo;

            $img->cadastrar();
            echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');
            window.location='index.php';</script>";
        }
        else
        {
            echo "<script>alert('NÃO FOI POSSÍVEL REALIZAR O CADASTRO!');
            window.location='index.php?classe=produto&metodo=consultar';</script>";
        }
    }

    function logado()
    {
        if(!isset($_SESSION["cod_logado"])) //não existe
        {
            header("location:index.php"); //volta para o index o qual direcionará para o login
        }
    }

    function verificarAcesso()
    {
        if($_SESSION["acesso_logado"] == 2) //usuário limitado
        {
		echo "<script>alert('VOCÊ NÃO TEM ACESSO A ESSA FUNÇÃO!');
		window.location='index.php';</script>";		
		exit;
        }        
    }

}

?>