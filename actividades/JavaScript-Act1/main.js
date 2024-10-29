 function getDatos(){
    var nombre = prompt("Nombre: ", "");
    var edad = prompt("Edad : ", "");
    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3>Nombre :'+nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3>Edad :'+nombre+'</h3>';
}


///Funcion numero 1 ; js01

function holaMundo(){
/*     document.write('Hola Mundo');
 */    var div1 = document.getElementById('uno');
    div1.innerHTML = '<h3>Hola Mundo</h3>'
}

///Function numero 2 ; js02

function funcion2(){
    var nombre = 'Juan';
    var edad = 10
    ;
    var altura = 1.92
    ;
    var casado = false
    ;

/*     document.write( nombre );
    document.write( '<br>' );
    document.write( edad );
    document.write( '<br>' );
    document.write( altura );
    document.write( '<br>' );
    document.write( casado ); */

    var div1 = document.getElementById('dos');
    div1.innerHTML = '<h3>'+nombre+'<br>'+edad+'<br>'+altura+'<br>'+casado+'</h3>'
}

///Function numero 3 ; js02

function funcion3(){
    var nombre;
    var edad;
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
/*     document.write('Hola ');
    document.write(nombre);
    document.write(' así que tienes ');
    document.write(edad);
    document.write(' años'); */

    var div1 = document.getElementById('tres');
    div1.innerHTML = '<h3>Hola '+nombre+' así que tienes '+edad+' años</h3>';
}

///Function numero 4 ; js03

function funcion4(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);
   /*  document.write('La suma es ');
    document.write(suma);
    document.write('<br>');
    document.write('El producto es ');
    document.write(producto); */

    var div1 = document.getElementById('cuatro');
    div1.innerHTML = '<h3>La suma es '+suma+'<br>'+'El producto es '+producto+'</h3>';
}

///Function numero 5 ; js03

function funcion5(){
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');
    if (nota>=4) {
        /*document.write(nombre+' esta aprobado con un '+nota);*/        
        var div1 = document.getElementById('cinco');
        div1.innerHTML = '<h3>'+nombre+' esta aprobado con un '+nota+'</h3>';
    }

}

///Function numero 6 ; js03

function funcion6(){
    var num1,num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);

    if (num1>num2) {
        num3 = num1;
        /* document.write('el mayor es '+num1);
 */
    }
    else {
        num3 = num2;
        /* document.write('el mayor es '+num2); */
    }
    var div1 = document.getElementById('seis');
    div1.innerHTML ='<h3>el mayor es '+num3+'</h3>';
    }

///Function numero 7 ; js03

function funcion7(){
    var nota1,nota2,nota3;

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);
    var div1 = document.getElementById('siete');
    
    var pro;
    pro = (nota1+nota2+nota3)/3;
    if (pro>=7) {
        //document.write('aprobado');
        div1.innerHTML ='<h3>aprobado</h3>';
    }
    else {
        if (pro>=4) {
           // document.write('regular');
            div1.innerHTML ='<h3>regular</h3>';
        }
        else {
            div1.innerHTML ='<h3>reprobado</h3>';
           // document.write('reprobado');
        }
    }
}

///Function numero 8 ; js03

function funcion8(){
    var valor;
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
    
    var div1 = document.getElementById('ocho');
    switch (valor) {
        case 1: /* document.write('uno'); */ 
            m='uno';
        break;
        case 2: /* document.write('dos'); */
            m='dos';
            break;
        case 3: /* document.write('tres'); */
            m='tres';
        break;
        case 4: /* document.write('cuatro'); */
            m='cuatro';
        break;
        case 5: /* document.write('cinco'); */
            m='cinco';
        break;
        default:/* document.write('debe ingresar un valor comprendido entre 1 y 5.') */
            m='debe ingresar un valor comprendido entre 1 y 5.';
    }
    div1.innerHTML ='<h3>'+m+'</h3>';
}

///Function numero 9 ; js03

