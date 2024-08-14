let prodTable = $("#productTable").DataTable({
    ajax: {
      url: url + "api/available-items",
      type: "GET",
      dataSrc: "prod",
    },
    columns: [
      { data: "img", render(data) {
        return `<img src="/pics/${data}" alt="" class="img-thumbnail" style="width: 100px">`
      } },
      { data: "ins_idno"},
      { data: "ins_name" },
      { data: "brand" },
      { data: "ins_model" },
      { data: "datereleased" },
      { data: "ins_type" },
      { data: "price" },
      { data: "ins_idno", render: function (data) {
        return `<div class="btn-group" role="group" >
        <button type="button" class="btn btn-success addcart" data-insid="${data}">Add to Cart</button>
        <button type="button" class="btn btn-primary addrent" data-insid="${data}">Rent</button>
      </div>`
      } }
    ],
  });
  
  let prodTablee = $("#productTablee").DataTable({
    ajax: {
      url: url + "api/available-items",
      type: "GET",
      dataSrc: "prod",
    },
    columns: [
      { data: "img", render(data) {
        return `<img src="/pics/${data}" alt="" class="img-thumbnail" style="width: 100px">`
      } },
      { data: "ins_idno"},
      { data: "ins_name" },
      { data: "brand" },
      { data: "ins_model" },
      { data: "datereleased" },
      { data: "ins_type" },
      { data: "price" }
    ],
  });
  

  let prodTableee = $("#productTableMod").DataTable({
    ajax: {
      url: url + "api/available-items",
      type: "GET",
      dataSrc: "prod",
    },
    columns: [
      { data: "img", render(data) {
        return `<img src="/pics/${data}" alt="" class="img-thumbnail" style="width: 100px">`
      } },
      { data: "ins_idno"},
      { data: "ins_name" },
      { data: "brand" },
      { data: "ins_model" },
      { data: "datereleased" },
      { data: "ins_type" },
      { data: "price" },
      { data: "status" },
      { data: null, render: function (data) {
        return `<div class="btn-group" role="group" >
        <button type="button" class="btn btn-warning editProd" data-insid="${data.ins_idno}"><i class="material-icons">edit</i></button>
        <button type="button" class="btn btn-danger delProd" data-insid="${data.ins_idno}"><i class="material-icons">delete</i></button>
      </div>`
      }}
    ],
  });
