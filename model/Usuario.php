<?php



class Usuario extends Model{
    protected $tabela = 'usuarios';
    protected $orderBy = 'nome'; 
    
    public function carrinhos($usuario_id){
        $sql = "SELECT carrinho.* FROM carrinho INNER JOIN {$this->tabela} ON carrinho.usuario_id = {$this->tabela}.id WHERE carrinho.usuario_id = {$usuario_id}";

        $con = $this->getConnection();

        $stmt = $con->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        // $conexao = $this->getConnection();
        // $resultado = $conexao->prepare("DELETE FROM $this->tabela WHERE id=:id");
        // $resultado->bindParam(":id",$id);
        // $resultado->execute();

        if(count($this->carrinhos($id)) < 1){
            $conexao = $this->getConnection();
            $resultado = $conexao->prepare("DELETE FROM $this->tabela WHERE id=:id");
            $resultado->bindParam(":id",$id);
            $resultado->execute();
            return true;
        }else{
            return false;
        }
    }

    public function update($data){
        if(count($this->carrinhos($data["id"])) < 1){
            $conexao = $this->getConnection();
            $sentenca = $conexao->prepare("UPDATE $this->tabela SET nome = :nome,senha = :senha WHERE id=:id");
            $sentenca->bindParam(":id",$data["id"]);
            $sentenca->bindParam(":nome",$data["nome"]);
            $sentenca->bindParam(":senha",$data["senha"]);
            $sentenca->execute();
    
            return true;
        }else{
            return false;
        }
    }
}