<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>会员用户中心</title>
    @include('partials.user.head')
</head>
<body>
<div  id="wrapper">
    <!-- navbar -->
    @include('partials.user.header')

    @include('partials.user.border')

    @include('partials.user.content')

    <!-- footer -->
    @include('partials.user.footer')
    <!-- / footer -->
</div>
<!-- jQuery -->
</body>
</html>