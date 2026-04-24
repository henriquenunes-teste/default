
    <h1>Usuário</h1>

    <form action="<?php echo APP."/usuario/gravar"?>" method="post">
        <div>
            <label for="id" class="form-label">ID</label>
            <input readonly type="number" value="<?php echo $data["id"]; ?>" name="id" class="form-control">
        </div>

        <div>
            <label for="nome" class="form-label">Nome</label>
            <input type="text" value="<?php echo $data["nome"]; ?>" name="nome" class="form-control">
        </div>

        <div>
            <label for="senha" class="form-label">Senha</label>
            <input type="text" value="<?php echo $data["senha"]; ?>" name="senha" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
