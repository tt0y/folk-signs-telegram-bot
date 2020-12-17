
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Primetki - Народные приметы</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">



    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/css/cover.css" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            {{--<h3 class="float-md-start mb-0">Primetki</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Contact</a>
            </nav>--}}
        </div>
    </header>

    <main class="px-3">
        <h1>Телеграм-бот «Приметки» Приметы на день </h1>
        <p class="lead">---</p>
        <p class="lead">Что можно и чего нельзя делать в этот день</p>
        <p class="lead">Просто спросите бота о примете на сегодня и он будет присылать вам одну народную примету каждый день</p>
        <p class="lead">Если надоело, удалите беседу с ботом</p>
        <p class="lead">---</p>
        <p class="lead">
            <a href="https://t.me/PrimetkiBot" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Перейти к боту</a>
        </p>
    </main>

    <footer class="mt-auto text-white-50">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
    </footer>
</div>
@include('inc.counters')
</body>
</html>
