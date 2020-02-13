<div class="col-xs-4"></div>
<div class="col-xs-4">
    <?php echo form_open('auth/autenticar'); ?>
    <h1 class="page-header">Ingreso al sistema 🔐</h1>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    
    <br/>
    <div class="form-group">
        <label for="inputEmail">Email:</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Ingrese su email" name="Correo" />
    </div>
    <div class="form-group">
        <label for="inputPassword">Password:</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Ingrese su password" name="Password" />
    </div>
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
    </div>
    <?php echo form_close(); ?>
</div>