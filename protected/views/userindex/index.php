<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
    * Date: 13-9-1
    * Time: 下午5:53
    * To change this template use File | Settings | File Templates.
 */
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
                                <a href="#"><img class="carousel-image" alt="" src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$Fhead_img?>"></a>
                            </div>
                            <div class="carousel-feature">
                                <a href="#"><img class="carousel-image" alt="" src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$Mhead_img?>"></a>
                            </div>
                            <div class="carousel-feature">
                                <a href="#"><img class="carousel-image" alt="" src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$Match_img?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!--==============================content================================-->
        <div id="content">
            <div class="main">

                <!--==============================w_blog=================================-->
				<div class="w_blog">

							<div class="blog_content">
								<div class="content_main">
									<h2>转自：人人网</h2>
								</div>
								<div class="content_sourse">
									<div class="share-video">
										<a href="#"></a>
									</div>
									<p class="main_text"><a href="#">日常生活百科</a>【8个化妆误区 用力过猛变“假脸”】化妆误区1：满脸色彩；化妆误区2：粉质太厚像面具；化妆误区3：对瑕疵我遮遮遮；化妆误区；4：腮红涂得乡土气；化妆误区；5：睫毛怒发冲冠伸上天；化妆误区6：睫毛没毛梢，就像苍蝇腿；化妆误区7：好奇怪的眉型与眉色；化妆误区8：口红口味太重。
									【8个化妆误区 用力过猛变“假脸”】化妆误区1：满脸色彩；化妆误区2：粉质太厚像面具；化妆误区3：对瑕疵我遮遮遮；化妆误区；4：腮红涂得乡土气；化妆误区；5：睫毛怒发冲冠伸上天；化妆误区6：睫毛没毛梢，就像苍蝇腿；化妆误区7：好奇怪的眉型与眉色；化妆误区8：口红口味太重。【8个化妆误区 用力过猛变“假脸”】化妆误区1：满脸色彩；化妆误区2：粉质太厚像面具；化妆误区3：对瑕疵我遮遮遮；化妆误区；4：腮红涂得乡土气；化妆误区；5：睫毛怒发冲冠伸上天；化妆误区6：睫毛没毛梢，就像苍蝇腿；化妆误区7：好奇怪的眉型与眉色；化妆误区8：口红口味太重。</p>
								</div>
							</div>

							<div class="legend" >
								<a href="javascript:;" class="replied" name="reply_1" onclick="active(this);">回复</a>
								<a href="javascript:;" class="shared">共享</a>
							</div>

							<div class="detail">
								<span class="avatar">
									<a href="#">
                                        <img src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$Mhead_img;?>">
									</a>
								</span>
								<div class="info">
									<p class="main">
										<span class="author">
											<a href="#">keller</a>
										</span>
										<span class="action">发布状态</span>
									</p>
									<p class="time">
										<span class="time-stamp">今天 16:11</span>
									</p>
								</div>
							</div>

							<div class="replies" name="rpl_active1">
								<div class="a_reply">
									<a href="#" class="avatar" target="_blank">
									<img src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$Fhead_img;?>">
									</a>

									<div class="reply_content">
										<p class="text">
											<a href="#" class="name">朱雄鹏</a>:
										屌丝的逆袭,高富帅的悲剧
										</p>
										<div class="bottom_bar">
											<span class="time">2013/1/28</span>
											<div class="action">
												<a href="javascript:;">回复</a><a href="javascript:;">赞</a>
											</div>
										</div>
									</div>
								</div>

								<div class="a_reply" >
									<a href="#" class="avatar" target="_blank">
									<img src="/images/userindex/gallery-img2.png">
									</a>

									<div class="reply_content">
										<p class="text">
											<a href="#" class="name">朱雄鹏</a>:
										屌丝的逆袭,高富帅的悲剧
										</p>
										<div class="bottom_bar">
											<span class="time">2013/1/28</span>
											<div class="action">
												<a href="javascript:;">回复</a><a href="javascript:;">赞</a>
											</div>
										</div>
									</div>
								</div>
								<div class="feed-comment">
									<span class="avatar">
										<img src="/images/userindex/gallery-img1.png">
									</span>
									<div class="comment-box">
										<textarea data-fid="111"  placeholder="评论...."></textarea>
										<div class="action">
											<div class="action-l">
												<a href="#nogo" onclick="return false;"class="emotion">表情
													<span class="tip"></span>
													<span class="arrow"></span>
												</a>
												<a href="#nogo" onclick="return false;" class="mention">
												</a>
												<span class="share">
													<input id="shareThis_ID_" type="checkbox">
													<label for="shareThis_ID_">同时分享</label>
												</span>
											</div>
											<div class="action-r">
												<input type="submit" value="回复" href="#nogo" onclick="return false;" class="submit submit-disabled">
											</div>
										</div>
									</div>
								</div>
							</div>

				</div>
                <!--==============================w_blog=================================-->

<!--==============================w_blog=================================-->
				<div class="w_blog">

							<div class="blog_content">
								<div class="content_main">
									<h2>转自：人人网</h2>
								</div>
								<div class="content_sourse">
									<div class="share-video">
										<a href="#"></a>
									</div>
									<p class="main_text"><a href="#">日常生活百科</a>【8个化妆误区 用力过猛变“假脸”】化妆误区1：满脸色彩；化妆误区2：粉质太厚像面具；化妆误区3：对瑕疵我遮遮遮；化妆误区；4：腮红涂得乡土气；化妆误区；5：睫毛怒发冲冠伸上天；化妆误区6：睫毛没毛梢，就像苍蝇腿；化妆误区7：好奇怪的眉型与眉色；化妆误区8：口红口味太重。</p>
								</div>
							</div>

							<div class="legend" >
								<a href="javascript:;" class="replied" name="reply_2" onclick="active(this);">回复</a>
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
											<a href="#">keller</a>
										</span>
										<span class="action">发布状态</span>
									</p>
									<p class="time">
										<span class="time-stamp">今天 16:11</span>
									</p>
								</div>
							</div>

							<div class="replies" name="rpl_active2">
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
							</div>

				</div>
<!--==============================w_blog=================================-->

        </div>
    </div>

	<!--==============================footer=================================-->


	<script type="text/javascript"> Cufon.now(); </script>
</body>
