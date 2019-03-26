@extends('templates.layouts.main')
@section('content')
    hello world! {{ $params['name'] ?? 'Tim'}}
@stop