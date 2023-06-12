document.addEventListener("DOMContentLoaded", function () {
  "use strict";
  // var dt_basic_table3 = $(".datatables-basic");
  var dt_basic_table3 = $("#alumnosdt");
  // DataTable para cursos
  //  --------------------------------------------------------------------
  if (dt_basic_table3.length) {
    var dt_basic = dt_basic_table3.DataTable({
      columnDefs: [
        // { targets: 0, visible: false }, // Hide the "Malla" column
        // { targets: 1, visible: false },
        // { targets: 2, visible: false },
      ],
      dom:
        '<"d-flex justify-content-around align-items-center row m-2" <"col-sm-12 col-md-6"f><"col-sm-12 col-md-6"l">">' +
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
        var foot = $(".dataTables_wrapper .justify-content-center");
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
        foot.attr("style","width:90%")

      },
    });
  }
});
