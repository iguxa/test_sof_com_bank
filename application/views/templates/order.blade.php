@extends('templates.layouts.main')
@section('content')
    <div class="p-4">
        {!!form_open()!!}
        <div class="form-group">
                <input type="text" class="form-control " disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Заказ {{$order->orders_id}}">
            </div>
            <div class="form-group">
                {!! form_label('Тип отправления','zones_id') !!}
                {!! form_dropdown('zones_id',$zones,$order->zones_id,'class="form-control" disabled') !!}
            </div>
            <div class="form-group">
                {!! form_label('Тариф','tarifs_id') !!}
                {!! form_dropdown('tarifs_id',$tarifs,$order->tarifs_id,'class="form-control" disabled') !!}
            </div>
            <div class="form-group">
                {!! form_label('Итого','total') !!}
                {!! form_input(['type'=>'text','name'=>'total','class'=>'form-control'],$order->orders_total,'disabled') !!}
            </div>
            <div class="d-flex">
                <a class="m-3 btn btn-primary" href="{{base_url()}}" role="button">Главная</a>
                <a class="m-3 btn btn-warning" href="{{base_url(current_url().'/edit')}}" role="button">Редактировать</a>
                <a class="m-3 btn btn-danger delete" href="{{base_url(current_url().'/delete')}}" role="button">Удалить</a>
            </div>
        {!!form_close()!!}
</div>




@stop
