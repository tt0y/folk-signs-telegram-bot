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
                        <span class="meta">Народные приметы на {{ $superstition->day . ' ' . \App\helpers::$months[$superstition->month] }}</span>
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
                    @if(!empty($superstition->full_text))
                        {!! $superstition->full_text !!}
                    @else
                        {!! $superstition->description !!}
                    @endif
                </div>
            </div>
        </div>
    </superstition>
@endsection
