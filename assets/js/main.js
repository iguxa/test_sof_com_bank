$(document).ready( function () {
    $('#table_id').DataTable();
} );
$('.order').on('click',function () {
   var result = confirm('Удалить?');
   if(result){
       var form = $(this).closest("form"),
        data = form.serialize(),
        link = form.attr('action'),
        method = $(this).attr('data-method');

       $.ajax({
           method: method,
           url: link,
           data: data,
       })
           .done(function( msg ) {
               location.href = msg;
           });
   }
   return false;
});

$('.order_form').on('change',function(){
    Order.start;
});

var Order ={
    zone : '', //tarif
    distance : '',
    total : '',
    url : '/form_info/',
    tarif: '',
    price: '',

    get init(){
        this.set_tarif('tarif');
    },
    get start(){
        this.set_properties();
        this.set_price();
        this.set_total();
    },
     set_properties: function(){
        this.zone =  Number($('.tarifs').val());
        this.distance =  Number($('.distance').val());
        this.total =  Number($('.total').val());
     },

    set_tarif: function (name) {
        var self = this;
         $.get( this.url+name, function(data) {
             Order.tarif = JSON.parse(data);
             //self.set_tarif()
        })
    },
    set_price: function(){
        console.log(Order);
        for(var i = 0;i<Order.tarif.length;i++){
            if(Number(Order.tarif[i].id) === Number(Order.zone)){
                Order.price = Number(Order.tarif[i].price);
                break;
            }
        }
    },
    set_total: function () {
        console.log( this.price);
        this.total = this.price*this.distance;
        $('.total').val(this.total);
    },

};
Order.init;
//setTimeout("Order.start",100);
