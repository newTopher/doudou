<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
    * Date: 13-9-1
    * Time: 下午5:53
    * To change this template use File | Settings | File Templates.
 */
print_r($_SESSION);
?>
<body id="page1">

            <div class="menu-row">
            	<div class="menu-bg">
                    <div class="main">
                        <nav class="indent-left">
                            <ul class="menu wrapper">
                            <li class="active"><a href="index.html">兜兜主页</a></li>
                            <li><a href="company.html">微博墙</a></li>
                            <li><a href="services.html">找恋人</a></li>
                            <li><a href="projects.html">商城</a></li>
                            <li><a href="contact.html">活动</a></li>
                        </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row-bot">
                <div class="center-shadow">
                    <div class="carousel-container">
                        <div id="carousel">
                            <div class="carousel-feature">
                                <a href="#"><img class="carousel-image" alt="" src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$_SESSION['user']['head_img']?>"></a>
                            </div>
                            <div class="carousel-feature">
                                <a href="#"><img class="carousel-image" alt="" src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$_SESSION['user']['head_img']?>"></a>
                            </div>
                            <div class="carousel-feature">
                                <a href="#"><img class="carousel-image" alt="" src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$_SESSION['user']['head_img']?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!--==============================content================================-->
        <div id="content">
            <div class="main">

<!--==============================w_blog=================================-->
                <?php $i=0; foreach($weiboList as $key=>$val):$i=$i+1;?>
                    <div class="w_blog">

							<div class="blog_content">
                                        <div class="content_main">
                                            <h2>转自：人人网</h2>
                                        </div>
                                        <div class="content_sourse">
                                            <div class="share-video">
                                                <a href="#"></a>
									</div>
									<p class="main_text"><a href="#">日常生活百科<?php echo $i;?></a><?php echo $val['weibo']['text'];?></p>
								</div>
							</div>

							<div class="legend" >
								<a href="javascript:;" class="replied" name="<?php echo $i;?>" onclick="active(this);">回复</a>
								<a href="javascript:;" class="shared">共享</a>
							</div>

							<div class="detail">
								<span class="avatar">
									<a href="#">
									<img src="/images/userindex/gallery-img1.png">
									</a>
								</span>
								<div class="info">
									<p class="main">
										<span class="author">
											<a href="#"><?php echo $val['user']['name'];?></a>
										</span>
										<span class="action">发布状态</span>
									</p>
									<p class="time">
										<span class="time-stamp"><?php echo $val['weibo']['create_time'];?></span>
									</p>
								</div>
							</div>

							<div class="<?php echo 'replies_'.$i;?>" name="rpl_active2" style="display:none;">
								<div class="a_reply">
									<a href="#" class="avatar" target="_blank">
									<img src="/images/userindex/gallery-img2.png">
									</a>

									<div class="reply_content">
										<p class="text"><a href="#" class="name">cz_keller</a>":HELLO WORLD"</p>
										<div class="bottom_bar">
											<span class="time">2013/1/28</span>
											<div class="action">
                                            <a href="javascript:;">回复</a><a href="javascript:;">赞</a>

                                        </div>
										</div>
									</div>
								</div>
                                <textarea class="reply_content" placeholder="在此输入评论内容"></textarea>
							</div>

				</div>
                <?php endforeach;?>
<!--==============================w_blog==END===============================-->

        </div>
    </div>

	<!--==============================footer=================================-->


	<script type="text/javascript"> Cufon.now(); </script>
</body>
