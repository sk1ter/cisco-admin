@extends('panel.layout.main-layout')

@section('content')
    <div class="content-body">
        <div class="content-toolbar d-flex justify-content-between">
            <div class="content-toolbar_title">Продукция</div>
        </div>
        <div class="content-data">
            @if($product !== null)
                <img width="200" src="https://via.placeholder.com/640x480.png/004499?text=quia" alt="">
            @endif
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form">
                                <label for="image_url">Image</label>
                                <input id="image_url" type="text" name="image_url" value="{{old('image_url', $product !== null ? $product->image_url : '')}}"/>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection
