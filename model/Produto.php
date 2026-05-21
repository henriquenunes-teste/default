<?php


class Produto extends Model {
    protected $tabela = "produtos";
    protected $orderBy = "nome";

    public function categorias($produto_id){
       $sql = "SELECT categoria.* FROM produtos INNER JOIN produto_categoria ON  produtos.id = produto_categoria.produto_id INNER JOIN categoria ON categoria.id = produto_categoria.categoria_id WHERE produtos.id = :id";

        $pdo = $this->getConnection();

        $resultado = $pdo->prepare($sql);

        $resultado->bindValue(":id",$produto_id);

        $resultado->execute();

        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    public function addCategoria($produto_id,$categoria_id){
        $sql = "INSERT INTO produto_categoria (produto_id,categoria_id) VALUES (:produto_id,:categoria_id)";

        $pdo = $this->getConnection();

    

        $resultado = $pdo->prepare($sql);

        $resultado->bindParam(":produto_id",$produto_id);
        $resultado->bindParam(":categoria_id",$categoria_id);

        $resultado->execute();
    }
}