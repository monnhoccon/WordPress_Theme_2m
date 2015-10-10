<!--
	作者：二梦
	时间：2015-03-07
	描述：2m主题/头部模板
-->
<!DOCTYPE HTML>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
		<title><?php
				 if(is_home()){
				 	 bloginfo('name');echo'|';bloginfo('description');
				 }elseif(is_category()){
				 	single_cat_title();echo'|';bloginfo('name');
				 }elseif(is_single()||is_page()){
				 	single_post_title();echo'|';bloginfo('name');
				 }elseif(is_search()){
				 	echo '搜索结果';echo'|';bloginfo('name');
				 }elseif(is_404()){
				 	echo'页面未找到';echo'|';bloginfo('name');
				 }else{
				 	bloginfo('name');echo'|';bloginfo('description');
				 }
			?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive.css"/>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
		<?php if ( is_singular()||is_page()) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		<?php wp_footer();?>
	</head>
	<body <?php body_class(); ?>>
		<!--header板块-->
		<header class="header">
			<div class="wrap">
				<div class="logo">
					<a href="<?php bloginfo('url'); ?>" class="logo-a" title="<?php bloginfo('description'); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</div>
				<button class="btn-caidan" id="btn-caidan">
					<i class="iconfont" id="caidan-icon" style="font-size: 28px;">&#xe600</i>
				</button>
				<button class="btn-search" id="btn-search">
					<i class="iconfont" id="search-icon" style="font-size: 28px;">&#xe602</i>
				</button>
				<button class="btn-guanzhu" id="btn-guanzhu">
					<i class="iconfont" id="guanzhu-icon" style="font-size: 28px;">&#xe619</i>
				</button>
				<nav class="nav-bar" id="nav-bar">
						<?php
						    wp_nav_menu(
						    	array(
						    		'container'       => false,
									'menu_class'      => 'nav',
									'menu_id'         => 'nav',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 2,
								)
							);
						?>
				</nav>
				<div class="search-header" id="search-header">
					<form method="get" class="search-form" action="<?php bloginfo('url'); ?>">
						<input class="search-input" name="s" type="text" placeholder="输入关键字"/>
						<input class="input-button" type="submit" value="搜索"/>
					</form>
				</div>
				<ul class="guanzhu-nav" id="guanzhu-nav">
					<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
					<li><a href="#" id="guanzhu-small-sina">新浪微博</a></li>
					<li><a href="#" id="guanzhu-small-github">github</a></li>
					<li><a href="#" id="guanzhu-small-rss">Rss订阅</a></li>
					<li><a href="#" id="guanzhu-small-email">邮件</a></li>
					<li><a href="#" id="guanzhu-small-zhihu">知乎</a></li>
				</ul>
			</div>
		</header>











