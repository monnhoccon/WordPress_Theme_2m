<?php get_header(); ?>
<!--内容模块-->
		<div class="content">
			<div class="content-main">
				<div class="new">
					<div class="new-1">搜索结果</div>
				</div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			    <article class="excerpt">
					<div class="excerpt-img">
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} else {
									echo '<img src="';
									echo bloginfo('template_url');
									echo '/img/zhandian.png"'.' alt="图片"/>';
								}
							?>
						</a>
					</div>
					
					<header class="excerpt-header">
							<a href="<?php $category = get_the_category(); echo get_category_link($category[0]->term_id ) ?>" class="label">
								<?php 
									echo $category[0]->cat_name;
								 ?>							
							</a>
							<i class="label-arrow"></i>
							<div class="excerpt-header-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(),0,50,'...'); ?></a>
							</div>
					</header>
					<div class="exceprt-information">
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
					<div class="note">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="next">继续阅读>></a>
					<div class="tags">
						<?php the_tags('','','') ?>
						<div style="height: 22px;width: 1px;display: inline-block;"></div>
					</div>
					
				</article>
			<?php endwhile; ?>
			<?php else : ?>
			    
			<?php endif; ?>
			<div class="pagination">
					<ul>
						<?php par_pagenavi(3); ?>
					</ul>
				</div>
			</div>
<?php get_sidebar();?>

	<!--rollbar板块-->
		<div class="roolbar">
			<ul>
				<li><a id="roolbar-up"><i class="iconfont iconfont-rollbar">&#xe610</i></a></li>
				<li><a id="roolbar-down"><i class="iconfont iconfont-rollbar">&#xe616</i></a></li>
			</ul>
		</div>

<?php get_footer(); ?>	
