@extends('panel.layout.main-layout')

@section('content')
    <div class="content-body">
        <div class="content-toolbar d-flex justify-content-between">
            <div class="content-toolbar_title">Продукция</div>
        </div>
        <div class="content-data">
            @if($product !== null)
                <img width="200" src="{{$product->image_url}}" alt="">
            @endif
               <div id="product-form"></div>
        </div>
    </div>
@endsection
@section('scripts')

@append
