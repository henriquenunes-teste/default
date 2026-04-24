
    <form action="<?php echo APP."/carrinho/gravar"; ?>" method="post">
        <div>
            <label for="id" class="form-label">ID:</label>
            <input readonly type="number" value="<?php echo $dados["id"]; ?>" name="id" class="form-control">
        </div>
        <div>
            <label for="total" class="form-label">Total</label>
            <input type="number" value="<?php echo $dados["total"] ?>" name="total" class="form-control mb-3" step="0.01">
        </div>


        <div>
            <select name="usuario_id" class='form-select mb-3' >
                <?php
                    foreach($usuarios as $usuario){
                        echo "
                            <option value=".$usuario["id"]." label=".$usuario["nome"]." />
                        ";
                    }
                ?>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
