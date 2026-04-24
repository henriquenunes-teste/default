<?php
abstract class Model {
    protected $tabela = "";
    protected $orderBy = "";

    function getConnection(){
        $host = 'localhost';
        $port = '5432';
        $dbname = 'test';
        $user = 'postgres';
        $password = 'senha123';

        try {
            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

            $pdo = new PDO($dsn,$user,$password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            return $pdo;
        }catch(PDOException $e){
            return null;
        }
    }

    function getAll(){
        $conexao = $this->getConnection();
        $resultado =$conexao->query("SELECT * FROM $this->tabela ORDER BY $this->orderBy",PDO::FETCH_ASSOC);
        $dados = $resultado->fetchAll();
        return $dados;
    }

    function getById($id){
        $conexao = $this->getConnection();
        $resultado = $conexao->prepare("SELECT * FROM $this->tabela WHERE id=:id");
        $resultado->bindParam(":id",$id);
        $resultado->execute();
        $dados = $resultado->fetch();
        return $dados;
    }

    function delete($id){
        $conexao = $this->getConnection();
        $resultado = $conexao->prepare("DELETE FROM $this->tabela WHERE id=:id");
        $resultado->bindParam(":id",$id);
        $resultado->execute();
    }

    function insert($data){
        unset($data["id"]);

        $chaves = array_keys($data);

        $campos = implode(", ",$chaves);
        $valores = ':'. implode(", :",$chaves);

        $conexao = $this->getConnection();

        $sentenca = $conexao->prepare("INSERT INTO $this->tabela ($campos) VALUES ($valores)");

        foreach($chaves as $chave){
            $sentenca->bindParam(":".$chave,$data[$chave]);
        }

        $sentenca->execute();
    }

    function update($data){
        // Pegamos o valor da chave id do parâmetro array data e guardamos numa variável de mesmo nome
        $id = $data["id"];

        // Tiramos a referência de valor da chave id
        unset($data["id"]);

        // Pegamos todas as chaves de data e guardamos em uma variável
        $chaves = array_keys($data);

        // Cria uma string vazia para registrar o quee será atualizado
        $campos = "";

        // Percorre o array de keys
        foreach($chaves as $chave){
            // Se já tiver coisa das outras iterações, adiciona uma virgula
            // Se o tamanho de "campos" for diferente de zero
            if(strlen($campos)!=0){
                // Coloca uma string na frente do campos
                $campos = $campos.', ';
            }

            // adiciona o set
            // ..., nome=:nome
            $campos = $campos."$chave = :$chave";
        }

        
        $conexao = $this->getConnection();

        $sentenca = $conexao->prepare("UPDATE $this->tabela SET $campos WHERE id=:id");

        foreach($chaves as $chave){
            $sentenca->bindParam(":".$chave,$data[$chave]);
        }

        $sentenca->bindParam(":id",$id);

        $sentenca->execute();
    }

    protected function has_many($table,$foreign_key,$id){
        $sql = "SELECT * FROM $table WHERE $foreign_key = :id";

        $conexao = $this->getConnection();
        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    protected function belongs_to($table,$key,$foreign_key){
        $sql = "SELECT * FROM $table WHERE $key = :id";

        $conexao = $this->getConnection();
        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(":id",$foreign_key);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }


    
}