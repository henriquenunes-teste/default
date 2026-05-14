<div class="container-fluid">
    <h1>Pagamentos</h1>
    <form action="<?php echo APP.'/pagamento/gravar'?>" method="post">
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input readonly type="number" class="form-control" name="id" value="<?php echo $dados["id"] ?>">
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <span>R$</span>
            <input type="number" step="0.01" class="form-control" name="valor" value="<?php echo $dados["valor"] ?>">
        </div>
        <div class="mb-3">
            <label for="taxa" class="form-label">Taxa:</label>
            <input type="number" step="0.01"  class="form-control" name="taxa" value="<?php echo $dados["valor"] ?>">
            <span>%</span>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" value="<?php echo $dados["valor"]; ?>" name="data" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
