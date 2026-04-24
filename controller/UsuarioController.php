<?php


    class UsuarioController extends Controller{
        function listar(){
            $usuario = new Usuario();
            $usuarios = $usuario->getAll();
            include "view/usuario/listagem-usuarios.php";
        }

        function novo(){
            $data = [];
            $data["id"] = 0;
            $data["nome"]="";
            $data["senha"]="";

            include "view/usuario/formulario-usuario.php";
        }

        function gravar(){
            $data = [];
            $data["id"] = $_POST["id"];
            $data["nome"] = $_POST["nome"];
            $data["senha"] = $_POST["senha"];

            $model = new Usuario();

            if($data["id"] == 0){
                $model->insert($data);
            }else{
                $model->update($data);
            }

            header("location: ".APP."/usuario/listar");
        }

        function editar($id){
            $usuario = new Usuario();
            $data = $usuario->getById($id);
            include "view/usuario/formulario-usuario.php";
        }

        function deletar($id){
            $usuario = new Usuario();
            $usuario->delete($id);
            header("location: ".APP."/usuario/listar");
        }
    }