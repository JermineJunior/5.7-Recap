<!DOCTYPE html>
@include('partials._head')
    @yield('style')
</head>
<body>
    <div id="app">
      @include('partials._nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('partials._scripts')
</body>
</html>
