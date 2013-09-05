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
		var rpl_name=$(obj).attr("name");
		var arr=rpl_name.split("_");
		var rpl_active="rpl_active"+arr[1];	
		var active_arr=[];
		var active_obj=$(".replies");
		for(i=0;i<active_obj.length;i++){
			active_arr=$(active_obj.get(i)).attr("name");
			if(active_arr==rpl_active){	
				var rpl_status=$(active_obj.get(i)).css("display");
				rpl_status=rpl_status.toString();
					var none="none";
					var block="block";
				if(rpl_status==none){
					$(active_obj.get(i)).css("display","block");
				}
				if(rpl_status==block){
					$(active_obj.get(i)).css("display","none");
				}
				break;
			}			
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
