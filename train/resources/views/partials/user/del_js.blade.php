<script>
    $(document).ready(function(){
        $(".delete").click(function(){
            if (confirm("订单删除后不可还原，订单信息将无法查询，确定删除？")) {
                $("#container").remove();
            }
            else {
                alert("取消");
            }
        });
    });
</script>