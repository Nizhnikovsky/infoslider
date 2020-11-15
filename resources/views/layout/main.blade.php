<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
<div id="preloader">
    <div class="textload">Loading</div>
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>
<main class="body-wrapper">
    @section('navbar')
        @include('layout.navbar_dark')
    @show

    @yield('content')

    <footer class="footer inverse-wrapper">
        @include('layout.footer')
    </footer>
    <!-- /footer -->
    <div class="slide-portfolio-overlay"></div><!-- overlay that appears when slide portfolio content is open -->
        @include('layout.modal')
</main>

@section('scripts')
    <script src="{{asset("/js/jquery.min.js")}}"></script>
    <script src="{{asset("/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("/js/plugins.js")}}"></script>
    <script src="{{asset("/js/classie.js")}}"></script>
    <script src="{{asset("/js/jquery.themepunch.tools.min.js")}}"></script>
    <script src="{{asset("/js/scripts.js")}}"></script>
    <script src="{{asset("/js/validate.js")}}"></script>
@show

@section('slide')
@show


</body>
</html>
