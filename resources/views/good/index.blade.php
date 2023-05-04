@extends('main.layout')

@section('content_header')
    <h1>Редактор Продуктов</h1>
@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('good.create') }}" class="btn btn-primary">Добавить</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($goods as $good)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $good->id }}</td>
                                        <td style="vertical-align: middle;"><a href="{{ route('good.show', $good->id) }}">{{ $good->title }}</a></td>
                                        <td style="vertical-align: middle; display:flex; justify-content: flex-end; gap: 5px;">
                                            <a href="{{ route('good.edit', $good->id) }}" class="btn btn-primary">Редактировать</a>
                                            <form action="{{ route('good.delete', $good->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Удалить">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
