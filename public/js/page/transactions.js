let transaction = $('#transaction').DataTable({
    ajax: {
        url: url + "api/all-transactions",
        type: "POST",
        dataSrc: "order",
        data: function (d) {
          d.getTransaction = 1;
        },
      },
      columns: [
        { data: "order_id" },
        { data: "date" },
        { data: null, render: function(d) {
            return `${d.firstname} ${d.lastname}`
        }},
        { data: "totalItem"},
        { data: "totalAmount", render: function(d) {
            let amount = parseFloat(d).toLocaleString(undefined, { minimumFractionDigits: 2 });
            return amount
        } },
        { data: "status" }
      ],
})

let transactionn = $('#transactionMod').DataTable({
  ajax: {
      url: url + "api/all-transactions",
      type: "POST",
      dataSrc: "order",
      data: function (d) {
        d.getTransaction = 1;
      },
    },
    columns: [
      { data: "order_id" },
      { data: "date" },
      { data: null, render: function(d) {
          return `${d.firstname} ${d.lastname}`
      }},
      { data: "totalItem"},
      { data: "totalAmount", render: function(d) {
          let amount = parseFloat(d).toLocaleString(undefined, { minimumFractionDigits: 2 });
          return amount
      } },
      { data: "status" },
      { data: null, render: function (data) {
        return `<select class="form-control statusUpdate" data-orderid="${data.order_id}">
        <option value="Pending" ${data.status === 'Pending' ? 'selected' : ''}>Pending</option>
        <option value="Order Confirm" ${data.status === 'Order Confirm' ? 'selected' : ''}>Order Confirm</option>
        <option value="On the Way" ${data.status === 'On the Way' ? 'selected' : ''}>On the Way</option>
        <option value="Delivered" ${data.status === 'Delivered' ? 'selected' : ''}>Delivered</option>
    </select>`;
      }}
    ],
})

$(document).on('change', '.statusUpdate', function () {
  let orderid = $(this).data('orderid');
  let status = $(this).val()
  $.ajax({
    type: "POST",
    url: url + "api/update-order-status",
    data: {updateOrder: orderid, status: status},
    dataType: "json",
    success: function (res) {
      Swal.fire({
        title: "Success!",
        text: "Order Updated Successfully",
        icon: "success",
        showCancelButton: false,
        confirmButtonText: "OK",
      }).then(function () {
        location.replace('transactionpage')
      });
    },
    error: function (a,b,c) {
      console.log(a.responseText, b, c)
    }
  });
})