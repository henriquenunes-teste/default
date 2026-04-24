<?php


class ProdutoController extends Controller{
    function listar(){
        $model = new Produto();
        $produtos = $model->getAll();
        $this->view("produto/listagem-produto",compact('produtos'));
    }

    function novo(){
        $dados = [];
        $dados["id"] = 0;
        $dados["nome"] = "";
        $dados["quantidade"] = 0;
        $dados["preco"] = 0;

        $this->view("produto/formulario-produto",compact('dados'));
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

        $this->redirect("produto/listar");
    }

    function editar($id){
        $model = new Produto();
        $dados = $model->getById($id);
        $this->view("produto/formulario-produto",compact("dados"));
    }

    function deletar($id){
        $model = new Produto();
        $model->delete($id);
        $this->redirect("produto/listar");
    }
}