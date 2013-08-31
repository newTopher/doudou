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

    $('#fileButton').uploadify({
        'auto'      :false,
        'swf'       : 'http://doudou.test.local/js/uploadify/uploadify.swf',
        'uploader' : 'http://doudou.test.local/js/uploadify/uploadify.php',
        'queueID':'uploadImageBox'
    });

});
