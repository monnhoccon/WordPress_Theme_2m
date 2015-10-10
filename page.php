<?php get_header(); ?>
<!--内容模块-->
		<div class="content">
			<div class="content-main">
				<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
				<?php endif; ?>
				<div class="new">
					<div class="new-2" style="margin-left: 20px ;">
						<span><?php echo mb_strimwidth(get_the_title(),0,50,'...'); ?></span>
					</div>
				</div>
				<article class="article">
					<header class="article-header">
						<h1 class="article-title">
							<?php the_title(); ?>
						</h1>
						<div class="meta">
							<span class="group">
								<i class="iconfont iconfont-exceprt">&#xe605</i>
								<?php the_author(); ?>
							</span>
							<span class="group">
								<i class="iconfont iconfont-exceprt">&#xe608</i>
								<?php the_time('Y-m-d') ?>
							</span>
							<span class="group">
								<i class="iconfont iconfont-exceprt">&#xe607</i>
								<?php echo post_views(); ?>浏览
							</span>
							<span class="group">
								<i class="iconfont iconfont-exceprt">&#xe606</i>
								<?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
							</span>
						</div>
					</header>
					<div class="article-content">
						<?php the_content(); ?>
					</div>
					<div class="tags content-tags">
						<span>标签：</span>
						<?php the_tags('','','') ?>
					</div>
					<div class="content-copyright">
						转载请注明：文章转载自：
						<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
						<small>></small>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
					<div class="bdsharebuttonbox share">
						<span class="share-span">分享到：</span>
						<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
						<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
						<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
						<a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a>
						<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
						<a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
						<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
						<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
						<a href="#" class="bds_more" data-cmd="more"></a>
					</div>
				</article>
				<div class="comment" id="comment-mm-section">
					
					<div class="comment-main">
						<?php comments_template(); ?>
					</div>
					
				</div>
			</div>

<?php get_sidebar();?>
	
	<!--rollbar板块-->
		<div class="roolbar">
			<ul>
				<li><a id="roolbar-up"><i class="iconfont iconfont-rollbar">&#xe610</i></a></li>
				<li><a id="roolbar-comment"><i class="iconfont iconfont-rollbar">&#xe617</i></a></li>
				<li><a id="roolbar-down"><i class="iconfont iconfont-rollbar">&#xe616</i></a></li>
			</ul>
		</div>

<?php get_footer(); ?>	