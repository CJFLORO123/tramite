const login = document.querySelector(".login-form");

if (login) {
    $(".login-form").validate({
        errorElement: "span",
        errorClass: "invalid",
        rules: {
            username: {
                required: true,
                minlength: 2
            },

            password: {
                required: true,
                minlength: 2
            }
        }
    });
}

const btnEliminar = document.querySelector(".btn-eliminar");

if (btnEliminar) {
    const btnEliminar = document.querySelectorAll(".btn-eliminar");

    for (let i = 0; i < btnEliminar.length; i++) {
        btnEliminar[i].addEventListener("click", () => {
            if (confirm("¿Desea eliminar este elemento?")) {
                return true;
            } else {
                return false;
            }
        });
    }
}


/* usuario y area*/

const formValidate = document.querySelector(".form-validate");

if (formValidate) {
    $(".form-validate").validate({
        errorElement: "span",
        errorClass: "invalid",
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".form-group").children("p"));
        }
    });
}

const fd = document.querySelector(".form-destroy");

if (fd) {
    const formDestroy = document.querySelectorAll(".form-destroy");

    for (let i = 0; i < formDestroy.length; i++) {
        const linkDestroy = formDestroy[i].querySelector(".link-destroy");

        linkDestroy.addEventListener("click", () => {
            if (confirm("¿Desea borrar este elemento?")) {
                formDestroy[i].submit();
            } else {
                return false;
            }
        });
    }
}

// PONER ACTIVO EL MENU PADRE
const select = document.querySelector("li.active");

if (select) {
    const padre = select.parentNode.parentNode;
    padre.classList.add("active", "open");
}

// DATE PICKER
const date = document.querySelector(".input-date");

if (date) {
    $(".input-date").datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
        todayHighlight: true
    });
}

// MOVER MENU
const menuMovible = document.getElementById("sortable");

if (menuMovible) {
    $("#sortable").sortable({
        placeholder: "ui-state-highlight"
    });

    $("#sortable").disableSelection();

    $(".sub_menu").sortable({
        placeholder: "back-sub-menu",
        connectWith: ".list-accesos"
    });

    const btnMenu = document.getElementById("btn-menu");

    btnMenu.addEventListener('click', () => {
        const paneles = document.querySelectorAll('.panel')

        for (let i = 0; i < paneles.length; i++) {
            const valMenu = paneles[i].querySelector('.item_menu').value
            const valSubMenu = paneles[i].querySelectorAll('.item_subMenu')

            for (let j = 0; j < valSubMenu.length; j++) {
                let valorSubMenu = valSubMenu[j].value
                valSubMenu[j].value = `${valMenu}-${valorSubMenu}`
            }
        }

        const formMenuMove = document.getElementById('form-move-menu')

        formMenuMove.submit();
    });

}


$('#tipo_tramite').change(function () {
    var valor = $(this).val()

    if (valor == 'RECIBIDOS') {
        $('#recibidos').removeClass('hidden')
        $('#emitidos').addClass('hidden')

        $('.input-recibidos').addClass('data-required')
        $('.input-emitidos').removeClass('data-required')
    } else {

        $('#recibidos').addClass('hidden')
        $('#emitidos').removeClass('hidden')

        // CAMBIAR LOS REQUERIDOS
        $('.input-emitidos').addClass('data-required')
        $('.input-recibidos').removeClass('data-required')
    }
})



const prob = document.querySelector(".area");

if (prob) {

    prob.addEventListener("change", e => {
       /// console.log('cualuericosa');
        const idArea = e.target.value;

        axios({
            method: "post",
            url: "/filter",
            data: {
                idArea: idArea
            }
        }).then(res => {
            console.log(res)
            const fragment = document.createDocumentFragment();

            const option = document.createElement("option");
            option.value = "";
            option.textContent = "[ USUARIOS ]";

            fragment.append(option);
            

            for (datos of res.data.usuarios) {
                //const fragment = document.createDocumentFragment();
                // Creacion del select de Distritos
                const option = document.createElement("option");
                option.value = datos.id;
                option.textContent = datos.nombres;

                fragment.append(option);
            }

            const dist = document.querySelector(".usuario");

            dist.innerHTML = "";
            dist.append(fragment);

        });
    });

}


