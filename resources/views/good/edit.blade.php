@extends('main.layout')

@section('content_header')
    <h1>Редактировать Товар</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('good.update', $good->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Наименование</label>
                        <input type="text" name="title" value="{{ $good->title }}" class="form-control" placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <label>Артикул</label>
                        <input type="text" name="article" value="{{ $good->article }}" class="form-control" placeholder="Артикул">
                    </div>
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea style="resize: none;" name="description" cols="30" rows="10" class="form-control" placeholder="Описание">{{ $good->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Цена</label>
                        <input type="text" name="price" value="{{ $good->price }}" class="form-control" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <label>Доступное количество</label>
                        <input type="text" name="count" value="{{ $good->count }}" class="form-control" placeholder="Доступное количество">
                    </div>
                    <div class="form-group">
                        <label>Категории товара</label>
                        <select name="category_id" class="select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Выберите категорию" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                            @foreach($categories as $category)
                                @if($category->id === $good->category_id)
                                    <option selected="selected" value="{{ $category->id}}">{{ $category->title }}</option>
                                @else
                                    <option value="{{ $category->id}}">{{ $category->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Изображение товара</label>
                        <div class="input-group" style="align-items: center;">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" style="margin-right: 10px;">Загрузить</span>
                            </div>
                            <img style="width: 100px; height: 100px;" src="{{ asset('storage/'.$good->preview_image) }}">
                        </div>
                    </div>
					<div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

@push('scripts')
    <script>$('.select2').select2()</script>
@endpush
