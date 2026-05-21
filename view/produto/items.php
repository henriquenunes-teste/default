<div>
    <?php
        foreach($categorias as $categoria){
            echo "
                <div class='rounded-1' style='background-color:{$categoria["cor"]};'>
                    <p>{$categoria["nome"]}</p>
                </div>

            ";
        }

    ?>

</div>