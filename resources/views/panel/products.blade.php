@extends('panel.layout.main-layout')
@include('panel.modal-forms.point-of-sales-form')
@section('content')
    <div class="content-body">
        <div class="content-toolbar d-flex justify-content-between">
            <div class="content-toolbar_title">Продукция</div>
            <div class="content-toolbar_buttons">
                <a class="btn btn-link add-btn" href="{{route('productForm')}}">
                    Добавить товар
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="content-data">
            <table class="table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Дислокация</th>
                    <th>Описание</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr data-prod="{{$product->id}}">
                        <td>{{$product->id}}</td>
                        <td><img src="{{$product->image_url}}" alt="img" width="150"></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->trimDescription(60)}}</td>
                        <td>
                            <button class="btn btn-link btn-sm deleteProd"><i class="fas fa-times"></i></button>
                            <a class="" href="/ap/products/form?id={{$product->id}}"><i class="fa fa-pen"></i></a>
                        </td>
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
@section('scripts')
    <script>
        $('.deleteProd').click(function () {
            const id = $(this).closest('tr').data('prod');
            if (confirm('Вы подтверждаете удаление?')) {
                fetch(`/ap/products/${id}`, {method: 'DELETE'})
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
