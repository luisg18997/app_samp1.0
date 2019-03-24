function validar(dato) { // validar formulario
    var formulario = document.getElementById(dato);
    var limite=formulario.length;
    var todocorrecto = true;
    var nclave=0;
    var extension=/(.pdf)$/i;
    for (var i=0; i<limite; i++){
        if(formulario[i].disabled!=true){
            if(formulario[i].type == 'text'){ //validar input tipo texto
                if (formulario[i].value== null || formulario[i].length== 0  || /^\s*$/.test(formulario[i].value)) {
                    alert("El campo "+ formulario[i].id + " No puede estar vacio");
                    formulario[i].focus();
                    todocorrecto=false;
                    return false;
                }
            }else if(formulario[i].type == 'email'){ //validar input tipo email
                if (! /\S+@\S+\.\S+/.test(formulario[i].value)){
                    alert(formulario[i].id + " no es valido");
                    formulario[i].focus();
                    todocorrecto=false;
                    return false;
                }
            }else if(formulario[i].type == 'password'){ //valirdad input tipo password
                if(!/^\s*$/.test(formulario[i].value)){
                    nclave++;
                    if( nclave == 1 ){
                        var clave = formulario[i].id;
                    }else if (nclave == 2){ //compararar claves
                        var confirm = confirclave(clave, formulario[i].id);
                        if(confirm == false){
                            formulario[i].focus();
                            todocorrecto=false;
                            return false;
                        }
                    }
                }else{
                    alert(formulario[i].id + 'No puede contener espacio');
                     formulario[i].focus();
                    todocorrecto=false;
                    return false;
                }
            }else if(formulario[i].type== 'submit' || formulario[i].type== 'reset' ||
                formulario[i].type== 'button' || formulario[i].type== 'hidden'){ //input submit reset button hidden
            }else if(formulario[i].type=== 'date' || formulario[i].type=== 'datetime'){
                if (formulario[i].value==''){
                    alert(formulario[i].id + ' no puede estar vacio');
                    formulario[i].focus();
                    todocorrecto=false;
                    return false;
                }
            }else if(formulario[i].type=='file'){
                    if(!extension.exec(formulario[i].value)){
                    alert('El archivo no es el permitido debe ser .pdf');
                     formulario[i].focus();
                    todocorrecto=false;
                    return false;
                }
            }else{ // comproboar select
                var indice= formulario[i].selectedIndex;
                if(indice==''){
                    alert("Seleccione "+ formulario[i].id);
                    todocorrecto=false;
                    formulario[i].focus();
                    return false;
                }
            }
        }
    }
    return todocorrecto;
}

function confirclave(clave,con){  //confirmar claves de registro de usuario
    var c1= document.getElementById(clave);
    var c2 = document.getElementById(con);
    if(c1.value != c2.value){
        alert("las claves no coinciden");
        return false;
    }else{
        return true;
    }
}
 
function ruta(msj,url) { // rediccionar 
    alert(msj);
    window.location.href=url;
}

function veremil(id, btn) { //  verificar emal
    var conemail = document.getElementById(id);
    var enviar = document.getElementById(btn);
    for (i = 0; i < email.length; i++) {
        //alert(email[i]);
        if (conemail.value == email[i]) {
            alert('El correo esta registrado');
            enviar.disabled = true;
            conemail.focus();
            return false;
        }
    }
    if (enviar.disabled == true){
        enviar.disabled=false;
    }
    return true;
}

function valecedula(id,id2,env){
    var nc = document.getElementById(id);
    var ced = document.getElementById(id2);
    var btn = document.getElementById(env);
    for(i=0; i < cedula.length; i++){
        if(nc.value==nac[i] && ced.value== cedula[i]){
          alert('La cedula esta registrada');  
          btn.disabled = true;         
            return false;
        }
    }
    if (btn.disabled == true){
        btn.disabled=false;
    }
    return true;

}

function valemail(id,form) {
    var conemail = document.getElementById(id);
    var recuperar= document.getElementById(form);
    var correcto = false;
    for (i=0; i<email.length; i++){
        if(conemail.value==email[i]){
            if(fecha_elim[i]==''){
                recuperar.submit();
                correcto = true;
                return true;
            }else{
                alert('No puede cambiar la clave, el usuario fue eliminado' +
                    ' por el administrador!!');
                return false;
            }
        }
    }
    if (correcto!=true){
        alert("El correo no esta registrado en el sistema");
        if(confirm("¿Desea registrarse en el sistema?")){
            window.location.href="../nuevo";
        }else{
           window.location.href="../../";
        }
    }
}

