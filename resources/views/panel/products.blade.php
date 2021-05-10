@extends('panel.layout.main-layout')
@include('panel.modal-forms.point-of-sales-form')
@section('content')
    <div class="content-body">
        <div class="content-toolbar d-flex justify-content-between">
            <div class="content-toolbar_title">Продукция</div>
            <div class="content-toolbar_buttons">
                <button class="btn btn-link add-btn" data-bs-toggle="modal" data-bs-target="#pointOfSales">
                    Добавить товар
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="content-data">
            <table class="table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Дислокация</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td><img src="{{$product->image_url}}" alt="img" width="150"></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->trimDescription(60)}}</td>
                        <td><a href="#"><i class="fas fa-times"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
