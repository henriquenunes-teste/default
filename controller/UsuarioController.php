<?php


    class UsuarioController extends Controller{
        function listar(){
            $usuario = new Usuario();
            $usuarios = $usuario->getAll();
            $this->view("usuario/listagem-usuarios",compact("usuarios"));
        }

        function novo(){
            $data = [];
            $data["id"] = 0;
            $data["nome"]="";
            $data["senha"]="";

            $this->view("usuario/formulario-usuario",compact("data"));
        }

        function gravar(){
            $data = [];
            $data["id"] = $_POST["id"];
            $data["nome"] = $_POST["nome"];
            $data["senha"] = $_POST["senha"];

            $model = new Usuario();

            if($data["id"] == 0){
                $model->insert($data);
                $this->redirect("usuario/listar");
            }else{
                $result = $model->update($data);

                if($result){
                    $this->redirect("usuario/listar");
                }else{
                    echo "<script>alert('Existe carrinhos que dependem deste usuario!'); window.location.href='/saborLoja/usuario/listar';</script>";
                    exit();
                }
            }

            
        }

        function editar($id){
            $usuario = new Usuario();
            $data = $usuario->getById($id);
            $this->view("usuario/formulario-usuario",compact("data"));
        }

        function deletar($id){
            $usuario = new Usuario();
            $result = $usuario->delete($id);
            if($result){
                $this->redirect("usuario/listar");
            }else{
                echo "<script>alert('Existe carrinhos que dependem deste usuario!'); window.location.href='/saborLoja/usuario/listar';</script>";
                exit();
            }
        }
    }