function formulario(valor){
    if(valor.value == ""){
        valor.className = "error";
    }
    else{
        valor.className = "campos";
    }
}

function clavever(id1, id2) {
    var clavepr= document.getElementById(id1);
     var clavese= document.getElementById(id2);
    if (clavepr.value!="" && !/^\s*$/.test(clavepr)){
        clavese.disabled = false;
    } else{
        clavese.value=null;
        clavese.length=0;
        clavese.disabled = true;
    }
}

function validarusu(opcion, valor, dato, vista) {
    var prim = document.getElementById(opcion);
    var  x = document.getElementById(valor);
    var aux= document.getElementById(dato);
    var div = document.getElementById(vista);
    aux.style.display="none";
    div.style.display="block"
    if (prim.value=='SI'){
        x.value=1;
        div.innerHTML= "<p>SI</p>";
    }else if(prim.value=='NO') {
        x.value=0;
        div.innerHTML= "<p>NO</p>";
    }
    return x;
}

function limpiarselect(id) {
    var  lista = document.getElementById(id);
    lista.length= 0;
    var opcion=document.createElement("option");
    opcion.value=null;
    opcion.text="Seleccione...";
    opcion.selected= true;
    lista.add(opcion);
}

function llenarselect(valor, nombre, codigo, referencia, id, idaux, id2,x) {
    var limite = nombre.length;
    var lista = document.getElementById(id);
    limpiarselect(id);
    if(valor!=0){
        lista.disabled = false;
        if (idaux==true){
            var lista2 = document.getElementById(id2);
            if(x!=2){
                limpiarselect(id2);
                lista2.disabled=true;
            }else{
                lista2.value="";
                lista2.selectedIndex;
            }
        }
        for (var i=0; i<limite; i++){
            if(valor==referencia[i]){
                var opcion=document.createElement("option");
                opcion.value= codigo[i];
                opcion.text=nombre[i];
                lista.add(opcion);
            }
        }
    }else{
        lista.disabled = true;
        if (idaux==true){
            if(x!=2){
                limpiarselect(id2);
                lista2.disabled=true;
            }else{
                lista2.value=' ';
                lista2.selectedIndex;
            }
        }
    }
}

function selectesc(valor,ref,v2){
    var vl =document.getElementById(valor);
    var dato= document.getElementById(ref);
    var vl2= document.getElementById(v2);
    switch (vl.id){
        case 'rol':{
            if (vl.value==2){
                dato.style= null;
                vl2.disabled=false;
                vl2.value='';
                vl2.selectedIndex;
            }else{
                dato.style.display= 'none';
                vl2.disabled=true;
                vl2.value='';
                vl2.selectedIndex;
            }
            break;
        }
        case 'ubicacion':{
            if (vl.value==1){
                dato.disabled=false;
                vl2.value='';
                vl2.selectedIndex;
            }else{
                vl2.value='';
                vl2.selectedIndex;
                dato.disabled=true;

            }
            break;
        }
    }
}

/*function deshabilitaRetroceso(){ //retroceso
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){};
}*/

function valida(event){ // validar si es numero
    if((event.charCode >= 48 && event.charCode <= 57) || event.keyCode==9 || event.keuCode==37 || event.keyCode==39 || event.keyCode==8){
        return true;
    }
    return false;
}

function unid_ejec(id, cod1, id2, idaux,max,codaux) {
    var opcion = document.getElementById(id);
    var limite = ejecutora.length;
    var unidad = document.getElementById(id2);
    switch (opcion.id){
        case "catedra":{
           for (var i=0; i<limite; i++) {
               if (codigoejec[i] == cod1) {
                   unidad.value=idejec[i];
                   unidad.selectedIndex;
                   unidad.selected=true;
               }
           }
            break;
        }
        case 'unidad ejecutora':{
            var correcto=false;
           var aux = document.getElementById(idaux);
           if(unidad.disabled==true){
               unidad.disabled=false;
           }
           for(var i=0; i<catedras.length-1;i++){
               if(cod1==codigocat[i]){
                   unidad.length=0;
                   var opcion=document.createElement("option");
                   opcion.value= idcatedra[i];
                   opcion.text=catedras[i];
                   unidad.add(opcion);
                   unidad.selectedIndex;
                   correcto=true;
               }
           }
           if(correcto==true){
               for (var i=0; i<catedras.length-1;i++){
                   if (unidad.value==idcatedra[i]){
                       aux.value=iddepcatedra[i];
                       aux.selectedIndex;
                   }
               }
           }else{
               for (var i=0; i<departamentos.length-1;i++){
                   if(cod1==codigodep[i]){
                       aux.value=iddepartamento[i];
                       aux.selectedIndex;
                       llenarselect(aux.value,catedras,idcatedra,iddepcatedra,'catedra');
                   }
               }
           }

            break;
        }
    }
}

