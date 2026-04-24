<?php


  class CategoriaController extends Controller{
    function listar() {
       $model = new Categoria();
       $categorias = $model->getAll(); 
       include "view/categoria/listagem_categoria.php";
    }

    function novo() {
        $dados = array();
        $dados['id'] = 0;
        $dados['nome']  = "";
        $dados['cor'] = "";
        include "view/categoria/formulario_categoria.php";    
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
        header('location: listar');
      

    }

    function editar($id) {
        $model = new Categoria();
        $dados = $model->getById($id);
        include "view/categoria/formulario_categoria.php";              
    }

    function excluir($id) {
        $model = new Categoria();
        $model->delete($id);
        header('location: '.APP.'/categoria/listar'); 
    }
  }
?>