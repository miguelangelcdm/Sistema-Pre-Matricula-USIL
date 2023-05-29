$(function () {
  "use strict";

  var dt_basic_table = $(".datatables-basic");

  // DataTable with buttons
  // --------------------------------------------------------------------

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
    columnDefs: [
      {
        // For Checkboxes
        targets: 5,
        orderable: false,
        responsivePriority: 3,
        searchable: false,
      },
      
    ],
      dom: '<"card-header"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          extend: "collection",
          className: "btn btn-label-primary dropdown-toggle me-2",
          text: '<i class="bx bx-show me-1"></i>Export',
          buttons: [
            {
              extend: "print",
              text: '<i class="bx bx-printer me-1"></i>Print',
              className: "dropdown-item",
              exportOptions: { columns: [0, 1, 2, 3, 4, 5] },
            },
            {
              extend: "csv",
              text: '<i class="bx bx-file me-1"></i>Csv',
              className: "dropdown-item",
              exportOptions: { columns: [0, 1, 2, 3, 4, 5] },
            },
            {
              extend: "excel",
              text: "Excel",
              className: "dropdown-item",
              exportOptions: { columns: [0, 1, 2, 3, 4, 5] },
            },
            {
              extend: "pdf",
              text: '<i class="bx bxs-file-pdf me-1"></i>Pdf',
              className: "dropdown-item",
              exportOptions: { columns: [0, 1, 2, 3, 4, 5] },
            },
            {
              extend: "copy",
              text: '<i class="bx bx-copy me-1"></i>Copy',
              className: "dropdown-item",
              exportOptions: { columns: [0, 1, 2, 3, 4, 5] },
            },
          ],
        },
      ],
    });
    $("div.head-label").html(
      '<h5 class="card-title mb-0">DataTable with Buttons</h5>'
    );
  }
});
