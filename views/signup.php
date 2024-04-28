<?php


?>


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
            <form class="form-container border rounded-lg" action="<?= FRONT_ROOT ?>Account/create" method="POST">
                <h1>Registro</h1>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <div class="invalid-feedback">
                            <?php echo $message; ?>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div class="invalid-feedback">
                             El password no coincide
                        </div>
                    </div>
                
                <br>
                
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
        </div>
    </div>
</div>
