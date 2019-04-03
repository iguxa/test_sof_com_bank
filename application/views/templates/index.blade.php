@extends('templates.layouts.main')
@section('content')
    <div class="p-4">
        hello world! {{ $params['name'] ?? 'Tim'}}

        <div class="mx-10">
            <a class="btn btn-primary" href="{{base_url('/add')}}" role="button">Добавить</a>
        </div>
        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>Заказ</th>
                <th>Тип</th>
                <th>Тариф</th>
                <th>Расстояние</th>
                <th>Всего</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders ?? [] as $order)
                <tr>
                    <td><a class="btn btn-success" role="button" href="{{base_url('/order/'.$order->orders_id)}}">{{$order->orders_id}}</a></td>
                    <td>{{$order->zones_zone}}</td>
                    <td>{{$order->tarifs_tarif}}</td>
                    <td>{{$order->orders_distance}}</td>
                    <td>{{$order->orders_total}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop