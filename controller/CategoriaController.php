<?php


  class CategoriaController extends Controller{
    function listar() {
       $model = new Categoria();
       $categorias = $model->getAll(); 
       $this->view("categoria/listagem_categoria",compact('categorias'));
    }

    function novo() {
        $dados = array();
        $dados['id'] = 0;
        $dados['nome']  = "";
        $dados['cor'] = "";
        $this->view("categoria/formulario_categoria",compact('dados'));    
    }

    function gravar() {
        $dados = array();
        $dados['id'] = $_POST['id'];
        $dados['nome'] = $_POST['nome'];
        $dados['cor'] = $_POST['cor'];

        $model = new Categoria();
        if ($dados['id'] == 0) {
          $model->insert($dados);
        } else {
          $model->update($dados);
        }
        // header location funciona como redirecionador
        $this->redirect('categoria/listar');
      

    }

    function editar($id) {
        $model = new Categoria();
        $dados = $model->getById($id);
        $this->view('categoria/formulario_categoria',compact('dados'));             
    }

    function excluir($id) {
        $model = new Categoria();
        $model->delete($id);
        $this->redirect("categoria/listar"); 
    }
  }
?>