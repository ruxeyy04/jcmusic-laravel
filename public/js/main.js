$(document).ready(function () {
  $(".xp-menubar").on("click", function () {
    $("#sidebar").toggleClass("active");
    $("#content").toggleClass("active");
  });

  $(".xp-menubar,.body-overlay").on("click", function () {
    $("#sidebar,.body-overlay").toggleClass("show-nav");
  });
});
function urlLink() {
  let urlLink = "http://127.0.0.1:8000/";
  return urlLink;
}
let url = urlLink();
let userid = "";
if ($.cookie("userid")) {
  userid = $.cookie("userid");
}
$("#logout").click(function () {
  Swal.fire({
    icon: "info",
    title: "Logging out...",
    showConfirmButton: false,
    timer: 2500,
    allowOutsideClick: false,
    allowEscapeKey: false,
    didOpen: function () {
      setTimeout(function () {
        $.removeCookie("userid", { path: "/", expires: new Date(0) });
        $.removeCookie("usertype", { path: "/", expires: new Date(0) });
        window.location.href = "/login";
      }, 2500);
    },
  });
});
// admin side
$.ajax({
  type: "GET",
  url: url + "api/available-items",
  dataType: "json",
  success: function (res) {
    var carouselItems = "";
    var indicators = "";
    var itemsPerPage = 4;
    var totalPages = Math.ceil(res.prod.length / itemsPerPage);

    for (var page = 1; page <= totalPages; page++) {
      var activeClass = page === 1 ? "active" : "";
      var startIndex = (page - 1) * itemsPerPage;
      var endIndex = Math.min(startIndex + itemsPerPage, res.prod.length);

      // Build the carousel item for the current page
      var item = `
          <div class="carousel-item ${activeClass}">
            <div class="row">
        `;

      // Iterate over each product in the current page
      for (var i = startIndex; i < endIndex; i++) {
        var product = res.prod[i];
        item += `
            <div class="col-sm-3">
              <div class="thumb-wrapper">
                <div class="img-box">
                  <img src="/pics/${product.img}" class="img-fluid" alt="">
                </div>
                <div class="thumb-content">
                  <h4>${product.brand} ${product.ins_model}</h4>
                  <p class="item-price"><span>${product.price}</span></p>
                </div>
              </div>
            </div>
          `;
      }

      item += `
            </div>
          </div>
        `;

      // Build the carousel indicator for the current page
      var indicator = `
          <li data-target="#myCarousel" data-slide-to="${
            page - 1
          }" class="${activeClass}"></li>
        `;

      // Append the item and indicator to their respective variables
      carouselItems += item;
      indicators += indicator;
    }

    // Set the HTML content of the carousel items and indicators
    $(".cii").html(carouselItems);
    $(".ci").html(indicators);
  },
});
// end side
$.ajax({
  type: "GET",
  url: url + "api/available-items",
  dataType: "json",
  success: function (res) {
    var carouselItems = "";
    var indicators = "";
    var itemsPerPage = 4;
    var totalPages = Math.ceil(res.prod.length / itemsPerPage);

    for (var page = 1; page <= totalPages; page++) {
      var activeClass = page === 1 ? "active" : "";
      var startIndex = (page - 1) * itemsPerPage;
      var endIndex = Math.min(startIndex + itemsPerPage, res.prod.length);

      // Build the carousel item for the current page
      var item = `
          <div class="carousel-item ${activeClass}">
            <div class="row">
        `;

      // Iterate over each product in the current page
      for (var i = startIndex; i < endIndex; i++) {
        var product = res.prod[i];
        item += `
            <div class="col-sm-3">
              <div class="thumb-wrapper">
                <div class="img-box">
                  <img src="/pics/${product.img}" class="img-fluid" alt="">
                </div>
                <div class="thumb-content">
                  <h4>${product.brand} ${product.ins_model}</h4>
                  <p class="item-price"><span>${product.price}</span></p>
                  <a href="#!" class="btn btn-primary addcart" data-insid="${product.ins_idno}">Add to Cart</a>
                </div>
              </div>
            </div>
          `;
      }

      item += `
            </div>
          </div>
        `;

      // Build the carousel indicator for the current page
      var indicator = `
          <li data-target="#myCarousel" data-slide-to="${
            page - 1
          }" class="${activeClass}"></li>
        `;

      // Append the item and indicator to their respective variables
      carouselItems += item;
      indicators += indicator;
    }

    // Set the HTML content of the carousel items and indicators
    $(".custcarouinner").html(carouselItems);
    $(".custcarouindi").html(indicators);
  },
});

$.ajax({
  type: "POST",
  url: url + "api/user-info",
  data: { userid: $.cookie("userid") },
  dataType: "json",
  success: function (res) {
    let user = res.userinfo;
    $("#fname").val(user.firstname);
    $("#mname").val(user.midname);
    $("#lname").val(user.lastname);
    $("#address").val(user.address);
    $("#user").val(user.username);
  },
});

