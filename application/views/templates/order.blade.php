@extends('templates.layouts.main')
@section('content')
    <div class="p-4">
        {!!form_open('order',['class'=>'order_form'])!!}
            <div class="form-group">
                <input type="text" class="form-control " disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Заказ {{$order->orders_id ?? 'новый'}}">
            </div>
            @isset($order->orders_id)
                {!! form_hidden('id', $order->orders_id)!!}
            @endisset
            <div class="form-group">
                {!! form_label('Тип отправления','zones_id') !!}
                {!! form_dropdown('zones_id',$zones,$order->zones_id ?? '','class="form-control zones" ') !!}
            </div>
            <div class="form-group">
                {!! form_label('Расстояние','distance') !!}
                {!! form_input(['type'=>'number','name'=>'distance','class'=>'form-control distance'],$order->orders_distance ?? '0','') !!}
            </div>
            <div class="form-group">
                {!! form_label('Итого','total') !!}
                {!! form_input(['type'=>'number','name'=>'total','class'=>'form-control total'],$order->orders_total ?? '0','readonly') !!}
            </div>
            <div class="d-flex">
                <a class="m-3 btn btn-primary" href="{{base_url()}}" role="button">Главная</a>
            @isset($form_type)
                @if($form_type == 'edit')
                {!! form_submit('', 'Редактировать',['role'=>'button','class'=>'m-3 btn btn-warning order','data-method'=>'put'])!!}
                {!! form_submit('', 'Удалить',['role'=>'button','class'=>'m-3 btn btn-danger order','data-method'=>'delete'])!!}
                @endif

                @if($form_type == 'create')
                {!! form_submit('', 'Сохранить',['role'=>'button','class'=>'m-3 btn btn-warning order','data-method'=>'post'])!!}
                @endif
            @endisset()
            </div>
        {!!form_close()!!}
</div>
@stop
