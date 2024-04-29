<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-text">
        MVC
    </span>

    <?php 
        if(isset($_SESSION[`account`])){ ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>account/viewAccount">Ver Cuenta</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>account/logOff">Cerrar Sesion</a>
                </li>

            </ul>
    <?php } else{?>
            
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo FRONT_ROOT ?>account/logIn">Iniciar Sesion</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo FRONT_ROOT ?>account/register">Crear Cuenta</a>
            </li>

        </ul>

    <?php } ?>

</nav>
