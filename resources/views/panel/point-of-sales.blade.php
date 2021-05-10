@extends('panel.layout.main-layout')
@include('panel.modal-forms.point-of-sales-form')
@section('content')
    <div class="content-body ">
        <div class="p-3 d-flex justify-content-between">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Список</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Редактировать</a>
            </li>
        </ul>
        <div>
            <button class="btn btn-link add-btn" data-bs-toggle="modal" data-bs-target="#pointOfSales">
                Добавить новую точку
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
                    <th>Телефон</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($pointOfSales as $pointOfSale)
                    <tr>
                        <td>{{$pointOfSale->id}}</td>
                        <td>{{$pointOfSale->name}}</td>
                        <td>{{$pointOfSale->address}}</td>
                        <td>{{$pointOfSale->phone}}</td>
                        <td><a href="#"><i class="fas fa-times"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
