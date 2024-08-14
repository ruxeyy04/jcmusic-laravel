let prodTable = $("#rentTable").DataTable({
  ajax: {
    url: url + "api/all-rents",
    type: "GET",
    dataSrc: "rent",
    data: function (d) {
      d.userid = userid;
    },
  },
  columns: [
    {
      data: "img",
      render(data) {
        return `<img src="/pics/${data}" alt="" class="img-thumbnail" style="width: 100px">`;
      },
    },
    { data: "ins_name" },
    { data: "brand" },
    { data: "ins_model" },
    {
      data: "totalamountrent",
      render: function (d) {
        return `₱${d}`;
      },
    },
    { data: "statusRent"},
    { data: "datetoreturn"},
    { data: "returnedDate", render: function(d) {
      return d == null ? 'Not yet Returned' : d
    }},
    {
      data: null,
      render: function (data) {
        return `<button type="button" class="btn btn-danger return" data-rentid="${data.rentid}" ${data.statusRent !== 'Rented' ? 'disabled': ''}>Return</button>`;
      },
    },
  ],
});

$(document).on('click', '.return', function () {
    let rentid = $(this).data('rentid')
    var currentDate = new Date(); 
    var formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1) + '-' + currentDate.getDate();

    $.ajax({
        type: "POST",
        url: url + "api/return-rent",
        data: {returnRent: rentid, date: formattedDate},
        dataType: "json",
        success: function (res) {
          Swal.fire({
            title: "Success!",
            text: "Successfully Returned",
            icon: "success",
            showCancelButton: false,
            confirmButtonText: "OK",
          }).then(function () {
            prodTable.ajax.reload();
          });
        },
        error: function (a,b,c) {
            console.log(a.responseText,b,c)
        }
    });
  })

$("#rentTableee").DataTable({
    ajax: {
      url: url + "api/all-rents",
      type: "GET",
      dataSrc: "rent",
    },
    columns: [
      {
        data: "img",
        render(data) {
          return `<img src="/pics/${data}" alt="" class="img-thumbnail" style="width: 100px">`;
        },
      },
      { data: "ins_name" },
      { data: "brand" },
      { data: "ins_model" },
      {
        data: "totalamountrent",
        render: function (d) {
          return `₱${d}`;
        },
      },
      { data: "statusRent"},
      { data: "datetoreturn"},
      { data: "returnedDate", render: function(d) {
        return d == null ? 'Not yet Returned' : d
      }}
    ],
  });