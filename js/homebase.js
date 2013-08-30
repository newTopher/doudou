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
        $('.uploadImageBox').show();
        event.stopPropagation();
    });
    $('#uploadImageClose').click(function(){
        $('.uploadImageBox').hide();
    });
});