function funcion9(){
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)' , '' );
    switch (col) {
        case 'rojo': document.bgColor='#ff0000';
        break;
        case 'verde': document.bgColor='#00ff00';
        break;
        case 'azul': document.bgColor='#0000ff';
        break;
    }
}
///Function numero 10 ; js04

function funcion10(){
    var x;
    x=1;
    var div1 = document.getElementById('diez');
    while (x<=100) {
        /* document.write(x);
        document.write('<br>'); */
        div1.innerHTML +='<h3>'+x+'<br></h3>';
        x=x+1;
    }
}

///Function numero 11 ; js04

function funcion11(){
    var x=1;
    var suma=0;
    var valor;
    while (x<=5){
        valor = prompt('Ingresa el valor:'+x, '');
        valor = parseInt(valor);
        suma = suma+valor;
        x = x+1;
    }
    var div1 = document.getElementById('11');
    div1.innerHTML +="<h3>La suma de los valores es "+suma+"<br></h3>";
    //document.write("La suma de los valores es "+suma+"<br>");
}

///Function numero 12 ; js04

function funcion12(){
    var valor;
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        //document.write('El valor '+valor+' tiene ');
        var div1 = document.getElementById('12');
        div1.innerHTML +='<h3>El valor '+valor+' tiene </h3>';
        if (valor<10)
            {
            //document.write('Tiene 1 dígitos');
            div1.innerHTML +='Tiene 1 dígitos';}
        else
            if (valor<100) {
                //document.write('Tiene 2 dígitos');
                div1.innerHTML +='Tiene 2 dígitos';
            }
            else {
                //document.write('Tiene 3 dígitos');
                div1.innerHTML +='Tiene 3 dígitos';
            }
        //document.write('<br>');
        div1.innerHTML +='<br>';
    }while(valor!=0);
}

///Function numero 13 ; js04

function funcion13(){
    var f;
    var div1 = document.getElementById('13');
    for(f=1; f<=10; f++){
        //document.write(f+" ");
        div1.innerHTML +='<h3>'+f+' <h3>';
    }
}

///Function numero 14 ; js05

function funcion14(){
    /* document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>"); */
    var div1 = document.getElementById('14');
    div1.innerHTML +='<h3>Cuidado<br></h3>';
    div1.innerHTML +="Ingresa tu documento correctamente<br>";
    div1.innerHTML +="<h3>Cuidado<br></h3>";
    div1.innerHTML +="Ingresa tu documento correctamente<br>";
    div1.innerHTML +="<h3>Cuidado<br></h3>";
    div1.innerHTML +='Ingresa tu documento correctamente<br><br>';
}

///Function numero 15 ; js05

function mostrarMensaje(){
    var div1 = document.getElementById('15');
    div1.innerHTML +="<h3>Cuidado<br></h3>";
    div1.innerHTML +="Ingresa tu documento correctamente<br><br>";
}

function funcion15(){
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

///Function numero 16 ; js05

function mostrarRango(x1,x2) {
    var inicio;
    var div1 = document.getElementById('16');
    div1.innerHTML ='';
    for(inicio=x1; inicio<=x2; inicio++) {
    div1.innerHTML +='<h3>'+inicio+'</h3> ';
    
    }
}
function funcion16(){
    var valor1,valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    mostrarRango(valor1,valor2);
}

function convertirCastellano(x) {

    if(x==1)
    return "uno";
    else
    if(x==2)
    
    return "dos";
    else
    if(x==3)
    return "tres";
    else
    if(x==4)
    
    return "cuatro";
    
    else
    
    if(x==5)
    return "cinco";
    else
    return "valor incorrecto";
    
}


///Function numero 17 ; js05

function funcion17(){
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    var div1 = document.getElementById('17');
    div1.innerHTML ='<h3>'+r+'</h3>';
}

///Function numero 18 ; js05
//Adecuada para mostrarse en el html

function convertirCastellano2(x){
    switch (x) {
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
    }
}

function funcion18(){
    var div1 = document.getElementById('18');
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano2(valor);
    div1.innerHTML ='<h3>'+r+'</h3>';
}

