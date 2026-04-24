
    <a href="<?php echo APP.'/pagamento/novo'?>" class="btn btn-success">Novo</a>
    <a href="<?php echo APP."/home"; ?>" class="btn btn-success">Voltar</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Valor</th>
                <th scope="col">Taxa</th>
                <th scope="col">Data</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($pagamentos as $pagamento){
                    echo "
                        <tr>
                            <td>".$pagamento["id"]."</td>
                            <td>".$pagamento["valor"]."</td>
                            <td>".$pagamento["taxa"]."</td>
                            <td>".$pagamento["data"]."</td>
                            <td><a class='btn btn-primary' href=".APP.'/pagamento/alterar/'.$pagamento["id"].">Editar</a></td>
                            <td><a class='btn btn-danger' href=".APP.'/pagamento/deletar/'.$pagamento["id"].">X</a></td>
                        </tr>
                    ";
                }
            
            ?>
        </tbody>
    </table>
