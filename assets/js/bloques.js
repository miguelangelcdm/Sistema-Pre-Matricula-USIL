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
      dom: '<"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      // pageLength: 20,
      lengthMenu: [10, 25, 50, 100],
      paging: true,
      info: true,
      scrollY: 570,
    });
  }
});
