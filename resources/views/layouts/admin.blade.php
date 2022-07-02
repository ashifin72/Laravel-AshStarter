<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! MetaTag::tag('title') !!}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">

    <!-- Main Header -->
@yield('header')

<!-- Main Sidebar Container -->
@yield('main-sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            @include("admin.components.result_messages")
            <div class="container">
                @yield('content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
@yield('control-sidebar')

<!-- /.control-sidebar -->

    <!-- Main Footer -->
    @yield('footer')

</div>
<!-- ./wrapper -->
<!-- Scripts -->

<!-- jQuery -->
{{--<script src="{{ asset('assets/admin/js/admin.js') }}"></script>--}}
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/adminlte.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/demo.js') }}"></script>

{{--<script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>--}}
{{--<script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>--}}
<script src="{{ asset('assets/admin/js/main.js') }}"></script>

<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
{{--<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>--}}
{{--<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>--}}
<script src="https://cdn.tiny.cloud/1/35nb2qao9pipki5el15f9gkzrdim304gf1043yj1s8z4ll9k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script >
    var editor_config = {
        path_absolute : "/",
        language:"uk",
        selector: '.content-editor',
        relative_urls: false,
        height: '600px',
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
    $('#dow_img1').filemanager('image')
    $('#dow_img2').filemanager('image')
</script>



</body>
</html>
