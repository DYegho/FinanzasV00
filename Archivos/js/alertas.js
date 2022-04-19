// funciones
const formularios_ajax = document.querySelectorAll(".FormulariosAjax");
// validate dates
function enviar_formulario_ajax(e) {
  e.preventDefault();
  // varibale
  let data = new FormData(this);
  // metodo
  let method = this.getAttribute("method");
  let action = this.getAttribute("action");
  let tipo = this.getAttribute("data-form");
  // send data to server
  let encabezado = new Headers();
  let config = {
    method: method,
    headers: encabezado,
    mode: 'cors',
    cahe: 'no-cache',
    body: data
  }

  let texto_alerta;
  if (tipo === 'save') {
    texto_alerta = "Los datos se han guardado correctamente";
  } else if (tipo === 'delete') {
    texto_alerta = "Los datos se eliminaran del sistema";

  } else if (tipo === 'update') {
    texto_alerta = "Los datos se han actualizado correctamente";
  } else if (tipo === 'search') {
    texto_alerta = "Los datos de busqueda serán eliminados ingrese nuevamnente el dato a buscar";
  } else if (tipo === 'loans') {
    texto_alerta = "Desea remover los datos seleccionados para alquiler";
  } else {
    texto_alerta = "Desea realizar los cambios seleccionados";
  }
  // alerta
  Swal.fire({
    title:"¿ Está seguro ?",
    text: texto_alerta,
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085b6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar'
    // footer:'<a href>Simple Error</a>'
  }).then((result) => {
    if (result.value) {
      fetch(action,config)
      .then(respuesta => respuesta.json())
      .then(respuesta => {
        return alertas_ajax(respuesta);
      });
    }
  });
}
formularios_ajax.forEach(formularios => {
  formularios.addEventListener("submit", enviar_formulario_ajax);
});
// alertas formularios
function alertas_ajax(alerta) {
  if (alerta.Alerta === "simple") {
    Swal.fire({
      title: alerta.Titulo,
      text: alerta.Texto,
      type: alerta.Tipo,
      confirmButtonText: 'Aceptar'
      // footer:'<a href>Simple Error</a>'
    });
  } else if (alerta.Alerta === "recargar") {
    Swal.fire({
      title: alerta.Titulo,
      text: alerta.Texto,
      type: alerta.Tipo,
      confirmButtonText: 'Aceptar'
      // footer:'<a href>Simple Error</a>'
    }).then((result) => {
      if (result.value) {
        location.reload();
      }
    });
  } else if (alerta.Alerta === "limpiar") {
    Swal.fire({
      title: alerta.Titulo,
      text: alerta.Texto,
      type: alerta.Tipo,
      confirmButtonText: 'Aceptar'
      // footer:'<a href>Simple Error</a>'
    }).then((result) => {
      if (result.value) {
        document.querySelector(".FormulariosAjax").reset();
      }
    });
  } else if (alerta.Alerta === "redireccionar") {
    window.location.href = alerta.URL;
  }
}
