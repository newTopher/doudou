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
        }else{
            var imagedata = $('.divImages img').attr('imagedata')
            if( imagedata != undefined){
                $.post(tipMsg.baseUrl+tipMsg.weibourl,{},function(){

                },'json');
            }
        }
    });

    /*
      @ function
     */



});
