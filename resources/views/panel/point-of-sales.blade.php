@extends('panel.layout.main-layout')
@include('panel.modal-forms.point-of-sales-form')
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
                    <tr data-pos="{{$pointOfSale->id}}">
                        <td>{{$pointOfSale->id}}</td>
                        <td>{{$pointOfSale->name}}</td>
                        <td>{{$pointOfSale->address}}</td>
                        <td>{{$pointOfSale->phone}}</td>
                        <td><button class="btn btn-link delete"><i class="fas fa-times"></i></button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $('.delete').click(function () {
            const id = $(this).closest('tr').data('pos');
            if (confirm('Вы подтверждаете удаление?')) {
                fetch(`/ap/point-of-sales/?id=${id}`, {method: 'DELETE'})
                .then(resp => resp.json())
                .then(data => {
                    location.reload();
                }).catch(err => {
                   alert(err);
                });
            }
        });
    </script>
@append