function fecinifin(id,id2) {
    fecha1 = document.getElementById(id);
    fecha2= document.getElementById(id2);
    switch (fecha1.id){
        case 'fecha inicio':{
            fecha2.disabled=false;
            fecha2.min= fecha1.value;
            break;
        }
        case 'fecha fin':{
            if(fecha2.value==null){
                fecha2.max=fecha1.value;
            }
            if(fecha1<fecha2){
                alert(fecha1+ ' no puede ser menor que ' + fecha2);
            }
        }
    }
}

function visible(dato,opc1,opc2) {
    var id1=document.getElementById(opc1);
    var id2=document.getElementById(opc2);
    id1.style.display='none';
    if(dato.value){
        id2.disabled=false;
    }else{
        id2.disabled=true;
    }
}

function direccion(valor,ref){
    dato=document.getElementById(ref);
    if(valor=='Piso'){
        dato.disabled=false;
        dato.required=true;
    }else{
        dato.disabled=true;
    }
}


function sueldoselect(id,id2,id3,id4){
    var dato = document.getElementById(id);
    var dato1 = document.getElementById(id2);
    var dato2 = document.getElementById(id3);
    var sueldoto = document.getElementById(id4);
    if(dato1.value==1){
        var dedicacion = document.getElementById('dedicacion propuesta');
    }else{
        var dedicacion = document.getElementById('dedicacion actual');
    }
    if(dato.value!=0){
        for (var i = 0; i<sueldo.length-1; i++) {
            if(iddedsueldo[i]==dedicacion.value && idcatsueldo[i]==dato.value){
                dato2.value=idsueldo[i];
                dato2.selectedIndex;
                dato2.disabled=true;
                sueldoto.value=idsueldo[i];

            }
        }
    }else{
        dato2.value='';
        sueldoselect.value=null;
        dato2.selectedIndex;
        dato2.selected=true;
    }
    
}

function anexo(dato, id){
    var view =document.getElementById('subir');
    var view2= document.getElementById('anexo');
    if(dato=='aceptar'){
        view.style.display='none';
        view2.style=null;
        var anexos=document.getElementById(id).value;
        var separador= ";";
        var resultado= anexos.split(separador);
        
        agganexos(resultado,view2);
    }else if(dato=='rechazar'){
        view.style.display='none';
        view2.style.display='none';
    }
}

function agganexos(valor, vista,){
    var j=0;
    var lim= valor.length;
    var impar= false;
    if(lim%2!=0){
        impar= true;
    }

    for (var i=valor.length-1; i>=0; i--){
    var newlabel= document.createElement("label");
    var newinput = document.createElement("input");
    var newtd=document.createElement('td');
    var newtd1=document.createElement('td');
        newlabel.innerHTML=valor[i];
        newinput.type='file';
        newinput.accept='.pdf';
        newinput.name=valor[i];
        newinput.required=true;
        if(impar==true){
            var newtr=document.createElement('tr');
            var newtd2=document.createElement('td');
            var newtd3=document.createElement('td');
            newtr.appendChild(newtd2);
            newtr.appendChild(newtd);
            newtr.appendChild(newtd1);
            newtd.appendChild(newlabel);
            newtd1.appendChild(newinput);
            newtr.appendChild(newtd3);
            vista.parentNode.insertBefore(newtr, vista.nextSibling);
            impar=false;
        }else{
            if(j==0){
                var newtr=document.createElement('tr');
                newtr.appendChild(newtd);
                newtr.appendChild(newtd1);
                newtd.appendChild(newlabel);
                newtd1.appendChild(newinput);
                j++;
            }else{
                newtr.appendChild(newtd);
                newtr.appendChild(newtd1);
                newtd.appendChild(newlabel);
                newtd1.appendChild(newinput);
                vista.parentNode.insertBefore(newtr, vista.nextSibling);
                j=0;
            }
        }
        
    }
}

function visible2(dato,id,id2,id3,x){
    var valor1= document.getElementById(id);
    var valor2= document.getElementById(id2);
    var valor3= document.getElementById(id3);
    valor1.style.display='none';
    if(dato!='aprobar'){
        valor2.style=null;
        valor3.style=null;
    }else{
        if(x==1){
            valor3.submit();
        }else{
            valor2.style=null;
            valor3.style=null;
        }
        
    }
}