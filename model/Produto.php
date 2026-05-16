<?php


class Produto extends Model {
    protected $tabela = "produtos";
    protected $orderBy = "nome";

    public function categorias(){
       $sql = "SELECT categoria.*,produtos.nome AS produto_nome FROM categoria INNER JOIN produto_categoria ON categoria.id = produto_categoria.categoria_id INNER JOIN produtos ON produtos.id = produto_categoria.produto_id";

        $pdo = $this->getConnection();

        $resultado = $pdo->query($sql,PDO::FETCH_ASSOC);

        $dados = $resultado->fetchAll();

        return $dados;
    }
}