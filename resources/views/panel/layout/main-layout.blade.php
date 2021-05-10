<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>

<div class="row">
    <div class="col-md-3">
        <aside class="sidebar">
            <div class="logo">
                <img src="{{asset('img/logo_black.png')}}" alt=""/>
            </div>
            <div class="menu">
                <div class="menu-items">
                    <div class="title">Home</div>
                    <ul>
                        <li class="{{request()->route()->getName() === 'panel' ? 'active' : ''}}"><a class="menu-item"
                                                                                                     href="{{route('panel')}}">Заявки</a>
                        </li>
                        <li class="{{request()->route()->getName() === 'pointOfSales' ? 'active' : ''}}"><a
                                href="{{route('pointOfSales')}}">Точки продаж</a></li>
                        <li><a href="#">Продукция</a></li>
                        <li><a href="#">Медиафайлы</a></li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
    <div class="col-md-9">
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="{{asset('js/admin.js')}}"></script>
@yield('scripts')
</body>
</html>
