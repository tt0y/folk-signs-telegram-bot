@extends('layouts.blog')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/blog/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $superstition->name }}</h1>
                        <h2 class="subheading">{{ $superstition->description }}</h2>
                        <span class="meta">Posted by
              on {{ $superstition->day . ' ' . $superstition->month }}</span>
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
                    {{ $superstition->description }}

                    {!! $superstition->full_text !!}
                    <p>Placeholder text by
                        <a href="http://spaceipsum.com/">{{ $superstition->name }}</a>.
                </div>
            </div>
        </div>
    </superstition>

    <hr>
@endsection
