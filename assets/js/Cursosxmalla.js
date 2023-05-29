$(function () {
  "use strict";

  var dt_basic_table = $(".datatables-basic");
  var counter = 0;
  var maxCreditos = 22;
  // DataTable para cursos
  // --------------------------------------------------------------------

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
      columnDefs: [
        {
          // For Turno
          targets: 6,
          orderable: false,
          responsivePriority: 3,
          searchable: false,
        },
        {
          // For Checkboxes
          targets: 7,
          orderable: false,
          responsivePriority: 3,
          searchable: false,
          render: function (data, type, row, meta) {
            if (type === "display" && row.creditos + counter > maxCreditos) {
              return '<input type="checkbox" class="dt-checkboxes form-check-input" disabled>';
            } else {
              return '<input type="checkbox" class="dt-checkboxes form-check-input">';
            }
          },
        },
      ],
      dom: '<"card-header px-3"<"head-label text-center d-flex align-items-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 10,
      lengthMenu: [10, 25, 50, 75, 100],
      scrollY: 532,
      buttons: [
        {
          text: '<i class="bx bx-list-check"></i> <span class="d-none d-lg-inline-block">Confirmar</span>',
          className: "create-new btn btn-primary",
        },
      ],
    });

    var initialCounterValue = parseInt($(".head-label .counter").text());
    counter = initialCounterValue || 0;

    $("div.head-label").html(
      '<h5 class="card-title mb-0">Listado de Cursos</h5>' +
        '<div class="btn btn-outline-primary ms-3" style="cursor:alias">Créditos:<span class="badge bg-white text-primary ms-1 "><span class="counter">' +
        counter +
        "</span>/22</span></div>"
    );

    // Acumulador de cursos seleccionados
    dt_basic_table.on("change", ".dt-checkboxes", function () {
      var creditos = parseInt(
        $(this).closest("tr").find("td:nth-child(3)").text()
      );
      updateCounter(this, creditos);
    });
  }

  function updateCounter(checkbox, creditos) {
    var counterElement = $(".head-label .counter");
    var counterValue = parseInt(counterElement.text());

    if (checkbox.checked && counterValue + creditos > maxCreditos) {
      checkbox.checked = false;
      if (checkbox.disabled) {
        // Enable the checkbox if it was previously disabled
        checkbox.disabled = false;
      }
      return;
    }
    if (checkbox.checked) {
      counterValue += creditos;
    } else {
      counterValue -= creditos;
    }
    counterElement.text(counterValue);

    // Disable checkboxes if counter reaches or surpasses the maximum value
    var checkboxes = $(".datatables-basic tbody .dt-checkboxes");
    checkboxes.each(function () {
      var rowCreditos = parseInt(
        $(this).closest("tr").find("td:nth-child(3)").text()
      );
      if (counterValue + rowCreditos > maxCreditos) {
        // Disable checkboxes that are not checked
        if (!this.checked) {
          this.disabled = true;
        }
      } else {
        // Enable checkboxes that were previously disabled
        this.disabled = false;
      }
    });
  }
});

//Dropdown de botones con opciones de exportar
// {
//   extend: "collection",
//   className: "btn btn-label-primary dropdown-toggle me-2",
//   text: '<i class="bx bx-show me-1"></i>Export',
//   buttons: [
//     {
//       extend: "print",
//       text: '<i class="bx bx-printer me-1"></i>Print',
//       className: "dropdown-item",
//       exportOptions: { columns: [0, 1, 2, 3, 4] },
//     },
//     {
//       extend: "csv",
//       text: '<i class="bx bx-file me-1"></i>Csv',
//       className: "dropdown-item",
//       exportOptions: { columns: [0, 1, 2, 3, 4] },
//     },
//     {
//       extend: "excel",
//       text: "<i class='bx bx-spreadsheet me-1'></i>Excel",
//       className: "dropdown-item",
//       exportOptions: { columns: [0, 1, 2, 3, 4] },
//     },
//     {
//       extend: "pdf",
//       text: '<i class="bx bxs-file-pdf me-1"></i>Pdf',
//       className: "dropdown-item",
//       exportOptions: { columns: [0, 1, 2, 3, 4] },
//     },
//     {
//       extend: "copy",
//       text: '<i class="bx bx-copy me-1"></i>Copy',
//       className: "dropdown-item",
//       exportOptions: { columns: [0, 1, 2, 3, 4] },
//     },
//   ],
// },
