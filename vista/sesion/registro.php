<h3 align="center">Registro de usuario</h3>
<form aling="center" id="registro" method="post" action="<?=RUTA_HTTP?>usuario/guardar"
      onsubmit="return validar('registro')" accept-charset="UTF-8" >
    <table style="margin: 0 auto" class="table table-responsive table-striped">
        <!--nombre -->
        <tr>
            <input type="hidden" name="x" value="1">
            <td><label for="nombre">* Nombre:</label></td>
            <td>
                <input type="text" id="nombre" required placeholder="ingrese su nombre" size="35" onblur="formulario(this)"
                       minlength="4" name="nombre" maxlength="25" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|">
            </td>
        </tr>
        <!-- apellido-->
        <tr>
            <td><label for="apellido">* Apellido:</label></td>
            <td>
                <input type="text" id="apellido" required placeholder="ingrese su apellido" size="35" onblur="formulario(this)"
                       minlength="4" name="apellido" maxlength="25" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|">
            </td>
        </tr>
        <!-- ubicacion-->
        <tr>
            <td><label for="ubicacion">* Ubicacion</label></td>
            <td>
                <select name="ubicacion" id="ubicacion" onblur="formulario(this)" onchange="selectesc('ubicacion','escuela')">
                    <option value=" ">Seleccione...</option>
                    <?php foreach ($_SESSION["ubicacion"] as $data){
                        if ($data['id']!=4){?>
                        <option value="<?=$data['id']?>"><?=$data["nombre"]?></option>
                    <?php } } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="escuela">* Escuela</label></td>
            <td>
                <select name="escuela" id="escuela" onblur="formulario(this)" disabled>
                    <option value=" ">Seleccione...</option>
                    <?php foreach ($_SESSION["escuela"] as $data){ ?>
                            <option value="<?=$data['id']?>"><?=$data["nombre"]?></option>
                        <?php  } ?>
                </select>
            </td>
        </tr>
        <!-- email -->
        <tr>
            <td><label for="email">* Email:</label></td>
            <td>
                <input type="email" id="email" name="email" placeholder="ejemplo.ejemplo@ucv.ve" onblur="formulario(this)"
                       minlength="10" required maxlength="50" size="35" onchange=" return veremil('email','enviar')">
            </td>
        </tr>
        <!-- clave-->
        <tr>
            <td> <label for="clave">* Clave:</label></td>
            <td>
                <input type="password" name="clave" minlength="6" id="clave" size="35" required maxlength="12"
                       placeholder="ingrese clave" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w\S{6,12}"
                       title=" Requisitos mínimos: 6 caracteres, una mayúscula y una minúscula.
                       Puede usar caracteres especiales (*/.}{¿'=, etc..).
                       No use espacios en blanco." onblur="formulario(this); clavever('clave','clavecon');">
            </td>
        </tr>
        <!-- confirmar clave -->
        <tr>
            <td><label for="clavecon">* Confirme Clave:</label></td>
            <td>
                <input type="password" name="clavecon" minlength="6" id="clavecon" maxlength="12" size="35"
                       placeholder="Confirme clave" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w\S{6,12}"
                       title=" Requisitos mínimos: 6 caracteres, una mayúscula y una minúscula.
                        Puede usar caracteres especiales (*/.}{¿'=, etc..).
                        No use espacios en blanco." onblur="formulario(this)" disabled="true">
            </td>
        </tr>
        <!-- mensaje -->
        <tr>
            <td colspan="2" align="center"><label>Campos Obligatorios *</label></td>
        </tr>
        <!--Botones -->
        <tr>
            <td colspan="2" align="center">
                <input type="submit" id="enviar" value="enviar">
                <input type="reset" value="restablecer">
            </td>
        </tr>
    </table>
</form>
<a href="<?=RUTA_HTTP?>">volver</a>