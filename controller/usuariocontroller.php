<?php
class usuariocontroller
{
    function abrir()
    {
        include_once "view/cadusuario.php"; //abrir form de cadastro
    }

    function gravar()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include_once "model/usuario.php"; //incluir arquivo
        $usu = new usuario(); //referência / instância

        //enviar valores vindos do formulário para a objeto da classe
        $usu->nome      = $_POST["nome"];
        $usu->email     = $_POST["email"];
        $usu->senha     = sha1($_POST["senha"]); //criptografando a senha
        $usu->acesso    = $_POST["acesso"];
		$usu->codcategoria    = $_POST["codcategoria"];

        //executar método de cadastro contido na classe (model)
        $usu->cadastrar();
        echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');
        window.location='index.php';</script>";
    }

    function consultar()
    {
        $this->logado();
        include "model/usuario.php"; //incluir classe (arquivo)
        $usu = new usuario(); //instância 
        $dados = $usu->consultar(); //executa o método de consulta
        include "view/cons_usuario.php"; //exibir a tela de  consulta (VIEW)
    }

    function excluir()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include "model/usuario.php"; //incluir classe (arquivo)
        $usu = new usuario(); //instância 
        //enviar o código do usuário para identificar qual será excluído
        $usu->codusuario = $_GET["codusuario"];
        $usu->excluir(); //executando método de exclusão da model
        header("location:index.php?classe=usuario&metodo=consultar");//direcionar novamente para a tela de consulta
    }

    function editar()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include "model/usuario.php";
        $usu = new usuario();
        $usu->codusuario = $_GET["codusuario"];
        $dados = $usu->retornar();
        //exibir a tela de edição
        include "view/edit_user.php";
    }

    function atualizar()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include_once "model/usuario.php"; //incluir arquivo
        $usu = new usuario(); //referência / instância

        //enviar valores vindos do formulário para a objeto da classe
        $usu->codusuario    = $_POST["codusuario"];
        $usu->nome          = $_POST["nome"];
        $usu->email         = $_POST["email"];
        $usu->senha         = sha1($_POST["senha"]); //criptografando a senha
        $usu->acesso        = $_POST["acesso"];
		$usu->codcategoria    = $_POST["codcategoria"];

        //executar método de cadastro contido na classe (model)
        $usu->atualizar();
        echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');
        window.location='index.php?classe=usuario&metodo=consultar';</script>";
    }

    function abrirlogin()
    {
        include "view/login.php";//abre a tela de login
    }

    function logar()
    {
        include "model/usuario.php";
		$usu = new Usuario(); 
        $usu->email     = $_POST["email"];
        $usu->senha     = sha1($_POST["senha"]);
        $dados = $usu->logar();        
        if(!empty($dados))//verificar se localizou no BD
        {
            //guardando valores em sessão
            $_SESSION["nome_logado"]    = $dados->nome;
            $_SESSION["acesso_logado"]  = $dados->acesso;
			$_SESSION["cod_logado"]     = $dados->codusuario;
			$_SESSION["cod_categoria"]     = $dados->codcategoria;
            include "view/home.php";//direcionar para a página principal
        }
        else
        {
            //mensagem de erro e volta para o login
            echo "<script>
                    alert('Usuário ou senha inválidos!');
                    window.location='index.php';
                 </script>";
        }
    }

    function sair()
    {
        //session_destroy();//destruir a sessão
		
        $_SESSION = array();
		
        header("location:index.php");
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