@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список примет</h1>
        <br>
        <a href="{!! route('superstitions.add') !!}" class="btn btn-info">Добавить приметку</a>
        <br>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>День</th>
                <th>Месяц</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
            @foreach($superstitions as $superstition)
                <tr>
                    <td>{{ $superstition->id }}</td>
                    <td>{{ $superstition->day }}</td>
                    <td>{{ $superstition->month }}</td>
                    <td>{{ $superstition->name }}</td>
                    <td>{!! $superstition->description !!}</td>
                    <td><a href="{{route('superstitions.edit', ['id' => $superstition->id])}}">Редактировать</a>
                        <a href="javascript:;" class="delete" rel="{{$superstition->id}}">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </main>
@endsection
@section('js')
    <script>
        $(function () {
            $(".delete").on('click', function () {
                if(confirm("Удалить запись?")){
                    let id = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('superstitions.delete') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete:function () {
                            alert("Удалено");
                            location.reload();

                        }
                    })
                }else{
                    alert("Действие отменено")
                }
            })
        })
    </script>
@endsection
