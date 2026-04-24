<?php


class PagamentoController extends Controller{
    function novo(){
        $dados = array();

        $dados["id"] = 0;
        $dados["valor"] = 0;
        $dados["taxa"] = 0;
        $dados["data"] = "01-01-2026";

        include "view/pagamento/formulario-pagamento.php";
    }


    function gravar(){
        $dados = array();
        $dados["id"] = $_POST["id"];
        $dados["valor"] = $_POST["valor"];
        $dados["taxa"] = $_POST["taxa"];
        $dados["data"] = $_POST["data"];

        $model = new Pagamento();

        if($dados["id"] == 0){
            $model->insert($dados);
        }else{
            $model->update($dados);
        }

        header("location: listar");
    }

    function listar(){
        $model = new Pagamento();
        $pagamentos = $model->getAll();
        include "view/pagamento/listagem-pagamento.php";
    }
    
    function alterar($id){
        $model = new Pagamento();
        $dados = $model->getById($id);
        include "view/pagamento/formulario-pagamento.php";
    }

    function deletar($id){
        $model = new Pagamento();
        $model->delete($id);
         header('location: '.APP.'/pagamento/listar'); 
    }
}