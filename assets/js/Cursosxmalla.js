document.addEventListener("DOMContentLoaded", function () {
  "use strict";
  // var dt_basic_table = $(".datatables-basic");
  var dt_basic_table = $("#main-dt");
  var counter = 0;
  var maxCreditos = 22;
  // DataTable para cursos
  //  --------------------------------------------------------------------

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
      columnDefs: [
        { targets: 0, visible: false }, // Hide the "Malla" column
        { targets: 1, visible: false },
        { targets: 2, orderable: false },
        {
          targets: 7,
          orderable: false,
          responsivePriority: 3,
          searchable: false
        },
        { targets: 8, orderable: false,searchable: false},
      ],
      dom: '<"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      // pageLength: 20,
      lengthMenu: [10, 25, 50, 100],
      paging: true,
      info: true,
      scrollY: 570,
    });
    // Dropdown de Carrera
    var carrera = document.getElementById("select-carrera");
    // Event listener for external dropdown
    carrera.addEventListener("change", function (event) {
      var searchCarrera = event.target.value.toLowerCase();

      // Filter the DataTable based on the selected value
      dt_basic.column(0).search(searchCarrera, true, false).draw();
    });
    // Dropdown de mallas
    var searchInput = document.getElementById("select-malla");
    // Event listener for external dropdown
    searchInput.addEventListener("change", function (event) {
      var searchText = event.target.value.toLowerCase();

      // Filter the DataTable based on the selected value
      dt_basic.column(1).search(searchText, true, false).draw();
    });
    //Dropdown Ciclo
    var ciclo = document.getElementById("select-ciclo");
    ciclo.addEventListener("change", function (event) {
      var searchciclo = event.target.value.toLowerCase();

      // Filter the DataTable based on the selected value
      dt_basic.column(4).search(searchciclo, true, false).draw();
    });

    var initialCounterValue = parseInt($(".head-label .counter").text());
    counter = initialCounterValue || 0;
    $("div.head-label").html(
      '<h5 class="card-title mb-0">Listado de Cursos</h5>' +
        '<div class="btn btn-outline-primary ms-3" type="button" data-bs-toggle="modal" data-bs-target="#modalCursos" style="cursor:alias"><span class="dismin">Créditos:</span><span class="badge bg-white text-primary ms-1 "><span class="counter">' +
        counter +
        "</span>/22</span></div>"
    );
    // Get the screen width
    var screenWidth = $(window).width();

    // Check if the screen width is less than or equal to 900 pixels
    if (screenWidth <= 900) {
      // Replace the "Créditos:" text with an empty string
      $("div.head-label .dismin").text("");
      $("div.head-label .btn").addClass("btncountermin");
      $("div.head-label .btn span").addClass("stm");
    }
  }

});
