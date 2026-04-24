    <h1>Pagamentos</h1>
    <form action="<?php echo APP.'/pagamento/gravar'?>" method="post">
        <div>
            <label for="id" class="form-label">ID</label>
            <input readonly type="number" class="form-control" name="id" value="<?php echo $dados["id"] ?>">
        </div>

        <div>
            <label for="valor" class="form-label">Valor:</label>
            <span>R$</span>
            <input type="number" step="0.01" class="form-control" name="valor" value="<?php echo $dados["valor"] ?>">
        </div>

        <div>
            <label for="taxa" class="form-label">Taxa:</label>
            <input type="number" step="0.01"  class="form-control" name="taxa" value="<?php echo $dados["valor"] ?>">
            <span>%</span>
        </div>
        <div>
            <label for="data" class="form-label">Data:</label>
            <input type="date" value="<?php echo $dados["valor"]; ?>" name="data" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
