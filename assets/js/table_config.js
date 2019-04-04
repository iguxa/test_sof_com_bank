var link_edit = '/order/';
$(document).ready( function () {
    $('#table_id').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: '/order',
                type: "GET",
            },
            "columns": [
                { "data": "orders_id",
                    "render":function(data, type, row, meta){
                        if(type === 'display'){
                            data = '<a href="' + link_edit + data + '">' + data + '</a>';
                        }

                        return data;
                    },'name':'orders.id'
                },
                { "data": "zones_zone",'name':'zones.zone','orderable':false },
                { "data": "orders_distance",'name':'orders.distance' },

                { "data": "orders_total",'name':'orders_total' },
                { "data": "orders_created_at",'name':'orders.created_at' },


            ],
        }
    )
});