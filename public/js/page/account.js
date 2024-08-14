let account = $('#accountTable').DataTable({
    ajax: {
        url: url + "api/getAllAccounts",
        type: "GET",
        dataSrc: "account",
      },
      columns: [
        { data: "userID" },
        { data: "username" },
        { data: "password" },
        { data: "usertype" },
        { data: "userID", render: function (d) {
            return `<button type="button" class="btn btn-info editAccount" data-userid="${d}">Edit</button>`
        } }
      ],
})

$(document).on('click', '.editAccount', function () {
  $('#editusermodal').modal('show')
  let userid = $(this).data("userid")
  $.ajax({
    type: "POST",
    url: url + "api/getAccount",
    data: {getAccount: userid},
    dataType: "json",
    success: function (res) {
      $('input[name="userid"]').val(res.userID)
      $('input[name="username"]').val(res.username)
      $('input[name="password"]').val(res.password)
      $('select[name="usertype"]').val(res.usertype)
    },
    error: function(a,b,c) {
      console.log(a.responseText,b,c)
    }
  });
})

$('#editUser').submit(function (e) {
  e.preventDefault()
  var formData = new FormData(this)
  formData.append('userEdit', 1)
  $.ajax({
    type: "POST",
    url: url + "api/updateUser",
    data: formData,
    dataType: "json",
    contentType: false,
    processData: false,
    success: function (res) {
      Swal.fire({
        title: "Success!",
        text: "User Updated Successfully",
        icon: "success",
        showCancelButton: false,
        confirmButtonText: "OK",
      }).then(function () {
        location.replace('accountpage')
      });
    },
    error: function (a,b,c) {
      console.log(a.responseText,b,c)
    }
  });
})