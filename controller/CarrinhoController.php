<?php


class CarrinhoController extends Controller{
    function listar(){
        $model = new Carrinho();
        $carrinhos = $model->getAll();
        $this->view("carrinho/listagem_carrinho",compact('carrinhos','model'));
    }

    function novo(){
        $dados=[];
        $dados["id"] = 0;
        $dados["total"] = 0;
        $dados["usuario_id"] = 0;

        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->getAll();

        $this->view("carrinho/formulario_carrinho",compact('usuarios','dados'));
    }

    function gravar(){
        $data = [];
        $data["id"] = $_POST["id"];
        $data["total"] = $_POST["total"];
        $data["usuario_id"] = $_POST["usuario_id"];

        $model = new Carrinho();

        if($data["id"] == 0){
            $model->insert($data);
        }else{
            $model->update($data);
        }

        $this->redirect("carrinho/listar");
    }

    function editar($id){
        $model = new Carrinho();
        $dados = $model->getById($id);
        $this->view("carrinho/formulario_carrinho",compact('dados'));
    }

    function deletar($id){
        $model = new Carrinho();
        $model->delete($id);
        $this->redirect("carrinho/listar");
    }
}