@extends('templates.layouts.main')
@section('content')
    <div class="p-4">
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