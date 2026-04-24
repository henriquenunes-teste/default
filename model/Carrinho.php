<?php


class Carrinho extends Model {
    protected $tabela = "carrinho";
    protected $orderBy = "total";

    public function usuario(){
        $sql = "SELECT usuarios.nome AS user_name FROM usuarios INNER JOIN {$this->tabela} ON  usuarios.id = {$this->tabela}.usuario_id";

        $con = $this->getConnection();

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    

    public function itens(){
        
    }

}