
    <form action="<?php echo APP.'/categoria/gravar'; ?>" method="POST">
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $dados['id']; ?>">
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dados['nome']; ?>">
        </div>
        <div class="mb-3">
            <label for="cor" class="form-label">Cor</label>
            <input type="cor" class="form-control" id="cor" name="cor" value="<?php echo $dados['cor']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>
