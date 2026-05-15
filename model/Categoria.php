<?php



  class Categoria extends Model{
    protected $tabela = 'categoria';
    protected $orderBy = 'nome';

    public function produtos(){
      $sql = "SELECT categoria.*,produtos.nome FROM produtos INNER JOIN produto_categoria ON produto.id = produto_categoria.produto_id INNER JOIN  categoria ON categoria.id = produto_categoria.categoria_id";

      $pdo = $this->getConnection();

      $resultado = $pdo->query($sql,PDO::FETCH_ASSOC);

      $dados = $resultado->fetchAll();

      return $dados;
    }
  }
?>