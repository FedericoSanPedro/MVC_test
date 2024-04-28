<?php 

include_once(VIEWS_PATH."nav-bar.php"); 

if($message != '')
{
    echo '<script language="javascript">alert("' . $message . '");</script>';
}
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
            <form class="form-container border rounded-lg" action="<?= FRONT_ROOT ?>Account/registerPerson" method="POST">
                <h2>Ingresar Email:</h2><br>

                <div class="form-row">
                    <div class="col-9">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control mb- lg" name="email" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Continuar</button>
            </form>
        </div>
    </div>
</div><br><br>