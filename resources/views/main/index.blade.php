@extends('main.layout')

@section('content_header')
    <h1>Главная</h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $good_count }}</h3>
                            <p>Товары</p>
                        </div>
                        <a href="{{ route('good.index') }}" class="small-box-footer"><span style="margin-right: 5px;">Подробнее</span><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $category_count }}</h3>
                            <p>Категории</p>
                        </div>
                        <a href="{{ route('category.index') }}" class="small-box-footer"><span style="margin-right: 5px;">Подробнее</span><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $man_count }}</h3>
                            <p>Пользователи</p>
                        </div>
                        <a href="{{ route('man.index') }}" class="small-box-footer"><span style="margin-right: 5px;">Подробнее</span><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $order_count }}</h3>
                            <p>Заказы</p>
                        </div>
                        <a href="{{ route('order.index') }}" class="small-box-footer"><span style="margin-right: 5px;">Подробнее</span><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
