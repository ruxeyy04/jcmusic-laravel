
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
$(document).on('click', '.editProd', function () {
    let insid = $(this).data('insid')
    $('input[name="insid"]').val(insid)
    $.ajax({
        type: "POST",
        url: url + "api/getInfoProd",
        data: {getInfoProd: insid},
        dataType: "json",
        success: function (res) {
            let item = res.item[0]
            var value = item.price
            var floatValue = parseFloat(value.replace(/₱|,/g, ""));
            $('input[name="name"]').val(item.ins_name)
            $('#preview-image').attr('src', '/pics/'+item.img)
            $('status[name="type"]').val(item.ins_type)
            $('input[name="year"]').val(item.datereleased)
            $('input[name="model"]').val(item.ins_model)
            $('input[name="brand"]').val(item.brand)
            $('input[name="price"]').val(floatValue)
            $('status[name="status"]').val(item.status)
        },
        error: function (a,b,c) {
            console.log(a.responseText,b,c)
        },
        complete: function () {
            $('#editProd').modal('show')
        }
    });
    
})

$('#editProduct').submit(function (e) {
    e.preventDefault()
    let formdata = new FormData(this)
    formdata.append('updateProd', 1)
    $.ajax({
        type: "POST",
        url: url + "api/updateProd",
        data: formdata,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.fire({
                title: "Success!",
                text: "Item Updated Successfully",
                icon: "success",
                showCancelButton: false,
                confirmButtonText: "OK",
              }).then(function () {
                location.replace('modproducts')
              });
        },
        error: function (a,b,c) {
            console.log(a.responseText,b,c)
        }
    });
})

$(document).on('click', '.delProd', function () {
    let insid = $(this).data('insid')
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type:  "POST",
            url: url + "api/delItem",
            data: {delItem: insid},
            dataType: "json",
            success: function (res) {
                console.log(res)
                Swal.fire(
                    'Deleted!',
                    res.message,
                    'success'
                  );
            },
            complete: function () {
                location.reload();
            }
          });
        } 
      });
})
