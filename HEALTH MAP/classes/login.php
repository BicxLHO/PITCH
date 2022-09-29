<?php
require_once "Conexao.php";

class login
{

    //atributos são os campos da tabela
    public $codigo;
    public $nome;
    public $email;
    public $senha;

    //metodos o crud (insert/delete/update/select)
    public function listarTodos()
    {
        try {
            //criar uma instancia da classe de conexao
            $bd = new Conexao();
            //criar uma variavel para receber o resultado do select
            $lista = $bd->executeSelect("select * from cadastro");
            //retornar os dados para tela
            return $lista;
        } catch (PDOException $msg) {
            echo "Não foi possível listar os dados dos Debitos: " . $msg->getMessage();
        }
    }

    public function validarsenha()
    {
        try {
            //criar uma instancia da classe de conexao
            $bd = new Conexao();
            //criar uma variavel para receber o resultado do select
            $this->email = $_GET["E-mail"];
            $this->senha = $_GET["senha"];
            $lista = $bd->executeSelect("select * from cadastro where email = {$this->email} and senha = {$this->senha}");
            //retornar os dados para tela
            return $lista;
        } catch (PDOException $msg) {
            echo "Não foi possível encontrar o usuario: " . $msg->getMessage();
        }
    }

    // metodo para deletar
    public function deletar()
    {
        try {
            if ($_GET["codigo"]) {
                //preencher o atributo matricula
                $this->codigo = $_GET["codigo"];
                // CRIAR O COMANDO DELETE
                $bd = new Conexao();
                $comandodelete = "delete from cadastro where codigo = {$this->codigo};";
                // RETORNAR O RESULTADO PARA TELA
                return $bd->executeQuery($comandodelete);
            }
        } catch (PDOException $msg) {
            echo "Não foi possível deletar os dados do Debito: " . $msg->getMessage();
        }
    }

    public function inserir()
    {
        try {
            // var_dump($_POST); die();
            if (isset($_POST["submit"])) {
                //preencher os campos

                $this->nome = $_POST["nome"];
                $this->email = $_POST["E-mail"];
                $this->senha = $_POST["senha"];

                // criar uma instancia da classe
                $bd = new Conexao();
                //criar uma variavel para receber o comando inserte
                $comandoinsert = "insert into cadastro (nome,usuario,senha) 
                values ('{$this->nome}','{$this->email}','{$this->senha}')";
                return $bd->executeQuery($comandoinsert);
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel inserir os dados dos Debitos" . $msg->getMessage();
        }
    }

    public function atualizar()
    {
        try {
            // var_dump($_POST); die();
            if (isset($_POST["salvar"])) {
                //preencher os campos

                $this->nome = $_POST["nome"];
                $this->email = $_POST["E-mail"];
                $this->senha = $_POST["senha"];

                // criar uma instancia da classe
                $bd = new Conexao();
                //criar uma variavel para receber o comando inserte
                $comandoupdate = "update cadastro set nome = '{$this->nome}', usuario ='{$this->email}', senha ='{$this->senha}')";
                return $bd->executeQuery($comandoupdate);
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel inserir os dados dos Debitos" . $msg->getMessage();
        }
    }


}