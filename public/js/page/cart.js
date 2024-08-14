var countCart;
let cart = $("#cartTable").DataTable({
  ajax: {
    url: url + "api/get-cart",
    type: "GET",
    dataSrc: "cart",
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
    { data: "price" },
    { data: "dateadded" },
    { data: "quantity" },
    {
      data: null,
      render: function (d) {
        let price = parseInt(d.price.replace(/₱|,/g, ""));
        let quant = d.quantity;
        return "₱" + (price * quant).toLocaleString();
      },
    },
    {
      data: null,
      render: function (d) {
        return `<div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-danger deleteCart" data-cartid="${d.cartid}"><i class="material-icons">delete</i></button>
            <button type="button" class="btn btn-warning editCart" data-cartid="${d.cartid}"><i class="material-icons">edit</i></button>
          </div>`;
      },
    },
  ],
  initComplete: function() {
    let rowCount = cart.rows().count();
    countCart = rowCount
    if (rowCount === 0) {
        $(".confirmOrder").hide();
      } else {
        $(".confirmOrder").show();
      }
  }
});


if (cart.data().count() === 0) {
  $("#confirmOrder").hide();
} else {
  $("#confirmOrder").show();
}
var quantityInput = document.getElementById("quantity");
quantityInput.addEventListener("input", function (event) {
  var inputValue = parseInt(event.target.value);
  if (inputValue === 0) {
    quantityInput.value = 1;
  }
});

$(document).on("click", ".deleteCart", function () {
  var cartId = $(this).data("cartid");

  Swal.fire({
    title: "Confirmation",
    text: "Are you sure you want to delete this cart?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "DELETE",
        url: url + "api/delete-cart",
        data: { delCart: cartId },
        dataType: "json",
        success: function (res) {},
        error: function (a, b, c) {
          console.log(a.responseText, b, c);
        },
        complete: function () {
          Swal.fire({
            title: "Deleted!",
            text: "The cart has been deleted.",
            icon: "success",
          }).then(function () {
            cart.ajax.reload(function() {
                let rowCount = cart.rows().count();
                countCart = rowCount;
                console.log(countCart)
                if (rowCount === 0) {
                  $(".confirmOrder").hide();
                } else {
                  $(".confirmOrder").show();
                }
              });
              
            
          });
        },
      });
    }
  });
});

$(document).on("click", ".editCart", function () {
  var cartId = $(this).data("cartid");
  $.ajax({
    type: "GET",
    url: "api/get-cart-item",
    data: { getCart: cartId },
    dataType: "json",
    success: function (cart) {
      let res = cart.cart[0];
      $(".prodInfoTitle").text(res.ins_name);
      $(".cartid").val(res.cartid);
      $(".prodImg").attr("src", "/pics/" + res.img);
      $(".prodType").text(res.ins_type);
      $(".prodYear").text(res.datereleased);
      $(".prodBrand").text(res.brand);
      $(".prodModel").text(res.ins_model);
      $(".prodPrice").text(res.price);
      $("#quantity").val(res.quantity);
    },
    error: function (a, b, c) {
      console.log(a.responseText, b, c);
    },
    complete: function () {
      $("#editCart").modal("show");
    },
  });
});

$(".updateCart").on("click", function () {
  let cartid = $(".cartid").val();
  let quant = $("#quantity").val();
  $.ajax({
    type: "PATCH",
    url: url + "api/update-cart",
    data: { updateCart: cartid, quant: quant },
    dataType: "json",
    success: function (res) {
      Swal.fire({
        title: "Updated!",
        text: "The cart has been updated.",
        icon: "success",
      }).then(function () {
        $("#editCart").modal("hide");
        cart.ajax.reload();
      });
    },
    error: function (a, b, c) {
      console.log(a.responseText, b, c);
    },
  });
});

$(".confirmOrder").on("click", function () {
  Swal.fire({
    title: "Confirmation",
    text: "Are you sure you want to confirm this order?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, Confirm!",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: url + "api/confirm-order",
        data: { confirmOrder: userid },
        success: function (res) {
          if (res.status === "Success") {
            Swal.fire({
              title: "Success!",
              text: res.message,
              icon: "success",
            }).then(function () {
                window.location.href = 'orders';
            });
          } else {
            Swal.fire({
              title: "Error!",
              text: res.message,
              icon: "warning",
            });
          }
        },
        error: function (a, b, c) {
          console.log(a.responseText, b, c);
        },
      });
    }
  });
});
