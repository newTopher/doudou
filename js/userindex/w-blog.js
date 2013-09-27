/*--------------w_blog----------------------*/
$(function(){
	var div=$("#content .main .w_blog");
	var len=div.length;
	var i=1;
	var next=div;
	var preHeight=next.offset().top;
	var status=0;
	while(next.html()!=null){
		var height=next.offset().top;
		if(i==1){
			next.css("float","left");
			next.css("clear","left");
		}
		if(i==2){
			next.css("float","right");
			next.css("clear","right");
			status=1;
		}
		if(i>2){
			
			if(status==1){
				if(height>preHeight){
					next.css("float","left");
					next.css("clear","left");
					status=0;
					preHeight=height;
				}else{
					next.css("float","right");
					next.css("clear","right");
					status=1;
				}
			}
			if(status==0){
				if(height>preHeight){
					next.css("float","right");
					next.css("clear","right");
					status=1;
					preHeight=height;
				}else{
					next.css("float","left");
					next.css("clear","left");
				}
			}		
		}
		i++;
		next=next.next();
	}
    $('.replied').click(function(event){
        var reply_name=$(this).attr("name");
        var replies="replies_"+reply_name;
        var active_obj=$('.'+replies);
        $s=active_obj.attr("data");
        var status= active_obj.css("display");
        if($s=="Y"){
            if(status=="block"){
                active_obj.hide();
            }else{
                active_obj.show();
            }
            $(this).children(".avatar").hide();
            event.stopPropagation();
        }else{
            active_obj.hide();
        }
    });
    $(".a_reply").hover(
        function(){
            var obj_action=$(this).children(".reply_content").children(".bottom_bar").children(".action");
            obj_action.show();
        },
        function(){
            $(this).children(".reply_content").children(".bottom_bar").children(".action").hide();
        }
    );
    $(".comment-box textarea").click(
        function(event){
            $(this).parent().parent().children(".avatar").show();
            if($(this).val()!==""){
                $(this).parent().parent().find(".submit-disabled").removeClass("submit-disabled").addClass("submit");
            }else{
                $(this).parent().parent().find(".submit").removeClass("submit").addClass("submit-disabled");
            }
            $(this).css({width:"320px",height:"50px",padding:"3px",fontSize:"12px",overflow:"auto",wordWrap:"wordBreak",wordBreak:"breakAll"})
            event.stopPropagation();
        }
    );
    $(document).click(
        function(){
            $('.feed-comment textarea').show();
            $('.feed-comment textarea').css({width:"100%",height:"31px",padding:"2px",fontSize:"12px",overflow:"auto",wordWrap:"wordBreak",wordBreak:"breakAll"});
            $(".feed-comment .avatar").hide();
        }
    );
    $(".comment-box textarea").keyup(
        function(event){
            keycode=event.which;
            var replies= $(this).parent().parent().parent().attr("class");
            $i=replies.split("_");
            if((keycode=="8" && $.trim($(this).val())=="")){
                $(this).parent().parent().find(".submit").removeClass("submit").addClass("submit-disabled");
            }else{
                $(this).parent().parent().find(".submit-disabled").removeClass("submit-disabled").addClass("submit");
                $(this).parent().parent().find(".submit").attr("id",$i[1]);
                $(this).css({color:"black"});
            }
        }
    );
    $(".action-r input").click(
        function(){
            var commentData=$(this).parent().parent().parent().find(".comment-box textarea").val();
            if(commentData){
                if( $(this).attr('class')=="submit"&&$(".submit").attr("id")==$(this).attr("id")){
                    $replies =  $(this).parent().parent().parent().parent();
                    var w_id=$replies.attr("data");
                    var uid=$
                    $.post(tipMsg.baseUrl+tipMsg.commenturl,{data:commentData,w_id:w_id},function(){
                        if(data.code==1){
                            var htmlText="<div class='a_reply'>"+
                                "<a href='#' class='avatar' target='_blank'>"+
                                "<img src='/images/userindex/gallery-img2.png'>"+
                                "</a>"+
                                "<div class='reply_content'>"+
                                "<p class='text'>"+"<a href='#' class='name'>"+"cz_keller"+"</a>"+commentData+"</p>"+
                                "<div class='bottom_bar'>"+
                                "<span class='time'>"+"五秒钟以前"+"</span>"+
                                "<div class='action'>"+
                                "<a href='javascript:;'>"+"回复"+"</a>"+"<a href='javascript:;'>"+"赞"+"</a>"+
                                "</div>"+
                                "</div>"+
                                "</div>"+
                                "</div>"

                            $replies.children().last().prev().after(htmlText);
                            $(this).removeClass("submit").addClass("submit-disabled");
                            $(this).parent().parent().parent().find(".comment-box textarea").val("");
                        }else if(data.code=-1){
                            alert("评论出错啦，再猛击提交试试");
                        }
                    });
                }else{
                    $('#'+$(".submit").attr("id")).parent().parent().prev().children().focus();
                }
            }else{
                return false;
            }
        }
    );
});


