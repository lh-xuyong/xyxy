<!DOCTYPE HTML>
<html>
@include('admin.layouts.header')

<body>

<!-- 填充-->
{{--@include('admin.layouts.error')--}}
{{--@include('admin.layouts.success')--}}
@yield("content")
<!-- end-->

@include('admin.layouts.footer')
@yield('script')
</body>
</html>