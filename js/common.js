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
           $("#regTip span").text(tipMsg.emailIsNotNull);
           $("#regTip").show();
           return false;
       }
       if($password.length < 6 || $password.length > 12){
            $("#regTip span").text(tipMsg.passLength);
            $("#regTip").show();
            return false;
       }
       $("#regTip").hide();
       $(this).button('loading');
       $.getJSON($url,{email:$emailVal,password:$password},function(data){
           if(data.code == 0){
               $("#tipHeader h4").text(data.tipheader);
               $("#tipBody").text(data.tipbody);
               $("#goEmail").attr('urldata',data.emailurl)
               $("#goEmail").text(tipMsg.activebutton);
               $("#regModal").modal({
                   keyboard:false
               });
               $("#regButton").button('reset');
           }else if(data.code == '-1'){
               $("#regTip span").text(data.msg);
               $("#regTip").show();
               $("#regButton").button('reset');
               return false;
           }
       });

       $("#goEmail").click(function(){
           window.open($(this).attr('urldata'));
       });
   });
});
