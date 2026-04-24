
    <form action="<?php echo APP.'/produto/gravar'?>" method="post">
        <div>
            <label for="id" class="form-label">ID</label>
            <input readonly type="number" class="form-control" name="id" value="<?php echo $dados["id"] ?>">
        </div>

        <div>
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $dados["nome"] ?>">
        </div>

        <div>
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" class="form-control" name="quantidade" value="<?php echo $dados["quantidade"] ?>">
        </div>
        <div>
            <label for="preco" class="form-label">Preco:</label>
            <input type="number" step="0.01" value="<?php echo $dados["preco"]; ?>" name="preco" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
