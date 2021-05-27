@extends('panel.layout.main-layout')
@section('content')
    <div class="content-body ">
        <div class="content-toolbar d-flex justify-content-between">
            <div class="content-toolbar_title">Точки продаж</div>
            <div class="content-toolbar_buttons">
                <button class="btn btn-link add-btn" data-bs-toggle="modal" data-bs-target="#pointOfSales">
                    Добавить новую точку
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="content-data"></div>
    </div>
@endsection