$("#profile").submit(function (e) {
  e.preventDefault();
  var formdata = new FormData(this);
  formdata.append("updateProfile", $.cookie("userid"));
  $.ajax({
    type: "POST",
    url: url + "api/update-profile",
    data: formdata,
    dataType: "json",
    contentType: false,
    processData: false,
    success: function (res) {
      Swal.fire({
        title: "Success!",
        text: "Profile Updated Successfully",
        icon: "success",
        showCancelButton: false,
        confirmButtonText: "OK",
      });
    },
    error: function (a, b, c) {
      console.log(a.responseText, b, c);
    },
  });
});

$(document).on("click", ".addcart", function () {
  let insid = $(this).data("insid");
  $.ajax({
    type: "POST",
    url: url + "api/single-item",
    data: { getProd: insid },
    dataType: "json",
    success: function (res) {
      $(".prodInfoTitle").text(res.ins_name);
      $(".ins_idno").val(insid);
      $(".prodImg").attr("src", "/pics/" + res.img);
      $(".prodType").text(res.ins_type);
      $(".prodYear").text(res.datereleased);
      $(".prodBrand").text(res.brand);
      $(".prodModel").text(res.ins_model);
      $(".prodPrice").text(res.price);
    },
    error: function (a, b, c) {
      console.log(a.responseText, b, c);
    },
    complete: function () {
      $("#prodInfo").modal();
    },
  });
});

$(document).on("click", ".addrent", function () {
  let insid = $(this).data("insid");
  $.ajax({
    type: "POST",
    url: url + "api/single-item",
    data: { getProd: insid },
    dataType: "json",
    success: function (res) {
      $(".prodInfoTitle").text(res.ins_name);
      $(".ins_idno").val(insid);
      $(".prodImg").attr("src", "/pics/" + res.img);
      $(".prodType").text(res.ins_type);
      $(".prodYear").text(res.datereleased);
      $(".prodBrand").text(res.brand);
      $(".prodModel").text(res.ins_model);
      $(".prodPricee").text(res.price);
    },
    error: function (a, b, c) {
      console.log(a.responseText, b, c);
    },
    complete: function () {
      $("#rentInfo").modal();
    },
  });
});
$(document).ready(function() {
  var currentDate = new Date().toISOString().split('T')[0];
  $('#date').attr('min', currentDate);
});

  $('#date').on('change', function() {
    var prodPrice = parseInt($('.prodPricee').text().replace(/[^\d]/g, ''));
    var selectedDate = new Date($(this).val());
    var currentDate = new Date();
  
    var daysDiff = Math.ceil((selectedDate - currentDate) / (1000 * 60 * 60 * 24)); 
    var discount = (prodPrice - (prodPrice * 0.95)); 
    var rentAmount = (discount * (daysDiff * 0.5)).toFixed(2);
  
    $('#rentAmount').text('₱' + rentAmount); 
  });
$('#rentInfo').on('hidden.bs.modal', function () {
  $('#rentAmount').text('₱0.00')
})

$(".addtoCart").on("click", function () {
  let ins_idno = $(".ins_idno").val();
  let quant = $("#quantity").val();
  $.ajax({
    type: "POST",
    url: url + "api/add-to-cart",
    data: { addCart: ins_idno, quant: quant, userid: userid },
    dataType: "json",
    success: function (res) {
      if (res.status != "Error") {
        Swal.fire({
          title: "Success!",
          text: res.message,
          icon: "success",
          showCancelButton: false,
          confirmButtonText: "OK",
        });
      } else {
        Swal.fire({
          title: "Warning!",
          text: res.message,
          icon: "warning",
          showCancelButton: false,
          confirmButtonText: "OK",
        });
      }
    },
    error: function (a, b, c) {
      console.log(a.responseText, b, c);
    },
  });
});
$(".addtoRent").on("click", function () {
  let ins_idno = $(".ins_idno").val();
  let date = $("#date").val();
  let rentAmountText = $('#rentAmount').text().replace(/[^\d.]/g, '');
  let rentAmount = parseFloat(rentAmountText);
  
  $.ajax({
    type: "POST",
    url: url + "api/add-to-rent",
    data: { addRent: ins_idno, date: date, userid: userid, rent: rentAmount },
    dataType: "json",
    success: function (res) {
      if (res.status != "Error") {
        Swal.fire({
          title: "Success!",
          text: res.message,
          icon: "success",
          showCancelButton: false,
          confirmButtonText: "OK",
        });
      } else {
        Swal.fire({
          title: "Warning!",
          text: res.message,
          icon: "warning",
          showCancelButton: false,
          confirmButtonText: "OK",
        });
      }
    },
    error: function (a, b, c) {
      console.log(a.responseText, b, c);
    },
  });
});
