@extends('templates.layouts.main')
@section('content')
    <div class="p-4">
        hello world! {{ $params['name'] ?? 'Tim'}}

        <div class="mx-10">
            <a class="btn btn-primary" href="{{base_url('order/create')}}" role="button">Добавить</a>
        </div>
        <table id="table_id" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Заказ</th>
                <th>Тип</th>
                <th>Расстояние</th>
                <th>Всего</th>
                <th>Дата создания</th>
            </tr>
            </thead>
            {{--<tbody>
            @foreach($orders ?? [] as $order)
                <tr>
                    <td><a class="btn btn-success" role="button" href="{{base_url('/order/'.$order->orders_id)}}">{{$order->orders_id}}</a></td>
                    <td>{{$order->zones_zone}}</td>
                    <td>{{$order->orders_distance}}</td>
                    <td>{{$order->orders_total}}</td>
                    <td>{{$order->orders_created_at}}</td>
                </tr>
            @endforeach
            </tbody>--}}
            <tfoot>
            <tr>
                <th>Заказ</th>
                <th>Тип</th>
                <th>Расстояние</th>
                <th>Всего</th>
                <th>Дата создания</th>
            </tr>
            </tfoot>
        </table>
    </div>

@stop