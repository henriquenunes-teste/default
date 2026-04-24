
    <h1>Listagem de usuarios</h1>
    <a href="<?php echo APP."/usuario/novo"; ?>" class="btn btn-success">Novo</a>
    <a href="<?php echo APP."/home"; ?>" class="btn btn-success">Voltar</a>
    <table class="table">
        <thead>
            <tr>
                <td scope="col">ID</td>
                <td scope="col">Nome</td>
                <td scope="col">Senha</td>
                <td scope="col">Editar</td>
                <td scope="col">Deletar</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($usuarios as $usuario){
                    echo "
                        <tr>
                            <td>{$usuario["id"]}</td>
                            <td>{$usuario["nome"]}</td>
                            <td>{$usuario["senha"]}</td>
                            <td><a class='btn btn-primary' href=".APP.'/usuario/editar/'.$usuario["id"].">Editar</a></td>
                            <td><a class='btn btn-danger' href=".APP.'/usuario/deletar/'.$usuario["id"].">Excluir</a></td>
                        <tr>
                    ";
    
                }
            ?>
        </tbody>
    </table>
