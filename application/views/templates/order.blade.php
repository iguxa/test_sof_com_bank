@extends('templates.layouts.main')
@section('content')
    <div class="p-4">
        {!!form_open('order',['class'=>'order_form'],['orders_id'=>$order->orders_id])!!}
            <div class="form-group">
                <input type="text" class="form-control " disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Заказ {{$order->orders_id}}">
            </div>
            <div class="form-group">
                {!! form_label('Тип отправления','zones_id') !!}
                {!! form_dropdown('zones_id',$zones,$order->zones_id,'class="form-control" ') !!}
            </div>
            <div class="form-group">
                {!! form_label('Тариф','tarifs_id') !!}
                {!! form_dropdown('tarifs_id',$tarifs,$order->tarifs_id,'class="form-control tarifs" ') !!}
            </div>
            <div class="form-group">
                {!! form_label('Расстояние','distance') !!}
                {!! form_input(['type'=>'text','name'=>'distance','class'=>'form-control distance','data-price'=>$order->tarifs_price],$order->orders_distance,'') !!}
            </div>
            <div class="form-group">
                {!! form_label('Итого','total') !!}
                {!! form_input(['type'=>'text','name'=>'total','class'=>'form-control total'],$order->orders_total,'readonly') !!}
            </div>
            <div class="d-flex">
                <a class="m-3 btn btn-primary" href="{{base_url()}}" role="button">Главная</a>
                {!! form_submit('232', 'Редактировать',['role'=>'button','class'=>'m-3 btn btn-warning order','data-method'=>'put'])!!}
                {!! form_submit('', 'Удалить',['role'=>'button','class'=>'m-3 btn btn-danger order','data-method'=>'delete'])!!}
                {{--<a class="m-3 btn btn-danger delete" href="{{base_url(current_url().'/delete')}}" role="button">Удалить</a>--}}
            </div>
        {!!form_close()!!}
</div>
@stop
