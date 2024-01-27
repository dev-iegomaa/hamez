</div>
@if(LaravelLocalization::getCurrentLocale() == 'en')
    <script src="{{ asset('adminAssets/en/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('adminAssets/en/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('adminAssets/en/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminAssets/en/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('adminAssets/en/assets/js/app.js') }}"></script>
    <script src="{{ asset('adminAssets/en/assets/js/custom.js') }}"></script>
    <script src="{{ asset('adminAssets/en/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adminAssets/en/assets/js/dashboard/dash_1.js') }}"></script>
@else
    <script src="{{ asset('adminAssets/ar/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('adminAssets/ar/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('adminAssets/ar/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminAssets/ar/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('adminAssets/ar/assets/js/app.js') }}"></script>
    <script src="{{ asset('adminAssets/ar/assets/js/custom.js') }}"></script>
    <script src="{{ asset('adminAssets/ar/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adminAssets/ar/assets/js/dashboard/dash_1.js') }}"></script>
@endif
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@include('sweetalert::alert')
@stack('js')
</body>
</html>
