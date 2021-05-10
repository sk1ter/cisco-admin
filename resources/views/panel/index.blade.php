@extends('panel.layout.main-layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="ccard p-1">
                <div class="ccard-body">
                    <div class="stat">0</div>
                    Заявки сегодня
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ccard p-1">
                <div class="ccard-body">
                    <div class="stat">199</div>
                    Общее количество заявок
                </div>
            </div>
        </div>
    </div>

    <!-- content body start -->
    <div class="content-body mt-4">
        <div class="content-toolbar d-flex justify-content-between">
            <div class="content-toolbar_title">Заявки</div>
            <div class="content-toolbar_buttons">
                <button class="btn btn-cprimary">Поиск</button>
                <button class="btn btn-clight">Очистить</button>
            </div>
        </div>
        <div class="content-data">
            <table class="table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>Дата</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- content body -->
@endsection
