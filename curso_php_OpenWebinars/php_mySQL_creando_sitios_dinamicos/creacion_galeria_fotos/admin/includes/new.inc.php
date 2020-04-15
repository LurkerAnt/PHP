<div class="container">
    <div class="row">
        <div class="col-lg-12 text-lett">
            <h2 class="mt-5">Nuevo Autor</h2>
        </div>
    </div>
    <div class="row form_new">
        <div class="col-lg-12 text-lett">
            <div class="col-lg-2 text-lett"></div>
            <div class="col-lg-10 text-lett">
                <form role="form" action="actions/new.act.php" method="POST">

                    <div class="form-group row">
                        <label for="display_name" class="col-lg-2 col-form-label">Nombre</label>
                        <div class="col-lg-4 text-lett">
                            <input type="text" class="form-control" id="display_name" name="display_name" id="display_name" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="gorm-group row">
                        <label for="email" class="col-lg-2 col-form-label">Email</label>
                        <div class="col-lg-6 text-lett">
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-lg-2 col-form-label">Contraseña</label>
                        <div class="col-lg-4 text-lett">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="enabled" class="col-lg-2 col-form-label">Activado</label>
                        <div class="col-lg-3 text-lett">
                            <input type="checkbox" name="enabled" id="enabled">
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-lg-2 text-lett"></div>
        </div>
    </div>
</div>