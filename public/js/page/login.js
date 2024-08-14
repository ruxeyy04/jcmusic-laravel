$("#reg_user").submit(function (e) {
  e.preventDefault();
  let formData = new FormData(this);

  formData.append("register", 1);
  $.ajax({
    type: "POST",
    url: url + "api/register",
    data: formData,
    dataType: "json",
    contentType: false,
    processData: false,
    success: function (res) {
      Swal.fire({
        title: "Success!",
        text: "User Registered Successfully",
        icon: "success",
        showCancelButton: false,
        confirmButtonText: "OK",
      }).then(function () {
        $("#reg_user")[0].reset();
        $("#signup").modal("hide");
      });
    },
    error: function (a, b, c) {
      console.log(a.responseText, b, c);
    },
    complete: function () {},
  });
});

$("#signin").submit(function (e) {
  e.preventDefault();
  let form = new FormData(this);
  form.append("login", 1);
  $.ajax({
    type: "POST",
    url: url + "api/login",
    data: form,
    dataType: "json",
    contentType: false,
    processData: false,
    success: function (res) {
      if (res.status === 'Success') {
        Swal.fire({
          icon: "success",
          title: "Logged In Successfully",
          showConfirmButton: false,
          timer: 2500,
          allowOutsideClick: false,
          allowEscapeKey: false,
          didOpen: function () {
            setTimeout(function () {
              if (res.userType === 'Admin') {
                window.location.href = "/admin/";
              }else if (res.userType === 'Incharge') {
                window.location.href = "/incharge/";
              } else {
                window.location.href = "/";
              }
              $.cookie('userid', res.userId, { expires: 1, path: '/' });
              $.cookie('usertype', res.userType, { expires: 1, path: '/' });
            }, 2500);
          },
        });
      } else {
        Swal.fire({
          title: "Invalid",
          text: "Invalid username and password",
          icon: "warning",
          showCancelButton: false,
          confirmButtonText: "OK",
        })
      }
    },
    error: function (a, b, c) {
      console.log(a.responseText, b, c);
    },
    complete: function () {},
  });
});
if ($.cookie('userid')) {
  location.replace('/')

}
