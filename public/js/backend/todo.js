/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/backend/todo.js":
/*!**************************************!*\
  !*** ./resources/js/backend/todo.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var login = document.querySelector(".login-form");

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

var btnEliminar = document.querySelector(".btn-eliminar");

if (btnEliminar) {
  var _btnEliminar = document.querySelectorAll(".btn-eliminar");

  for (var i = 0; i < _btnEliminar.length; i++) {
    _btnEliminar[i].addEventListener("click", function () {
      if (confirm("¿Desea eliminar este elemento?")) {
        return true;
      } else {
        return false;
      }
    });
  }
}
/* usuario y area*/


var formValidate = document.querySelector(".form-validate");

if (formValidate) {
  $(".form-validate").validate({
    errorElement: "span",
    errorClass: "invalid",
    errorPlacement: function errorPlacement(error, element) {
      error.appendTo(element.parents(".form-group").children("p"));
    }
  });
}

var fd = document.querySelector(".form-destroy");

if (fd) {
  (function () {
    var formDestroy = document.querySelectorAll(".form-destroy");

    var _loop = function _loop(_i) {
      var linkDestroy = formDestroy[_i].querySelector(".link-destroy");

      linkDestroy.addEventListener("click", function () {
        if (confirm("¿Desea borrar este elemento?")) {
          formDestroy[_i].submit();
        } else {
          return false;
        }
      });
    };

    for (var _i = 0; _i < formDestroy.length; _i++) {
      _loop(_i);
    }
  })();
} // PONER ACTIVO EL MENU PADRE


var select = document.querySelector("li.active");

if (select) {
  var padre = select.parentNode.parentNode;
  padre.classList.add("active", "open");
} // DATE PICKER


var date = document.querySelector(".input-date");

if (date) {
  $(".input-date").datepicker({
    format: "dd/mm/yyyy",
    language: "es",
    autoclose: true,
    todayHighlight: true
  });
} // MOVER MENU


var menuMovible = document.getElementById("sortable");

if (menuMovible) {
  $("#sortable").sortable({
    placeholder: "ui-state-highlight"
  });
  $("#sortable").disableSelection();
  $(".sub_menu").sortable({
    placeholder: "back-sub-menu",
    connectWith: ".list-accesos"
  });
  var btnMenu = document.getElementById("btn-menu");
  btnMenu.addEventListener('click', function () {
    var paneles = document.querySelectorAll('.panel');

    for (var _i2 = 0; _i2 < paneles.length; _i2++) {
      var valMenu = paneles[_i2].querySelector('.item_menu').value;

      var valSubMenu = paneles[_i2].querySelectorAll('.item_subMenu');

      for (var j = 0; j < valSubMenu.length; j++) {
        var valorSubMenu = valSubMenu[j].value;
        valSubMenu[j].value = "".concat(valMenu, "-").concat(valorSubMenu);
      }
    }

    var formMenuMove = document.getElementById('form-move-menu');
    formMenuMove.submit();
  });
}

$('#tipo_tramite').change(function () {
  var valor = $(this).val();

  if (valor == 'RECIBIDOS') {
    $('#recibidos').removeClass('hidden');
    $('#emitidos').addClass('hidden');
    $('.input-recibidos').addClass('data-required');
    $('.input-emitidos').removeClass('data-required');
  } else {
    $('#recibidos').addClass('hidden');
    $('#emitidos').removeClass('hidden'); // CAMBIAR LOS REQUERIDOS

    $('.input-emitidos').addClass('data-required');
    $('.input-recibidos').removeClass('data-required');
  }
});
var prob = document.querySelector(".area");