/* var cursos = ['html', 'css'];
$("#solicitante").autocomplete({
    source: cursos
});
*/
  
$("#solicitante").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "/solicitante",
            dataType: "json",
            data: {
                term: request.term
            },
            success: function (data) {
                //console.log(data);
               
                response(data);
            }
        });
    }
});

/*
$("#empresa").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "/empresas",
            dataType: "json",
            data: {
                term: request.term
            },
            success: function (data) {
                //console.log(data);
                response(data);
            }
        });
    },
    minLength: 2,
});
*/

$("#exportar_pdf").click(function (e) {
    //console.log(e);
    e.preventDefault();

    var fecha_inicio = $("#fecha_inicio");
    var fecha_fin = $("#fecha_fin");
    var tipo = $("#tipo_tramite");

    if (fecha_inicio.val() == "") {
        fecha_fin.focus(); return false;
    }
    if (fecha_fin.val() == "") {
        fecha_fin.focus(); return false;
    }

    if (tipo.val() == "") {
        tipo.focus(); return false;
    }

    fecha_inicio = fecha_inicio.val().split("/").reverse().join("-");
    fecha_fin = fecha_fin.val().split("/").reverse().join("-");

    window.location = "/reporte/imprimir/" + fecha_inicio + "/" + fecha_fin + "/" + tipo.val();
});


// VALIDACIONES DE LETRAS Y NUMEROS //

function validarTextoEntrada(input, patron) {
        var texto = input.value
        var letras = texto.split("")
        for (var x in letras) {
            var letra = letras[x]
            if (!(new RegExp(patron, "i")).test(letra)) {
                letras[x] = ""
            }
        }
        input.value = letras.join("")
    }
    

/*
const tipo = document.querySelector(".inputLetras");

tipo.addEventListener("input", function() {
   
    validarTextoEntrada(this, "[a-z-ñ ]") 

});


const remicre = document.querySelector(".inputLetrascre");

remicre.addEventListener("input", function() {
   
    validarTextoEntrada(this, "[a-z-ñ ]") 

});
    

    const apelli = document.querySelector(".inputValida");

    apelli.addEventListener("input", function() {
       
        validarTextoEntrada(this, "[a-z-ñ ]") 
    
    });

    /*
    const numero  = document.querySelector(".validarNumero");

    numero.addEventListener("input", function() {
       
        validarTextoEntrada(this, "[0-9]")
    
    });*/

    // FIN VALIDACIONES DE LETRAS Y NUMEROS //

/// modal de solicitante en agregar documentos internos o externos ///
    $('#FormularioSolicitanteCreate').on('submit', function(e){
        e.preventDefault();
 
        $.ajax({
             type: 'POST',
             url: '/tramite/solicitantes-modal',
             data: $('#FormularioSolicitanteCreate').serialize(),
             beforeSend: function() {
                 $("#alertError").show ();
                 console.log('#alertError');
               },
             success: function (response) {
                 console.log(response)
                 //$("#alertError").hide();
                 $('#modalCreateSolicitante').modal('hide')
                 LimpiarFormulario();

             },
             error: function(response){
                 let errores = response.responseJSON.errors;
                 let msjError = '';
                 Object.values(errores).forEach(function (valor){
                     msjError += '<li>'+valor[0]+'</li>';
                 });

               $("#listaErrores").html(msjError);
               $("#alertError").show();  
             },
        });
    });

    $('#btnModalSoli').on('click', function(){
        LimpiarFormulario();
        $("#alertError").hide();
      })

    
 /// fin modal de solicitante en agregar documentos internos o externos ///

