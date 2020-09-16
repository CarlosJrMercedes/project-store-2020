
$(document).on("click","#addProdcut", function(){
    var id = $("#id").val();
    var url = $("#url").val();
    $.ajax({
        url:url,
        type:'GET',
        data: "id="+id,
    }).done(function(res){

        // Swal.fire("Hola",res,"success");
        Swal.fire({
            icon: 'success',
            title: res,
            showConfirmButton: false,
            timer: 1500
          })

         
          setInterval("actualizar()",1550);


    }).fail(function(){

    });
});

function actualizar(){
    location.reload();
}