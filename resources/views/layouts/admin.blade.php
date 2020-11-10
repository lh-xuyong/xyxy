<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    @include('layouts.meta')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/h-ui/css/H-ui.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('static/h-ui.admin/css/H-ui.admin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/Hui-iconfont/1.0.8/iconfont.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('static/h-ui.admin/skin/default/skin.css') }}" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{ asset('static/h-ui.admin/css/style.css') }}" />
    <!--/meta 作为公共模版分离出去-->
    @yield('css')
    <title>@yield('title')</title>

</head>
<body>
<!--_header 作为公共模版分离出去-->
@include('layouts.header')
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
@include('layouts.menu')
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
    @include('layouts.breadcrumbs')
    <div class="Hui-article">
        @yield('content')
    </div>
</section>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{ asset('lib/jquery/1.9.1/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/layer/2.4/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/h-ui/js/H-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/h-ui.admin/js/H-ui.admin.page.js') }}"></script>
<!--/_footer /作为公共模版分离出去-->
@yield('footer')
<!--请在下方写此页面业务相关的脚本-->
    @yield('js')
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>