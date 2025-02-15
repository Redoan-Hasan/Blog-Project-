<!DOCTYPE html>
<html lang="en" class="h-full">

@include('layouts.partials.head')

<body class="antialiased bg-zinc-900">
    @include('layouts.partials.bg-gradient');

    @include('layouts.partials.navbar');

@yield('main-content')
</body>

</html>