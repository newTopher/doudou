/**
 * Created with IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-12
 * Time: 下午9:36
 * To change this template use File | Settings | File Templates.
 */
$(function(){
     var schoolJson={
         'data':null
     };
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
       $.getJSON($url+tipMsg.registerurl,{email:$emailVal,password:$password},function(data){
           if(data.code == 0){
               $("#tipHeader h4").text(data.tipheader);
               $("#tipBody").text(data.tipbody);
               $("#goEmail").attr('urldata',data.emailurl);
               $("#goEmail").data('uid',data.uid);
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
           if($(this).attr("urldata") != ''){
               window.open($(this).attr('urldata'));
               $(this).text(tipMsg.sendagain);
               $(this).attr("urldata","");
           }else if($(this).attr("urldata") == ''){
               $uid=$(this).data('uid');
               $.getJSON($url+tipMsg.secendemailurl,{uid:$uid},function(data){
                   if(data.code==0){
                       $("#tipBody").text(data.tipbody);
                   }else if(data.code=='-1'){
                       $("#tipBody").text(data.msg);
                       return false;
                   }
               });
           }
       });
    });

    $("#schoolSelect").on('click',function(event){
       $("#schoolBox").modal({
           keyboard:false
       });
    });
    /*
        loading schoolJson
     */
    $("#schoolBox").on('shown',function(){
        $hostUrl=$("#SignCompeletForm").attr('data');
        $.getScript($hostUrl+tipMsg.schooljsonurl,function(data,textStatus,jqxhr){
            //console.log(jqxhr.status);
            if(textStatus == 'success'){
                //console.log(schoolList);
                schoolJson.data=schoolList[0]
                $("#listProvince").html("");
                $listProvince='';
                $.each(schoolJson.data.provs,function(i,o){
                    $listProvince+="<div class='span1'><a href='#' proid='"+ o.id+"' id='proButton'>"+o.name+"</a></div>";
                });
                $("#listProvince").append($listProvince);
            }else{
                $("#loadFail").html("");
                $("#loadFail").append("<button class='btn btn-primary btn-danger' type='button' data='"+$hostUrl+tipMsg.schooljsonurl+"' data-loading-text='加载中...' id='reloadSchoolList'>"+tipMsg.loadfail+"</button>").show();
            }
        });
    });
    /*
        reload
     */
    $("#reloadSchoolList").live('click',function(){
        $(this).button('loading');
        $.getScript($(this).attr('data'),function(data,textStatus,jqxhr){
            //console.log(jqxhr.status);
            if(textStatus == 'success'){
                //console.log(schoolList);
                schoolJson.data=schoolList[0]
                $("#listProvince").html("");
                $listProvince='';
                $.each(schoolJson.data.provs,function(i,o){
                    $listProvince+="<div class='span1'><a href='#' proid='"+ o.id+"' id='proButton'>"+o.name+"</a></div>";
                });
                $("#listProvince").append($listProvince);
                $("#reloadSchoolList").button('reset');
                $("#loadFail").hide();
            }else{
                $("#loadFail").html("");
                $("#loadFail").append("<button class='btn btn-primary btn-danger' type='button' data='"+$hostUrl+tipMsg.schooljsonurl+"' data-loading-text='加载中...' id='reloadSchoolList'>"+tipMsg.loadfail+"</button>").show();
            }
        });
    });

    /*
        getSchool
     */
    $("#proButton").live('click',function(){
        $proSchoolList = schoolJson.data.provs[parseInt($(this).attr('proid'))-1];
        //console.log($proSchoolList);
        $("#listSchools").html("");
        $listSchools='';
        $.each($proSchoolList.univs,function(i,o){
            $listSchools+="<div class='span3'><a href='#' schoolid='"+ o.id+"' id='schoolButton'>"+o.name+"</a></div>";
        });
        $("#listSchools").append($listSchools);
    });



});
