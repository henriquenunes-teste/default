    <h1>Produtos</h1>
    <a href="<?php echo APP.'/produto/novo'?>" class="btn btn-success">Novo</a>
    <a href="<?php echo APP."/"; ?>" class="btn btn-success">Voltar</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Foto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preco</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php 


                foreach($produtos as $produto){
                    // Pega o caminho do app
                     $caminho = APP;
                     // é diferente
                    if ($produto['foto'] != "") {
                        // Coloca uma imagem
                        $imagem = "<img src='$caminho/imagens/{$produto['foto']}' style='width: 100px; height: 100px; object-fit: cover'>";
                    }

                    echo "
                        <tr>
                            <td>".$produto["id"]."</td>
                            <td>".$imagem."</td>
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
