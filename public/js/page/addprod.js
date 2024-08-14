$('#preview-container').hide()
    // When a file is selected
    $('#inputGroupFile01').change(function (event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function () {
            var dataURL = reader.result;
            $('#preview-image').attr('src', dataURL);
        };
        $('#preview-container').show()
        reader.readAsDataURL(input.files[0]);
    });
$('#addProd').submit(function (e) {
    e.preventDefault()
    let formdata = new FormData(this)
    formdata.append('addProd', 1)
    $.ajax({
        type: "POST",
        url: url + "api/addproduct",
        data: formdata,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.fire({
                title: "Success!",
                text: "Item Added Successfully",
                icon: "success",
                showCancelButton: false,
                confirmButtonText: "OK",
              }).then(function () {
                location.replace('viewproductspage')
              });
        },
        error: function (a,b,c) {
            console.log(a.responseText,b,c)
        }
    });
})