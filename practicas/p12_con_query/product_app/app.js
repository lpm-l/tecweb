// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {

    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    
}

function listarProductos() {
    $.ajax({
      url: './backend/product-list.php',
      type: 'GET',
      success: function(response) {
        const producto = JSON.parse(response);
        let template = '';
        producto.forEach(producto => {
          let descripcion = '';
                    descripcion += '<li>precio: '+producto.precio+'</li>';
                    descripcion += '<li>unidades: '+producto.unidades+'</li>';
                    descripcion += '<li>modelo: '+producto.modelo+'</li>';
                    descripcion += '<li>marca: '+producto.marca+'</li>';
                    descripcion += '<li>detalles: '+producto.detalles+'</li>';
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

  $(document).ready(function() {
    // Global Settings
    let edit = false;
  
    // Testing Jquery
    console.log('jquery is working!');
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
                let descripcion = '';
                descripcion += '<li>precio: '+producto.precio+'</li>';
                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                descripcion += '<li>marca: '+producto.marca+'</li>';
                descripcion += '<li>detalles: '+producto.detalles+'</li>';
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
  });