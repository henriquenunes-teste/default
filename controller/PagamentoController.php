<?php


class PagamentoController extends Controller{
    function novo(){
        $dados = array();

        $dados["id"] = 0;
        $dados["valor"] = 0;
        $dados["taxa"] = 0;
        $dados["data"] = "01-01-2026";

        $this->view("pagamento/formulario-pagamento",compact('dados'));
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

        $this->redirect("pagamento/listar");
    }

    function listar(){
        $model = new Pagamento();
        $pagamentos = $model->getAll();
        $this->view("pagamento/listagem-pagamento",compact('pagamentos'));
    }
    
    function alterar($id){
        $model = new Pagamento();
        $dados = $model->getById($id);
        $this->view("pagamento/formulario-pagamento",compact('dados'));
    }

    function deletar($id){
        $model = new Pagamento();
        $model->delete($id);
        $this->redirect("pagamento/listar"); 
    }
}