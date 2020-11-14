@extends('backend.layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-info">
                <span>{{ Session::get('status') }}</span>
            </div>
        @endif
        <form action="{{ route('admin.settings.store')  }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label> {{__('URL callback')}} </label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> {{ __('Действие') }} <span
                                class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#"
                                   onclick="document.getElementById('url_callback_bot').value = '{{ url('')  }}">{{ __('Вставить URL') }}</a>
                            </li>
                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('setwebhook').submit();">{{ __('Установить webhook') }}</a></li>
                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit();">{{ __('Получить инф. по webhook') }}</a></li>
                        </ul>
                    </div>
                    <input type="url" class="form-control" id="url_callback_bot" name="url_callback_bot"
                           value=" {{ $url_callback_bot ?? '' }} ">
                </div>
            </div>

            <button type="submit" class="btn btn-primary"> {{ __('Сохранить') }} </button>
        </form>

        <form id="setwebhook" action="{{ route('admin.settings.setwebhook') }}" method="POST" style="display: none">
            {{ csrf_field() }}
            <input type="hidden" name="url" value="{{ $url_callback_bot ?? '' }}">
        </form>

        <form id="getwebhookinfo" action="{{ route('admin.settings.getwebhookinfo') }}" method="POST" style="display: none">
            {{ csrf_field() }}
        </form>

    </div>
@endsection
