@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>{{__('Изменить категорию')}}</h1>

        <form method="post">
            {!! csrf_field() !!}
            <p>{{__('День приметки')}} <input type="text" name="day" class="form-control" value="{{ $superstition->day }}"></p>
            <p>{{__('Месяц приметки')}} <input type="text" name="month" class="form-control" value="{{ $superstition->month }}"></p>
            <p>{{__('Заголовок приметки')}} <input type="text" name="name" class="form-control" value="{{ $superstition->name }}"></p>
            <p>{{__('Описание (телеграм)')}} <textarea type="text" name="description" class="form-control">{{ $superstition->description }}</textarea></p>
            <p>{{__('Текст (статья сайт)')}} <textarea type="text" name="full_text" class="form-control">{{ $superstition->full_text }}</textarea></p>

            <button type="submit" class="btn btn-success">{{__('Сохранить')}}</button>
        </form>
    </main>
@endsection
