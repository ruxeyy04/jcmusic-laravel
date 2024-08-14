let order = $("#myOrder").DataTable({
  ajax: {
    url: url + "api/user-orders",
    type: "GET",
    dataSrc: "order",
    data: function (d) {
      d.userid = userid;
    },
  },
  columns: [
    { data: "order_id" },
    { data: "total_amount" },
    { data: "items" },
    { data: "date_ordered" },
    { data: "status" },
    {
      data: "order_id",
      render: function (d) {
        return `<button type="button" class="btn btn-primary orderDetail" data-orderid="${d}">Details</button>`;
      },
    },
  ],
});

$(document).on("click", ".orderDetail", function () {
  let orderid = $(this).data("orderid");
  $.ajax({
    type: "POST",
    url: url + "api/order-detail",
    data: {getDetail: orderid},
    dataType: "json",
    success: function (res) {
      // Populate order details
      $("#orderNum").text(res.orderid);
      $("#orderStatus").text(res.orderStatus);

      // Populate order items
      var orderItems = res.items;
      var tableBody = $(".orderItems");
      tableBody.empty(); // Clear existing table rows

      for (var i = 0; i < orderItems.length; i++) {
        var item = orderItems[i];

        // Create table row
        var row = $("<tr>");
        row.append($("<td>").text(i + 1));
        row.append($("<td>").html('<img src="/pics/' + item.img + '" alt="Item Image" width="50" height="50">'));
        row.append($("<td>").text(item.ins_name));
        row.append($("<td>").text(item.ins_type));
        row.append($("<td>").text(item.quantity));
        row.append($("<td>").text(item.totalamount.toLocaleString()));


        // Append row to table body
        tableBody.append(row);
      }

      // Populate total items and total price
      $(".totalitem").text(res.totalItem);
      $(".totalpriceitem").text(res.total_amount.toLocaleString());
    },
    complete: function () {
      $('#orderDetail').modal('show')
    }
  });
});
