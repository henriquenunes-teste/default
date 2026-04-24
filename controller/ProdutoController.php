<?php


class ProdutoController extends Controller{
    function listar(){
        $model = new Produto();
        $produtos = $model->getAll();
        include "view/produto/listagem-produto.php";
    }

    function novo(){
        $dados = [];
        $dados["id"] = 0;
        $dados["nome"] = "";
        $dados["quantidade"] = 0;
        $dados["preco"] = 0;

        include "view/produto/formulario-produto.php";
    }

    function gravar(){
        $model = new Produto();
        
        $dados = [];
        $dados["id"] = $_POST["id"];
        $dados["nome"] = $_POST["nome"];
        $dados["quantidade"] = $_POST["quantidade"];
        $dados["preco"] = $_POST["preco"];

        if($dados["id"] == 0){
            $model->insert($dados);
        }else{
            $model->update($dados);
        }

        header("location:".APP."/produto/listar");
    }

    function editar($id){
        $model = new Produto();
        $dados = $model->getById($id);
        include "view/produto/formulario-produto.php";
    }

    function deletar($id){
        $model = new Produto();
        $model->delete($id);
        header("location:".APP."/produto/listar");
    }
}