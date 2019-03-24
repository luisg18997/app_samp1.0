<div id="container">
    <div class="login" style="margin: auto">
        <h3>Inicio de Sesión</h3>
        <form id="login" method="post" action="<?=RUTA_HTTP?>usuario/autenticar" class="login"
              onsubmit="return validar('login')" accept-charset="UTF-8">
              <div class="container">
                <div class="form-group">
                    <label for="correo">Correo:</label> 
                  <input type="email" name="email" id="email" onblur="formulario(this)"
                               placeholder="Ingrese su email" required maxlength="50" class="form-control">
                </div>
                <div class="form-group">
                   <label for="clave">Clave:</label>
                   <input type="password" name="clave" id="clave" title="clave" onblur="formulario(this)" placeholder="ingrese su clave" minlength="6" maxlength="12" class="form-control">
                    
                </div>

                <div class="form-group">
                        <input type="submit" class="btn-primary" value="enviar">
                        <input type="reset" value="cancerlar">
                </div>
            </div>
        </form>
        <div >
            <a href="<?=RUTA_HTTP?>usuario/clave/correo">¿Olvido Clave?</a>
            <br>
            <a href="<?=RUTA_HTTP?>usuario/nuevo">Usuario Nuevo</a>
        </div>
    </div>
</div>