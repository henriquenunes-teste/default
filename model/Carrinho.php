<?php


class Carrinho extends Model {
    protected $tabela = "carrinho";
    protected $orderBy = "total";

    public function usuario($id){
        return $this->belongs_to('usuarios','id',$id);
    }

    public function itens($id){
        return  $this->has_many('itens','carrinho_id',$id);
    }

}