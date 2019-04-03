$(document).ready( function () {
    $('#table_id').DataTable();
} );
$('.delete').on('click',function () {
   var result = confirm('Удалить?');
   if(result){
       var link = $(this).attr('href');
       $.ajax({
           method: "DELETE",
           url: link,
       })
           .done(function( msg ) {
               location.href = msg;
           });
   }
   return false;
});