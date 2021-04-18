<html lang="en">
<head>
    <title>@yield('title')</title>
</head>
<style>
body {
  background-color: #c9edef;
}
</style>
<body>
    <div align="center">
         @include('layouts.header')
        <div align="center">
            @yield('content')
        </div>
     	@include('layouts.footer')
    </div>
</body>
</html>


