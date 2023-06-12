document.addEventListener("DOMContentLoaded", function () {
  "use strict";
  // var dt_basic_table2 = $(".datatables-basic");
  var dt_basic_table2 = $("#bloquesDT");
  // DataTable para cursos
  //  --------------------------------------------------------------------
  if (dt_basic_table2.length) {
    var dt_basic = dt_basic_table2.DataTable({
      columnDefs: [
        { targets: 0, visible: false }, // Hide the "Malla" column
        { targets: 1, visible: false },
        { targets: 2, visible: false },
      ],
      dom:
        '<"d-flex justify-content-between align-items-center row my-2" <"col-sm-12 col-md-6"f><"col-sm-12 col-md-6"l">">' +
        "t" +
        '<"d-flex justify-content-center row"<"col-sm-12 col-md-12"p>>',

      // pageLength: 20,
      lengthMenu: [10, 25, 50, 100],
      paging: true,
      info: false,
      scrollY: 525,
      initComplete: function () {
        // Apply custom styles to the length menu
        var whole = $(".dataTables_length");
        var lengthSelect = $(".dataTables_length select");
        var searchInput = $(".dataTables_filter select");
        var labelLength = $(".dataTables_length label");
        var labelsearch = $(".dataTables_filter label");
        var pagmar = $(".dataTables_paginate .pagination");
        pagmar.attr("style","margin-bottom:0")
        lengthSelect.attr("style", "margin-inline: 0.5rem;");
        searchInput.attr("style", "margin-inline: 0.5rem;");
        labelLength.attr("style", "max-width:45%");
        labelsearch.attr("style", "max-width:60%");
        labelLength.addClass("d-flex");
        labelsearch.addClass("d-flex");
        whole.addClass("d-flex justify-content-end");
      },
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
      dt_basic.column(2).search(searchciclo, true, false).draw();
    });
  }
});
