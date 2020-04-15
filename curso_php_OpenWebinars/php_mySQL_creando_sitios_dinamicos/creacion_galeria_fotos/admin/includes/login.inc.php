<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 form_login">
            <form class="form-signin" method="post" action="actions/login.act.php">
                <h4 class="form-signin-header">Por favor, registrese:</h4>
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" name="email_login" id="email_login" class="form-control frm_login_email" placeholder="Email" required autofocus>
                <label for="inputPassword" class="sr-only">Contraseña</label>
                <input type="password" name="login_password" id="login_password" class="form-control frm_login_pass" placeholder="Contraseña" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
                <br>
                <a class="btn btn-lg btn-warning btn-block" href="index.php?page=new">Alta nuevo autor</a>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>