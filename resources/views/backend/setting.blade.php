@extends('backend.layouts.app')

@section('content')
    <form action="{{ route('admin.settings.store')  }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label> {{__('URL callback')}} </label>
            <div class="input-group">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"> {{ __('Действие') }} <span class="caret"></span>
                        </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="document.getElementById('url_callback_bot').
                        value = '{{ url('')  }}"> {{ __('Вставить URL') }} </a> </li>
                        <li><a href="#"></a> {{ __('Получить URL') }} </li>
                        <li><a href="#"></a> {{ __('Получить информацию') }} </li>
                    </ul>
                </div>
                <input type="url" class="form-controll" id="url_callback_bot" name="url_callback_bot" value=" {{ $url_callback_bot ?? '' }} ">
            </div>
        </div>

        <button type="submit" class="btn btn-primary"> {{ __('Сохранить') }} </button>
    </form>
@endsection
