@extends('layouts.blog')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/ornaments.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $superstition->name }}</h1>
                        <span class="meta">Народные приметы
              на {{ $superstition->day . ' ' . $superstition->month }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <superstition>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $superstition->description !!}

                    <hr>

                    {!! $superstition->full_text !!}
                    <p>Приметы доступны в Telegram боте
                        <a href="https://t.me/PrimetkiBot">PrimetkiBot</a>.
                </div>
            </div>
        </div>
    </superstition>

    <hr>
@endsection
