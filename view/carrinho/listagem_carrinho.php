
    <h1>Carrinho</h1>
    <a href="<?php echo APP."/carrinho/novo" ?>" class="btn btn-success">Novo</a>
    <a href="<?php echo APP."/" ?>" class="btn btn-success">Home</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Total</th>
                <th scope="col">Usuario</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($carrinhos as $carrinho){
                    

                    echo "
                        <tr>
                            <td>{$carrinho["id"]}</td>
                            <td>{$carrinho["total"]}</td>
                            <td>".$model->usuario($carrinho["usuario_id"])["nome"]."</td>
                            <td><a href=".APP."/carrinho/editar/".$carrinho["id"]." class='btn btn-primary'>Editar</a></td>
                            <td><a href=".APP."/carrinho/deletar/".$carrinho["id"]." class='btn btn-danger'>Deletar</a></td>
                        <tr>
                    ";
                }
            ?>
        </tbody>
    </table>

