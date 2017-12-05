<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>历史订单</title>
    @include('partials.user.head')
</head>
<body>
<div id="wrapper">
@include('partials.user.header')
@include('partials.user.border')
    <!--历史订单-->
@include('partials.user.contenthistory')
    <!-- footer -->
@include('partials.user.footer')
</div>
</body>
<script>
    $(function () {
        $("#refundBT").click(function () {
            var orderId = $("#refundBT").val();

            alert(orderId);
            console.log(orderId);
        })

    })
</script>
</html>