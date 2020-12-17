@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Изменить категорию</h1>

        <form method="post">
            {!! csrf_field() !!}
            <p>День приметки <input type="text" name="day" class="form-control" value="{{ $superstition->day }}"></p>
            <p>Месяц приметки <input type="text" name="month" class="form-control" value="{{ $superstition->month }}"></p>
            <p>Заголовок приметки <input type="text" name="name" class="form-control" value="{{ $superstition->name }}"></p>
            <p>Описание (пойдет в телеграм) <textarea type="text" name="description" class="form-control">{{ $superstition->description }}</textarea></p>
            <p>Текст (будет отображаться на сайте) <textarea type="text" name="full_text" class="form-control">{{ $superstition->full_text }}</textarea></p>

            <button type="submit" class="btn-success">Сохранить</button>
        </form>
    </main>
@endsection