if (prob) {
  prob.addEventListener("change", function (e) {
    /// console.log('cualuericosa');
    var idArea = e.target.value;
    axios({
      method: "post",
      url: "/filter",
      data: {
        idArea: idArea
      }
    }).then(function (res) {
      console.log(res);
      var fragment = document.createDocumentFragment();
      var option = document.createElement("option");
      option.value = "";
      option.textContent = "[ USUARIOS ]";
      fragment.append(option);

      var _iterator = _createForOfIteratorHelper(res.data.usuarios),
          _step;

      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          datos = _step.value;

          //const fragment = document.createDocumentFragment();
          // Creacion del select de Distritos
          var _option = document.createElement("option");

          _option.value = datos.id;
          _option.textContent = datos.nombres;
          fragment.append(_option);
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }

      var dist = document.querySelector(".usuario");
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
  source: function source(request, response) {
    $.ajax({
      url: "/solicitante",
      dataType: "json",
      data: {
        term: request.term
      },
      success: function success(data) {
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
    fecha_fin.focus();
    return false;
  }

  if (fecha_fin.val() == "") {
    fecha_fin.focus();
    return false;
  }

  if (tipo.val() == "") {
    tipo.focus();
    return false;
  }

  fecha_inicio = fecha_inicio.val().split("/").reverse().join("-");
  fecha_fin = fecha_fin.val().split("/").reverse().join("-");
  window.location = "/reporte/imprimir/" + fecha_inicio + "/" + fecha_fin + "/" + tipo.val();
}); // VALIDACIONES DE LETRAS Y NUMEROS //

function validarTextoEntrada(input, patron) {
  var texto = input.value;
  var letras = texto.split("");

  for (var x in letras) {
    var letra = letras[x];

    if (!new RegExp(patron, "i").test(letra)) {
      letras[x] = "";
    }
  }

  input.value = letras.join("");
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


$('#FormularioSolicitanteCreate').on('submit', function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: '/tramite/solicitantes-modal',
    data: $('#FormularioSolicitanteCreate').serialize(),
    beforeSend: function beforeSend() {
      $("#alertError").show();
      console.log('#alertError');
    },
    success: function success(response) {
      console.log(response); //$("#alertError").hide();

      $('#modalCreateSolicitante').modal('hide');
      LimpiarFormulario();
    },
    error: function error(response) {
      var errores = response.responseJSON.errors;
      var msjError = '';
      Object.values(errores).forEach(function (valor) {
        msjError += '<li>' + valor[0] + '</li>';
      });
      $("#listaErrores").html(msjError);
      $("#alertError").show();
    }
  });
});
$('#btnModalSoli').on('click', function () {
  LimpiarFormulario();
  $("#alertError").hide();
}); /// fin modal de solicitante en agregar documentos internos o externos ///
///  modal de usuario en agregar documentos internos o externos ///

$('#FormularioUsuarioCreate').on('submit', function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: '/tramite/usuario-modal',
    data: $('#FormularioUsuarioCreate').serialize(),
    beforeSend: function beforeSend() {
      $("#alertError").hide();
      console.log('#alertError');
    },
    success: function success(response) {
      console.log(response); //$("#alertError").hide();

      $('#modalUsuarioCreate').modal('hide');
      LimpiarFormulario();
    },
    error: function error(response) {
      var errores = response.responseJSON.errors;
      var msjError = '';
      Object.values(errores).forEach(function (valor) {
        msjError += '<li>' + valor[0] + '</li>';
      });
      $("#listaUsuarioCreate").html(msjError);
      $("#alertUsuarioCreate").show();
    }
  });
});
$('#btnModalUsu').on('click', function () {
  LimpiarFormulario();
  $("#alertUsuarioCreate").hide();
}); /// fin  modal de usuario en agregar documentos internos o externos ///

$('#FormularioSolicitanteModificar').on('submit', function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: '/tramite/solicitante-modal-modificar',
    data: $('#FormularioSolicitanteModificar').serialize(),
    success: function success(response) {
      console.log(response);
      $('#modalSoliModificar').modal('hide');
      LimpiarFormulario(); // alert("guardo satisfactoriamente");
    },
    error: function error(response) {
      var errores = response.responseJSON.errors;
      var msjError = '';
      Object.values(errores).forEach(function (valor) {
        msjError += '<li>' + valor[0] + '</li>';
      });
      $("#listaErroresSolicitanteModificar").html(msjError);
      $("#alertErrorSolicitanteModificar").show();
    }
  });
});
$('#modalSoliModi').on('click', function () {
  LimpiarFormulario();
  $("#alertErrorSolicitanteModificar").hide();
});

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

$('#FormularioEmpresaCreate').on('submit', function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: '/tramite/empresa-modal',
    data: $('#FormularioEmpresaCreate').serialize(),
    success: function success(response) {
      console.log(response);
      $('#modalCreateEmpresa').modal('hide');
      LimpiarFormulario(); // alert("guardo satisfactoriamente");
    },
    error: function error(response) {
      var errores = response.responseJSON.errors;
      var msjError = '';
      Object.values(errores).forEach(function (valor) {
        msjError += '<li>' + valor[0] + '</li>';
      });
      $("#listaErroresEmpresa").html(msjError);
      $("#alertErrorEmpresa").show();
    }
  });
});
$('#btnmodalempre').on('click', function () {
  LimpiarFormulario();
  $("#alertErrorEmpresa").hide();
}); /// control de documentos

var prueba = document.querySelector(".tipodocumento");
var tramite = document.querySelector(".tramite");

if (prueba) {
  prueba.addEventListener("change", function (e) {
    var tipoDocumento_id = e.target.value;
    var tipo_tramite = tramite.value;
    axios({
      method: "post",
      url: "/filterTipoTramite",
      data: {
        tipoDocumento_id: tipoDocumento_id,
        tipo_tramite: tipo_tramite
      }
    }).then(function (res) {
      console.log(res.data.Control);
      var num = res.data.Control;
      var input_num = document.querySelector("#micampo");
      input_num.value = "".concat(num, " - 2021");
    });
  });
}

/***/ }),

/***/ 0:
/*!********************************************!*\
  !*** multi ./resources/js/backend/todo.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\tramite\resources\js\backend\todo.js */"./resources/js/backend/todo.js");


/***/ })

/******/ });