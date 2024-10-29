// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

function mensaje (estado, mensaje){
  return  `
<li><a>${estado}</a></li>
<li><a>${mensaje}</a></li>
` ;
}

  function verificarEntradas(id){
    
    let temp = id.value;
    let idOb = id.id;
    console.log(typeof(temp));
    switch(idOb) {
      case "name":
        if (temp.length > 25 || !temp.match(/^[0-9a-zA-Z]+$/)){
          return false;
        }
        break;
      case "marca":
        break;
      case "modelo":
        if (temp.length > 25 || !temp.match(/^[0-9a-zA-Z]+$/))
          return false;
        break;
      case "unidades":
        if (Number(temp) <= 0){
          console.log("ononono");
          return false;}
        break;
      case "precio":
        if (Number(temp) < 99.99)
          return false;
        break;
      case "detalle":
        if (temp.length > 250)
          return false;
        break;
      case "imagen":
        if (temp == '')
          id.value = "http://localhost/img/default.jpg";
          break;
      default:
        console.log('def');
    } 


    if ($('#name').val().length > 100 || $('#name').val().length == 0){
        return false;
    }
   /*  
        alert('Error en Modelo');
    }
    if (){
        correcto=false;
        alert('Error en Precio');
    }
    if (precio == ''){
        correcto=false;
        alert('Error en Precio: No puede estar vacio');
    }
    if (det.length > 250){
        correcto=false;
        alert('Error en Detalles: Demasiado largo');
    }
    if (uni == ''){
        correcto=false;
        alert('Error en Unidades: No puede estar vacio');
    }
    if (uni < 0){
        correcto=false;
        alert('Error en Unidades');
    }
    if (img == ''){
        img = "img/default.jpg";
    } */

}

function createDesc(producto){
    let descripcion = '';
    descripcion += '<li>precio: '+producto.precio+'</li>';
    descripcion += '<li>unidades: '+producto.unidades+'</li>';
    descripcion += '<li>modelo: '+producto.modelo+'</li>';
    descripcion += '<li>marca: '+producto.marca+'</li>';
    descripcion += '<li>detalles: '+producto.detalles+'</li>';
    return descripcion;
}

function listarProductos() {
    $.ajax({
      url: './backend/product-list.php',
      type: 'GET',
      success: function(response) {
        const producto = JSON.parse(response);
        let template = '';
        producto.forEach(producto => {
          let descripcion = createDesc(producto);
          template += `
                  <tr productId="${producto.id}">
                  <td>${producto.id}</td>
                  <td>
                  <a href="#" class="product-item">
                    ${producto.nombre} 
                  </a>
                  </td>
                  <td>${descripcion}</td>
                  <td>
                    <button class="product-delete btn btn-danger">
                     Eliminar 
                    </button>
                  </td>
                  </tr>
                `
        });
        $('#products').html(template);
      }
    });
  }

  //READY INICIO; CONSTANTE
  $(document).ready(function() {
    // Global 
    let edit = false;
  
    // Testing Jquery
    listarProductos();
    $('#product-result').hide();
    $('#product-estado').hide();

  // search key type event
  $('#search').keyup(function() {
    if($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: './backend/product-search.php',
        data: {search},
        type: 'POST',
        success: function (response) {
          if(!response.error) {
            let products = JSON.parse(response);
            let template = '';
            let upd = '';
            products.forEach(producto => {
                let descripcion = createDesc(producto);
                upd += `
                <tr productId="${producto.id}">
                <td>${producto.id}</td>
                <td>
                <a href="#" class="product-item">
                  ${producto.nombre} 
                </a>
                </td>
                <td>${descripcion}</td>
                <td>
                  <button class="product-delete btn btn-danger">
                  Eliminar 
                  </button>
                </td>
                </tr>
              `;

              template += `
                     <li><a>${producto.nombre}</a></li>
                    ` ;
            });
            $('#product-result').show();
            $('#container').html(template);
            $('#products').html(upd);
          }
        } 
      })
    }
  });

  // submit, ADD - EDIT product 
  $('#product-form').submit(e => {
    e.preventDefault();
    let productoJsonString = $('#description').val();
    var finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = $('#name').val();
    finalJSON['id'] = $('#productId').val();

    //Verificar entradas
    if (verificarEntradas(finalJSON)){
      const jString = JSON.stringify(finalJSON,null,2);

      const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
      $.post(url, jString, (response) => {
        listarProductos();
        //$('#container').html(mensaje(JSON.parse(response['status']),JSON.parse(response['message'])));

        $('#container').html(mensaje(JSON.parse(response)['status'], JSON.parse(response)['message']));
        $('#product-result').show();
        edit = false;
        $('#name').val("");
      });
    }else{
      alert("Errores en el archivo");
    }
    });
        // Delete a Single Task
    $(document).on('click', '.product-delete', (e) => {
      if(confirm('¿Desea eliminar este producto?')) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-delete.php', {id}, (response) => {
          listarProductos();
        });
      }
    });

      // Product Id , Set edicion
    $(document).on('click', '.product-item', (e) => {
      $('#product-result').hide();
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('productId');
    $.post('./backend/product-get.php', {id}, (response) => {
      const product = JSON.parse(response);
      $('#name').val(product.nombre);
      $('#detalle').val(product.detalles);
      $('#precio').val(product.precio);
      $('#unidades').val(product.unidades);
      $('#imagen').val(product.imagen);
      $('#modelo').val(product.modelo);
      $('#marca').val(product.marca);
      $('#name').val("TEST");
      edit = true;
    });
    e.preventDefault();
  });
/*
    // Revision onmouseleave de los campos del producto
    $(document).on('blur', '.form-control',(e) => {
      let elem = $(this)[0].activeElement;
      //console.log($(this)[0].activeElement);
      if (!verificarEntradas(elem)){
        elem.style.color = "red";
        console.log("ERRA");
      }
    });

*/

$('.form-control').blur(function(){
  console.log($('.form-control'));
  let elem = $(this)[0].activeElement;
  //console.log($(this)[0].activeElement);
  if (!verificarEntradas(elem)){
    elem.style.color = "red";
    console.log("ERRA");
  }
});
  });

