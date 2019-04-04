$('.order').on('click',function () {
   var message = $(this).val(),
       result = confirm(message +' ?');
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
    zones_id : '',
    distance : '',
    total : '',
    url : '/form_info/',
    zone: '',
    price: '',

    get init(){
        this.set_zones('zone');
    },
    get start(){
        this.set_properties();
        this.set_price();
        this.set_total();
    },
     set_properties: function(){
        this.zones_id =  Number($('.zones').val());
        this.distance =  Number($('.distance').val());
        this.total =  Number($('.total').val());
     },

    set_zones: function (name) {
         $.get( this.url+name, function(data) {
             Order.zone = JSON.parse(data);
        })
    },
    set_price: function(){
        console.log(Order);
        for(var i = 0;i<Order.zone.length;i++){
            if(Number(Order.zone[i].id) === Number(Order.zones_id)){
                Order.price = Number(Order.zone[i].price);
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
