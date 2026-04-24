<?php



class Usuario extends Model{
    protected $tabela = 'usuarios';
    protected $orderBy = 'nome'; 
    
    public function carrinhos($id){
        return $this->has_many('carrinho','usuario_id',$id);
    }
}