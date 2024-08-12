@include('Admin.head')
<body>
    <script src="{{asset("assets/assets/static/js/initTheme.js")}}"></script>
    <div id="app">
        @include('Admin.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('body')
{{-- @include('Admin.body') --}}
@include('Admin.footer')

    </div>
    <script src="{{asset("assets/assets/static/js/components/dark.js")}}"></script>
    <script src="{{asset("assets/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>
    
    
    <script src="{{asset("assets/assets/compiled/js/app.js")}}"></script>
    

    
<!-- Need: Apexcharts -->
<script src="{{asset("assets/assets/extensions/apexcharts/apexcharts.min.js")}}"></script>
<script src="{{asset("assets/assets/assets/static/js/pages/dashboard.js")}}"></script>


</body>

</html>