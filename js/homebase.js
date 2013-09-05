/**
 * Created with IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-28
 * Time: 下午4:35
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $('#emotionAlink').SinaEmotion($('.pubTextAreaBox'));
    $('#imgUpload').click(function(event){
        $('.shareUrl').hide();
        $('.uploadImageBox').show();
        event.stopPropagation();
    });
    $('#uploadImageClose').click(function(){
        $('.uploadImageBox').hide();
    });

    $('#shareUrlBtn').click(function(){
        $('.uploadImageBox').hide();
        $('.shareUrl').show();
    });

    $('#shareUrlClose').click(function(){
        $('.shareUrl').hide();
    });
    $("#shareUrlButton").click(function(){
        if($("#hasShareUrl").val()==''){
            alert(tipMsg.shareurltip);
            return false;
        }else{
            $('#appendedInputButton').insertAtCaret($("#hasShareUrl").val());
            $('.shareUrl').hide();
        }
    });
    $('#fileButton').uploadify({
        'swf'       : tipMsg.baseUrl+'/js/uploadify/uploadify.swf',
        'uploader' : tipMsg.uploadphotourl,
        'queueID':'uploadImageBox',
        'buttonText':'<div>选择照片</div>',
        'width': 100,
        'method':'post',
        'multi': false,
        'fileTypeExts': '*.jpg;*.png;*.jpeg;*.gif;*.bmp',
        'onUploadSuccess' : function(file,data){
            data=eval("("+data+")");
            if(data.code==0){
                var divs = $('<div>').attr('class','divImages');
                var img = $('<img>').attr('class','img-polaroid uploadedImages')
                    .attr('src',tipMsg.baseUrl+'/uploads/'+data.data).attr('imagedata',data.data);
                $(img).appendTo(divs);
                $('#uploadedImageBox').append(divs);
            }else if(data.code=='-1'){
                $(".fileUploadError h5").text(data.msg);
                $(".fileUploadError").show();
            }
        }
    });

    $(".divImages").live('mouseenter',function(){
        var adom = $('<a>').attr('href','javascript:;').attr('class','delButtonUploadImage');
        $(this).append(adom)
    });
    $(".divImages").live('mouseleave',function(){
        $(this).children('.delButtonUploadImage').remove();
    });

    $('.delButtonUploadImage').live('click',function(){
        var imagedata = $(this).prev().attr('imagedata');
        var thisobj=$(this);
        $.getJSON(tipMsg.deluploadimage,{imagename:imagedata},function(data){
            if(data.code==0){
                thisobj.parent('.divImages').remove();
            }else if(data.code=='-1'){
                alert(data.msg);
            }
        });
    });

    $('#pubButton').click(function(){
        if($('#appendedInputButton').val()==''){
            alert(tipMsg.pubnulltip);
        }else if($('#appendedInputButton').attr('uid')==''){
            alert(tipMsg.uidisnull);
        }else{
            var imagedata = $('.divImages img').attr('imagedata');
            var userheaderimage=$('.userHeaderImage').attr('src');
            var uname=$('#appendedInputButton').attr('uname');
            if( imagedata == undefined){
                imagedata='';
            }
            if(imagedata!=''){
                var imghtml = "<div class='weiimagesBox'>"+
                    "<img src='"+tipMsg.baseUrl+'/uploads/'+imagedata+"'>"+
                    "</div>";
            }else{
                imghtml='';
            }
            $.post(tipMsg.baseUrl+tipMsg.weibourl,{text:AnalyticEmotion($('#appendedInputButton').val()),pics:imagedata,uid:$('#appendedInputButton').attr('uid')},function(data){
                if(data.code==0){
                    var pubText = AnalyticEmotion($('#appendedInputButton').val());
                    var htmlText="<div class='conWrap clear'>"+
                        "<div class='userHeaderPic'>"+
                        "<a href=''><img class='img-rounded' src='"+userheaderimage+"' alt='头像'></a>"+
                        "</div>"+
                        "<div class='conText'>"+
                        "<div class='tAreaBox'>"+
                        "<div class='userLitleInfo'>"+
                        "<span class='mb_name'><a href=''>"+uname+"</a></span>"+
                        "<span class='sign'>my sign is for you !!!</span>"+
                        "</div>"+
                        "<div class='ps'>"+
                        "<div class='content'>"+
                        "<p>"+pubText+"</p>"+
                             imghtml+
                        "</div>"+
                        "</div>"+
                        "<div class='otherUserToolBar'>"+
                        "<span class='fromTime'>10秒钟前</span>"+
                        "<a href='javascript:;'>喜欢(0)</a>"+
                        "<a href='javascript:;'>评论(0)</a>"+
                        "<a href='javascript:;'>转发(0)</a>"+
                        "</div>"+
                        "</div>"+
                        "<div class='commentBox'>"+
                        "<ul class='unstyled'>"+
                        "</ul> "+
                        "<div class='addWrap'>"+
                        "<textarea class='userComTextarea' placeholder='在此输入评论内容'></textarea>"+
                        "<div class='userComToolsBar'>"+
                        "<ul class='inline'>"+
                        "<li class='userComButtonLi'><button class='btn userComButton' type='button'>回复</button></li>"+
                        "<li><a href='javascript:void(0)'>表情</a></li>"+
                        "</ul> "+
                        "</div> "+
                        "</div>"+
                        "</div>"+
                        "</div>"+
                        "</div>";
                    $('.weiboListBox').prepend(htmlText);
                    $('.shareUrl').hide();
                    $('.uploadImageBox').hide();
                    $('#appendedInputButton').val('');
                }else if(data.code=='-1'){
                    alert(data.msg);
                }
            },'json');
        }
    });

    $('.likeButton').click(function(){
        var uid = $(this).attr('uid');
        var wid = $(this).attr('wid');
        var thisobj = $(this);
        if(uid != '' && wid != ''){
            $.getJSON(tipMsg.baseUrl+tipMsg.weilikeurl+'?uid='+uid+'&wid='+wid,function(data){
                var likes = thisobj.children().text();
                if(data.code==0){
                    thisobj.children().text(parseInt(likes)+1);
                }else if(data.code==1){
                    thisobj.children().text(parseInt(likes)-1);
                }else if(data.code=='-1'){
                    alert(data.msg);
                }
            });
        }
    });

    $('.commentButton').click(function(){
        var nickname = $(this).attr('nikename');
        var dialog = new Dialog({type:'id',value:'commentHideBox'},{title:'评论'+nickname+'的状态'});
        dialog.show();
    });


    /*
      @ function
     */



});
