// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "nombre": "DEF",
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
    
};

var temp;
function mensaje (estado, mensaje){
  return  `
<li><a>${estado}</a></li>
<li><a>${mensaje}</a></li>
` ;
}

  function verificarEntradas(obj){
    let id=obj.id;
    let value=obj.value;
    obj.style.color = "red";
    if (id!="detalle" && id!="imagen" && value==""){
      temp += `<li><a>ERROR. ${id} NO PUEDE ESTAR VACIO</a></li>`;
      return false;
    }else{
      switch(id) {
        case "name":
          if (value.length > 25 || !value.match(/^[0-9a-zA-Z ]+$/)){
            temp += "<li><a>Error en nombre</a></li>";
            return false;
          }
          break;
        case "marca":
          break;
        case "modelo":
          if (value.length > 25 || !value.match(/^[0-9a-zA-Z]+$/)){
            temp += "<li><a>Error en modelo</a></li>";

            return false;}
          break;
        case "unidades":
          if (Number(value) <= 0){
            temp += "<li><a>Error en unidades. No puede ser menor a 0</a></li>";

            return false;}
          break;
        case "precio":
          if (Number(value) < 99.99){
            temp += "<li><a>Error en precio. Demasiado bajo</a></li>";
            return false;}
          break;
        case "detalle":
          if (value.length > 250){
            temp += "<li><a>Error en detalles; demasiado largo</a></li>";
            return false;}
          break;
        case "imagen":
          if (value == '')
            obj.value = "http://localhost/img/default.jpg";
          break;
        default:
          console.log('Undefined...');
      } 
    }
    obj.style.color = "";
    return true;
}

  function checkAll(container){
    correct = true;
    temp = "";
    for (i=0; i<6; i++){
      if (!verificarEntradas(container[i])){
        correct = false;
      }
    }
    $('#estado').html(temp);
    return correct;
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
    if (!checkAll($('#product-form')[0])){
      temp += '<li style="color: red;"><a>No se pudo agregar el producto</a></li>';
      $('#product-estado').show();   
      $('#estado').html(temp);
    }else{
      
      $('#product-estado').hide(); 
      let modJson = baseJSON;
      modJson['nombre'] = $('#name').val();
      modJson['id'] = $('#productId').val();
      modJson["precio"]= $('#precio').val();
      modJson["unidades"]= $('#unidades').val();
      modJson["modelo"]= $('#modelo').val();
      modJson["marca"]= $('#marca').val();
      modJson["detalles"]= $('#detalle').val();
      modJson["imagen"]= $('#imagen').val();

      const jString = JSON.stringify(modJson,null,2);
      const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
      $.post(url, jString, (response) => {
        listarProductos();
        $('#estado').html(mensaje(JSON.parse(response)['status'], JSON.parse(response)['message']));
        $('#product-estado').show();
        edit = false;
        $('#name').val("");
      });
    }
    }); 

        // Delete a Single Task
    $(document).on('click', '.product-delete', (e) => {
      if(confirm('¿Desea eliminar este producto?')) {
        $('#product-estado').hide();
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-delete.php', {id}, (response) => {
          console.log(response);
          $('#estado').html(mensaje(JSON.parse(response)['status'], JSON.parse(response)['message']));
          $('#product-estado').show();
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
      $('#productId').val(product.id);
      edit = true;
    });
    e.preventDefault();
  });

  // on blur cambiar producto a agregar/editar
  $('.form-control').blur(function(){
    $('#product-estado').hide();
    temp = "";
    if (!verificarEntradas($(this)[0])){
      $('#product-estado').show();
      $('#estado').html(temp);
    }else{
      $(this)[0].style.color = "";
    }
  }); 

    // search key type event
    $('#name').keyup(function() {
      if($('#name').val()) {
        let search = $('#name').val();
        $.ajax({
          url: './backend/product-search-repetido.php',
          data: {search},
          type: 'POST',
          success: function (response) {
            if(!response.error) {
              console.log(response);
              const resultado = JSON.parse(response);
              if (resultado['len'] != 0){
                $('#estado').html('<li><a>Este producto ya existe</a></li>');
                $('#product-estado').show();   
              }else{
                $('#product-estado').hide();
              }
            }
          } 
        })
      }
    });


});

