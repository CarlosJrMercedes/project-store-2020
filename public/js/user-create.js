// $('#send').on('click',function(){

//     var name = $('#name').val();

//     Swal.fire('Exito','Cargo el js','info');
// })

$('#closeName').on('click',function(){
    $('#errorName').attr('hidden',true);
});
$('#closeEmai').on('click',function(){
    $('#errorEmail').attr('hidden',true);
});
$('#closePass').on('click',function(){
    $('#errorPass').attr('hidden',true);
});
$('#closeRole').on('click',function(){
    $('#errorRol').attr('hidden',true);
});
$('#closePhoto').on('click',function(){
    $('#errorPhoto').attr('hidden',true);
});