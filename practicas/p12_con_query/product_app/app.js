// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

  function verificarEntradas(finalJSON){
    var name = finalJSON['nombre']
    var marca = finalJSON['marca']
    var modelo = finalJSON['modelo']
    var precio = finalJSON['precio']
    var uni = finalJSON['unidades']
    var det = finalJSON['detalles']
    var img = finalJSON['imagen']

    var correcto = true;
    if (name.length > 100 || name.length == 0){
        correcto = false;
        alert('Error en Nombre');
    }
    if (modelo.length > 25 || !modelo.match(/^[0-9a-zA-Z]+$/)){
        correcto=false;
        alert('Error en Modelo');
    }
    if (precio < 99.99){
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
    }
    if (correcto){
        alert('TODO BIEN');
        return true;
    }else
        return false;
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
function init() {
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;    
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
                     <li><a href="#" class="product-item">${producto.nombre}</a></li>
                    ` ;
            });
            console.log(template)
            $('#product-result').show();
            $('#container').html(template);
            $('#products').html(upd);
          }
        } 
      })
    }
  });

  // submit, add product 
  $('#product-form').submit(e => {
    e.preventDefault();
    let productoJsonString = $('#description').val();
    console.log(productoJsonString);
    var finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = $('#name').val();
    finalJSON['id'] = $('#productId').val();

    //Verificar entradas
    if (verificarEntradas(finalJSON)){
      const jString = JSON.stringify(finalJSON,null,2);

      const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
      console.log(url);
      $.post(url, jString, (response) => {
        listarProductos();
        alert(JSON.parse(response)['status'] + "\n" + JSON.parse(response)['message']);
        edit = false;
        $('#Description').val("");
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
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(element).attr('productId');
    console.log(id);
    $.post('./backend/product-get.php', {id}, (response) => {
      const product = JSON.parse(response);
      $('#name').val(product.nombre);

      let descripcion = baseJSON;
      descripcion['detalles'] = product.detalles;
      descripcion['precio'] = product.precio;
      descripcion['unidades'] = product.unidades;
      descripcion['imagen'] = product.imagen;
      descripcion['modelo'] = product.modelo;
      descripcion['marca'] = product.marca;

      $('#description').val(JSON.stringify(descripcion,null,2));
      $('#productId').val(product.id);

      edit = true;

      console.log(descripcion);
      console.log(descripcion);
      console.log(baseJSON);
    });
    e.preventDefault();
  });
  });

