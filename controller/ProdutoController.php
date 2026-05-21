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
        $dados["foto"] = "";

        $this->view("produto/formulario-produto",compact('dados'));
    }

    function gravar(){
        $model = new Produto();
        
        $dados = [];

        if($_FILES["foto"] && $_FILES["foto"]["name"]){
          $arquivo = $_FILES["foto"];

          $partes = explode('.',$arquivo['name']);
          $nome = md5(time()).".".$partes[1];

          move_uploaded_file($arquivo["tmp_name"],"uploads/".$nome);

          if($_POST["foto_atual"] != ""){
            unlink("uploads/".$_POST["foto_atual"]);
          }

          $dados["foto"] = $nome; 
        }

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

    function items($id){
        $model = new Produto();
        $categorias = $model->categorias($id);

        $this->view("produto/items",compact('categorias'));
    }
}