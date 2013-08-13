/**
 * Created with IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-12
 * Time: 下午9:36
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $("#regClose").click(function(){
        $("#regTip span").text();
        $("#regTip").hide();
    });
    $("#regButton").click(function(){
       $emailVal = $("#RegModel_email").val();
       $password = $("#RegModel_password").val();
       $url = $(this).attr("data");
       if($emailVal == ''){
           $("#regTip span").text("邮箱不能为空");
           $("#regTip").show();
           return false;
       }
       if($password.length < 6 || $password.length > 12){
            $("#regTip span").text("密码长度在6至12之间");
            $("#regTip").show();
            return false;
       }
       $("#regTip").hide();
       $(this).button('loading');
       $.getJSON($url,{email:$emailVal,password:$password},function(data){
           alert(data);
       })

   });
});
