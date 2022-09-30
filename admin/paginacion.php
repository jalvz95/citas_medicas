<?php $n_paginas= cantidad_paginas();
?>

<div class="row">
    <div class="col-12">
        <nav>
            <ul class="pagination justify-content-center">
                <?php if(pagina_actual() !=1):?>
                    <li class="page-item ">
                    <a class="page-link bg-dark bg-gradient text-white paginacion" href="?p=<?php echo pagina_actual() -1 ?>" aria-label="Next">
                    <span aria-hidden="true">&laquo;</span></a>
                <?php endif?>

                <?php for($i=1; $i<=$n_paginas; $i++):?>
                    <?php if(pagina_actual() === $i):?>
                        <li class="page-item">
                        <a class="page-link bg-dark bg-gradient text-white paginacion active_paginacion" href="?p=<?php echo $i;?>"><?php echo $i;?></a>
                        </li>
                    <?php else:?>
                        <li class="page-item ">
                            <a class="page-link bg-dark bg-gradient text-white paginacion" href="?p=<?php echo $i;?>"><?php echo $i;?></a>
                        </li>
                    <?php endif?>
                <?php endfor?>

                <?php if(pagina_actual() != $n_paginas):?>
                    <li class="page-item ">
                    <a class="page-link bg-dark bg-gradient text-white paginacion" href="?p=<?php echo pagina_actual() + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span></a>
                <?php endif?>
                </li>
            </ul>
        </nav>
    </div>
</div>