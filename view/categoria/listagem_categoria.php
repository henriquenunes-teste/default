<div class="container-fluid">
    <h1 class="pb-3">Categorias</h1>
    <a class="btn btn-primary" href="novo">Novo</a>    
    <a href="<?php echo APP."/"; ?>" class="btn btn-success">Voltar</a>   
    <div class="pt-3"> 
        <table class="table table-bordered table table-sm table align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Excluir</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($categorias as $categoria) {
                        echo "
                            <tr>
                                <th>{$categoria['id']}</th>
                                <th>{$categoria['nome']}</th>
                                <td style='font-weight: bolder;'>{$categoria['cor']}</td>
                                <td><a class='btn btn-danger' href='excluir/{$categoria['id']}'>x</a></td>
                                <td><a class='btn btn-primary' href='editar/{$categoria['id']}'>+</a></td>
                                
                            </tr>
                        ";
                    }                      
                ?>
            </tbody>            
        </table>
    </div>
</div>
