@extends('panel.layout.main-layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="ccard p-1">
                <div class="ccard-body">
                    <div class="stat">{{$contactsToday}}</div>
                    Заявки сегодня
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ccard p-1">
                <div class="ccard-body">
                    <div class="stat">{{$contactsCount}}</div>
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
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->first_name}}</td>
                        <td>{{$contact->last_name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->created_at->format('d.m.Y • H:i')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- content body -->
@endsection
