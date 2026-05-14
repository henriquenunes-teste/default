<div class="container-fluid">    
    <h1 class="pb-3">Listagem Produtos</h1>
    <a href="<?php echo APP.'/produto/novo'?>" class="btn btn-success">Novo</a>
    <a href="<?php echo APP."/"; ?>" class="btn btn-success">Voltar</a>
    <div class="pt-3"> 
        <table class="table table-bordered table table-sm table align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preco</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($produtos as $produto){
                        echo "
                            <tr>
                                <td>".$produto["id"]."</td>
                                <td>".$produto["nome"]."</td>
                                <td>".$produto["quantidade"]."</td>
                                <td>".$produto["preco"]."</td>
                                <td><a class='btn btn-primary' href=".APP.'/produto/editar/'.$produto["id"].">Editar</a></td>
                                <td><a class='btn btn-danger' href=".APP.'/produto/deletar/'.$produto["id"].">X</a></td>
                            </tr>
                        ";
                    }                
                ?>
            </tbody>
        </table>
    </div>
</div>
