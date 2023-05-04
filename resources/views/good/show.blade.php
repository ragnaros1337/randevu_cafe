@extends('main.layout')

@section('content_header')
    <h1>Товар</h1>
@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $good->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Наименование</td>
                                        <td>{{ $good->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Артикул</td>
                                        <td>{{ $good->article }}</td>
                                    </tr>
                                    <tr>
                                        <td>Описание</td>
                                        <td>{{ $good->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Изображение</td>
                                        <td>
                                            <img style="width: 100px; height: 100px;" src="{{ asset('storage/'.$good->preview_image) }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Цена</td>
                                        <td>{{ $good->price }}</td>
                                    </tr>
                                    <tr>
                                        <td>Количество</td>
                                        <td>{{ $good->count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Категории</td>
                                        <td>{{ $categories[0]->title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
