@extends('main.layout')

@section('content_header')
    <h1>Добавить Товар</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('good.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <input type="text" name="article" class="form-control" placeholder="Артикул">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" class="form-control" placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" name="weight" class="form-control" placeholder="Вес">
                    </div>
                    <div class="form-group">
                        <input type="text" name="count" class="form-control" placeholder="Доступное количество">
                    </div>
{{--                    TODO:Потом переделать на множественность категорий + миграцию. Сейчас нет времени--}}
                    <div class="form-group">
                        <select name="category_id" class="select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Выберите категорию" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                            @foreach($categories as $category)
                                <option value="{{ $category->id}}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

@push('scripts')
    <script>$('.select2').select2()</script>
@endpush
