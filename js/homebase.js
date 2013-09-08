/**
 * Created with IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-28
 * Time: 下午4:35
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    var dialogs={
        dialog:null
    };
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
        var uid = $('#appendedInputButton').attr('uid');
        if($('#appendedInputButton').val()==''){
            alert(tipMsg.pubnulltip);
        }else if(uid==''){
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
            $.post(tipMsg.baseUrl+tipMsg.weibourl,{text:AnalyticEmotion($('#appendedInputButton').val()),pics:imagedata,uid:uid},function(data){
                if(data.code==0){
                    var pubText = AnalyticEmotion($('#appendedInputButton').val());
                    var wid = data.data;
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
                        "<a href='javascript:;' uid='"+uid+"' wid='"+wid+"' class='likeButton'>喜欢(<span>0</span>)</a>"+
                        "<a href='javascript:;' suid='"+uid+"' wid='"+wid+"' uid='"+uid+"' comboxid='commentBox_"+wid+"' nikename='"+uname+"' class='commentButton'>评论(<span>0</span>)</a>"+
                        "<a href='javascript:;'>转发(<span>0</span>)</a>"+
                        "</div>"+
                        "</div>"+
                        "<div class='commentBox'>"+
                        "<ul class='unstyled' id='commentBox_"+wid+"'>"+
                        "</ul> "+
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

    $('.likeButton').live('click',function(){
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

    $('.commentButton').live('click',function(){
        var nickname = $(this).attr('nikename');
        dialogs.dialog = new Dialog({type:'id',value:'commentHideBox'},{title:'评论'+nickname+'的状态'});
        dialogs.dialog.show();
        $('.commentEmotion').click();
        $('.commentEmotion').parent().prev().children().data('comboxid',$(this).attr('comboxid'));
        $('.commentEmotion').parent().prev().children().data('suid',$(this).attr('suid'));
        $('.commentEmotion').parent().prev().children().data('uid',$(this).attr('uid'));
        $('.commentEmotion').parent().prev().children().data('wid',$(this).attr('wid'));
        $('.commentEmotion').parent().prev().children().data('commentcounts',$(this).children().text());
        $('.commentEmotion').parent().prev().children().data('commentcounts_id',$(this).children().attr('commentcounts'));
    });
    $('.commentEmotion').live('click',function(){
        $(this).SinaEmotion($('.userComTextarea'));
    });

    $('.replayButton').live('click',function(){
        var nickname = $(this).attr('nickname');
        dialogs.dialog = new Dialog({type:'id',value:'commentHideBox'},{title:'回复'+nickname+'的评论'});
        dialogs.dialog.show();
        $('.commentEmotion').click();
    });


    $('.userComButton').live('click',function(){
        var thisobj = $(this);
        var usercomval = AnalyticEmotion($(this).parent().parent().parent().prev().val());
        if(usercomval ==''){
            alert(tipMsg.usercomisnull);
            return false;
        }
        var comdom = $(this).data('comboxid');
        var commentcountsdom = $(this).data('commentcounts_id');
        //var suid = $(this).data('suid');
        var uid = $(this).data('uid');
        var wid = $(this).data('wid');
        var userheaderimage=$('.userHeaderImage').attr('src');
        var uname=$('#appendedInputButton').attr('uname');   //sname
        $.post(tipMsg.baseUrl+tipMsg.commenturl,{wid:wid,uid:uid,comment_content:usercomval,parentid:'0'},function(data){
            if(data.code==0){
                var commentcounts = parseInt(thisobj.data('commentcounts'));
                $('#'+commentcountsdom).text(commentcounts+1);
                var comhtml="<li>"+
                    "<div class='comUserHeaderPic'>"+
                    "<img src='"+userheaderimage+"' alt='头像'>"+
                    "</div>"+
                    "<div class='comUserNick'>"+
                    "<a href=''>"+uname+"</a>"+
                    "</div>"+
                    "<div class='userComContents'>"+
                    "<span class='weiboCommentText'>"+
                    usercomval+
                    "</span>"+
                    "</div>"+
                    "<div class='userComTime'>"+
                    "<span class='fromTime'>5秒钟前</span><a href='javascript:;' parent='"+data.data+"'>回复</a>"+
                    "</div>"+
                    "</li>";
                $('#'+comdom).append(comhtml);
                dialogs.dialog.hide();
            }else if(data.code=='-1'){
                alert(data.msg);
                return false;
            }
        },'json');
    });
    /*
      @ function
     */



});
