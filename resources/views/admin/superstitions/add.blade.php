@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Добавить примету</h1>

        <form method="post">
            {!! csrf_field() !!}
            <p>День приметки <input type="text" name="day" class="form-control"></p>
            <p>Месяц приметки <input type="text" name="month" class="form-control"></p>
            <p>Заголовок приметки <input type="text" name="name" class="form-control"></p>
            <p>Описание (пойдет в телеграм) <textarea type="text" name="description" class="form-control"></textarea></p>
            <p>Текст (будет отображаться на сайте) <textarea type="text" name="full_text" class="form-control"></textarea></p>

            <button type="submit" class="btn-success">Добавить</button>
        </form>
    </main>
@endsection
