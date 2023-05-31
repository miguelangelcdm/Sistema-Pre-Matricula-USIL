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
        {
          targets: 7,
          orderable: false,
          responsivePriority: 3,
          searchable: false,
          // render: function (data, type, row, meta) {
          //   // Checkbox render function
          //   if (type === "display" && row.creditos + counter > maxCreditos) {
          //     return '<input type="checkbox" class="dt-checkboxes form-check-input" disabled>';
          //   } else {
          //     return '<input type="checkbox" class="dt-checkboxes form-check-input">';
          //   }
          // },
        },
      ],
      dom: '<"card-header px-3"<"head-label text-center d-flex align-items-center justify-content-between"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      pageLength: 10,
      lengthMenu: [10, 25, 50, 100],
      paging: true,
      info: true,
      scrollY: 532,
      buttons: [
        {
          text: '<i class="bx bx-list-check"></i> <span class="d-none d-lg-inline-block">Confirmar</span>',
          className: "create-new btn btn-primary",
        },
      ],
    });
    // Dropdown de mallas
    var searchInput = document.getElementById("select-malla");
    // Event listener for external dropdown
    searchInput.addEventListener("change", function (event) {
      var searchText = event.target.value.toLowerCase();

      // Filter the DataTable based on the selected value
      dt_basic.column(0).search(searchText, true, false).draw();
    });
    //Dropdown Ciclo
    var ciclo = document.getElementById("select-ciclo");
    ciclo.addEventListener("change", function (event) {
      var searchciclo = event.target.value.toLowerCase();

      // Filter the DataTable based on the selected value
      dt_basic.column(3).search(searchciclo, true, false).draw();
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
    // Acumulador de cursos seleccionados
    dt_basic_table.on("click", "input[type='submit']", function () {
      var creditos = parseInt(
        $(this).closest("tr").find("td:nth-child(5)").text()
      );
      updateCounter(this, creditos);
    });
    // Event listener for the button to launch the modal
    $("body").on("click", ".btn.btn-outline-primary.ms-3", function () {
      // Code to show the modal
      // Replace the placeholder code below with the actual code to display your modal
      $("#modalCursos").modal("show");
    });
  }

  function updateCounter(button, creditos) {
    var counterElement = $(".head-label .counter");
    var counterValue = parseInt(counterElement.text());

    if (button.disabled && counterValue + creditos <= maxCreditos) {
      // Enable the button if it was previously disabled
      button.disabled = false;
    }

    if (button.disabled || counterValue + creditos > maxCreditos) {
      return;
    }

    counterValue += creditos;
    counterElement.text(counterValue);

    button.disabled = true; // Disable the button after clicking

    // Enable buttons if counter value allows
    var buttons = $(".datatables-basic tbody input[type='submit']");
    buttons.each(function () {
      var rowCreditos = parseInt(
        $(this).closest("tr").find("td:nth-child(5)").text()
      );
      if (counterValue + rowCreditos <= maxCreditos) {
        this.disabled = false;
      }
    });
  }
});