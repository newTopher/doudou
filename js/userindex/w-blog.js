/*--------------w_blog----------------------*/
$(document).ready(function(){
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
	
});
/***********reply********************/
	function active(obj){
		var reply_name=$(obj).attr("name");
		var reply_active="reply_active"+reply_name;
        var replies="replies_"+reply_name;
		var active_obj=$('.'+replies);
        var status= active_obj.css("display");
       if(status=="block"){
           active_obj.css("display","none");
       }else{
           active_obj.css("display","block");
       }
	}

/*---------------------------------*/
$(function(){
	$(".a_reply").hover(
		function(){
			var obj_action=$(this).children(".reply_content").children(".bottom_bar").children(".action");
			obj_action.css("display","block");
		},
		function(){
			$(this).children(".reply_content").children(".bottom_bar").children(".action").css("display","none");
		}
	);
	
		$(".comment-box textarea").click(
			function(){		
			$(".feed-comment .avatar").css("display","block");
			$(".feed-comment .action").css("display","block");
			$(this).css({width:"320px",height:"50px",padding:"3px",fontSize:"12px",overflow:"auto",wordWrap:"wordBreak",wordBreak:"breakAll"})
				}
		);	
		$(".comment-box textarea").blur(
			function(){
			$(".feed-comment .action").css("display","none");
			$(".feed-comment .avatar").css("display","none");
			$(this).css({width:"100%",height:"31px",padding:"3px",fontSize:"12px",overflow:"auto",wordWrap:"wordBreak",wordBreak:"breakAll"})
				
		}
		);
	
	
});
