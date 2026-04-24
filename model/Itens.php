<?php


class Itens extends Model {
    protected $tabela = "itens";
    protected $orderBy = "valor";

    public function produto($id){
        return $this->belongs_to("produtos","id",$id);
    }

    public function carrinho($id){
        return $this->belongs_to("carrinho","id",$id);
    }
}