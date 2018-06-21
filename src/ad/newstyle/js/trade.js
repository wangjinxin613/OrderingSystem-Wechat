/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function trade() {
    var load_a = layer.load();
    $.post("trade_processer.php",
            {
                account_id: $("#account_id").val(),
                trade_money: $("#trade_money").val(),
                trade_type: $("#trade_type").val(),
                trade_action: $("#trade_action").val(),
                trade_shopname:$("#trade_shopname").val()
            },
    function (data, status) {
        if (data == "success") {
            switch ($("#trade_action").val()) {
                case "recharge":
                    toastr.success("会员卡号" + $("#account_id").val() + '充值￥' + $("#trade_money").val() + "成功");
                    break;
                case "consume":
                    toastr.success("会员卡号" + $("#account_id").val() + '消费￥' + $("#trade_money").val() + "成功");
                    break;
            }
        }
        else {
            showErrorToast(data);
        }
        layer.close(load_a);
        $("#account_id").val("");
        $("#trade_action").val('');
        $("#trade_type").val("");
        $("#trade_money").val("");
        $("#trade_window").hide();
        $(".shadow").hide();
    });
}