
    <h1>Listagem de Categorias</h1>
    <a class="btn btn-primary" href="novo">Novo</a>    
    <a href="<?php echo APP."/home"; ?>" class="btn btn-success">Voltar</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Cor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($categorias as $categoria) {
                    echo "
                        <tr>
                            <th>{$categoria['id']}</th>
                            <th>{$categoria['nome']}</th>
                            <td>{$categoria['cor']}</td>
                            <td><a class='btn btn-danger' href='excluir/{$categoria['id']}'>x</a></td>
                            <td><a class='btn btn-primary' href='editar/{$categoria['id']}'>+</a></td>
                            
                        </tr>
                    ";
                }   
                
            ?>
        </tbody>
    </table>
   