///  modal de usuario en agregar documentos internos o externos ///

 $('#FormularioUsuarioCreate').on('submit', function(e){
    e.preventDefault();

    $.ajax({
         type: 'POST',
         url: '/tramite/usuario-modal',
         data: $('#FormularioUsuarioCreate').serialize(),
         beforeSend: function() {
             $("#alertError").hide ();
             console.log('#alertError');
           },
         success: function (response) {
             console.log(response)
             //$("#alertError").hide();
             $('#modalUsuarioCreate').modal('hide')
             LimpiarFormulario();

         },
         error: function(response){
             let errores = response.responseJSON.errors;
             let msjError = '';
             Object.values(errores).forEach(function (valor){
                 msjError += '<li>'+valor[0]+'</li>';
             });

           $("#listaUsuarioCreate").html(msjError);
           $("#alertUsuarioCreate").show();  
         },
    });
});


$('#btnModalUsu').on('click', function(){
    LimpiarFormulario();
    $("#alertUsuarioCreate").hide();
  })

/// fin  modal de usuario en agregar documentos internos o externos ///

        $('#FormularioSolicitanteModificar').on('submit', function(e){
            e.preventDefault();
     
            $.ajax({
                 type: 'POST',
                 url: '/tramite/solicitante-modal-modificar',
                 data: $('#FormularioSolicitanteModificar').serialize(),
                 
                 success: function (response) {
                     console.log(response);

                     $('#modalSoliModificar').modal('hide')
                     LimpiarFormulario();
                   // alert("guardo satisfactoriamente");
                 },
                 error: function(response){
                    let errores = response.responseJSON.errors;
                    let msjError = '';
                    Object.values(errores).forEach(function (valor){
                        msjError += '<li>'+valor[0]+'</li>';
                    });

                  $("#listaErroresSolicitanteModificar").html(msjError);
                  $("#alertErrorSolicitanteModificar").show();  
                },
            });
        });

        $('#modalSoliModi').on('click', function(){
            LimpiarFormulario();
            $("#alertErrorSolicitanteModificar").hide();
          })
                   

function LimpiarFormulario() {
    $("#nom_solicitante").val("");
    $("#cargo").val("");
    $("#dni_ruc").val("");
    $("#cor_solicitante").val("");
    $("#nombres").val("");
    $("#nombre_empresa").val("");
    $("#apellidos").val("");
    $("#nickname").val("");
    $("#password").val("");
    $("#correo").val("");
    $("#area_id").val("");
    $("#tipoUsuario_id").val("");
}


$('#FormularioEmpresaCreate').on('submit', function(e){
    e.preventDefault();

    $.ajax({
         type: 'POST',
         url: '/tramite/empresa-modal',
         data: $('#FormularioEmpresaCreate').serialize(),
         
         success: function (response) {
             console.log(response);

             $('#modalCreateEmpresa').modal('hide')
             LimpiarFormulario();
           // alert("guardo satisfactoriamente");
         },
         error: function(response){
            let errores = response.responseJSON.errors;
            let msjError = '';
            Object.values(errores).forEach(function (valor){
                msjError += '<li>'+valor[0]+'</li>';
            });

          $("#listaErroresEmpresa").html(msjError);
          $("#alertErrorEmpresa").show();  
        },
    });
});

$('#btnmodalempre').on('click', function(){
    LimpiarFormulario();
    $("#alertErrorEmpresa").hide();
  })
    

  /// control de documentos
const prueba = document.querySelector(".tipodocumento");
const tramite = document.querySelector(".tramite");

if (prueba) {

    prueba.addEventListener("change", e => {
        
        const tipoDocumento_id = e.target.value;
        const tipo_tramite = tramite.value;

        axios({
            method: "post",
            url: "/filterTipoTramite",
            data: {
                tipoDocumento_id: tipoDocumento_id,
                tipo_tramite: tipo_tramite
            }
        }).then(res => {

          console.log(res.data.Control);

           let num=res.data.Control
           
           let input_num = document.querySelector("#micampo");

           input_num.value=`${num} - 2021`
            
          });
       });

    }  
