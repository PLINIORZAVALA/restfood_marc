$("#login_php").submit(function (event) {
  event.preventDefault();
  submitForm();
});

function submitForm() {
  // Enviar el formulario sin la ubicación
  $.ajax({
    type: "POST",
    dataType: "json", // Cambio de 'datatype' a 'dataType'
    data: new FormData($("#login_php")[0]),
    url: "lib/PHP_login.php",
    contentType: false,
    processData: false,
    beforeSend: function (objeto) {
      $("#div_login").html("Enviando datos del login");
    },
    success: function (datos) {
      $("#div_login").show();
      $("#div_login").html(datos);
      setTimeout(function () {
        // Modificación de setTimeout
        $("#div_login").hide();
      }, 6000);
      //$("#login_php")[0].reset();
    },
  });
}
