<?php
	//导航栏
	register_nav_menus(array('primary'=>'导航菜单'));
	//注册小工具
	function mm_slug_widgets_init() {
		register_sidebar(array(
			//后台显示的名字
			'name'          => __( 'Main Sidebar', 'theme-2m' ),
			//边栏的编号
			'id'            => 'sidebar-1',
			//描述
			'description'   => '',
			//小工具的class
		        'class'         => '',
			//小工具之前的html代码
			'before_widget' => '<div class="widget ">',
			//小工具之后的html代码
			'after_widget'  => '</div>',
			//小工具title之前的html代码
			'before_title'  => '',
			//小工具title之后的html代码
			'after_title'   => '' 
		));
	}
	add_action( 'widgets_init', 'mm_slug_widgets_init' );
	//添加高级小工具
	require_once(TEMPLATEPATH.'/widgets/guanzhu.php');
	require_once(TEMPLATEPATH.'/widgets/hot_article.php');
	require_once(TEMPLATEPATH.'/widgets/new_article.php');
	require_once(TEMPLATEPATH.'/widgets/tags.php');
	require_once(TEMPLATEPATH.'/widgets/friends.php');
	//删除默认小工具
	function unregister_default_wp_widgets() {
	    unregister_widget('WP_Widget_Pages');
	    unregister_widget('WP_Widget_Calendar');
	    unregister_widget('WP_Widget_Archives');
	    unregister_widget('WP_Widget_Links');
	    unregister_widget('WP_Widget_Meta');
	    unregister_widget('WP_Widget_Search');
	    unregister_widget('WP_Widget_Text');
	    unregister_widget('WP_Widget_Categories');
	    unregister_widget('WP_Widget_Recent_Posts');
	    unregister_widget('WP_Widget_Recent_Comments');
	    unregister_widget('WP_Widget_RSS');
	    unregister_widget('WP_Widget_Tag_Cloud');
	}
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);
	
	
	function new_excerpt_length($length) {
    return 110;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	
	function new_excerpt_more($more) {
	return '.....';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	//浏览次数统计
	function record_visitors()
	{
		if (is_singular())
		{
		  global $post;
		  $post_ID = $post->ID;
		  if($post_ID)
		  {
			  $post_views = (int)get_post_meta($post_ID, 'views', true);
			  if(!update_post_meta($post_ID, 'views', ($post_views+1)))
			  {
				add_post_meta($post_ID, 'views', 1, true);
			  }
		  }
		}
	}
	add_action('wp_head', 'record_visitors');
	 
	/// 函数名称：post_views
	/// 函数作用：取得文章的阅读次数
	function post_views()
	{
	  global $post;
	  $post_ID = $post->ID;
	  $views = (int)get_post_meta($post_ID, 'views', true);
	  return $views;
	}
	
	//分页函数 
	function par_pagenavi($range){
		global $paged, $wp_query;
		if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}//max_page赋初值
		if($max_page > 1){
			if(!$paged){$paged = 1;}//$page初值
			if(get_previous_posts_link()){
				echo '<li class="prev-page">';
				previous_posts_link(' 上一页 ');
				echo '</li>';
			}else{
				echo '<li class="prev-page">';
				echo '<span>上一页</span>';
				echo '</li>';
			}
			if($paged != 1){
		    	echo "<li><a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到第一页'> "."1"."</a></li>";
		    }else{
		    	echo '<li';
			    echo " class='active-page'";
				echo "><a href='" . get_pagenum_link(1) ."'";
			    echo ">1</a>";
		    }
		    if($max_page > $range){
				if($paged <= $range){
					for($i = 2; $i <= ($range + 1); $i++){
						if($i!=$max_page){
							echo '<li';
							if($i==$paged)echo " class='active-page'";
							echo "><a href='" . get_pagenum_link($i) ."'";
							echo ">$i</a> </li>";
						}
					}
					echo '<li><span>...</span></li>';
				}
		    	elseif($paged >= ($max_page - ceil(($range/2)))){
		    		echo '<li><span>...</span></li>';
					for($i = $max_page - $range; $i <= $max_page-1; $i++){
						if($i!=1){
							echo '<li';
							if($i==$paged)echo " class='active-page'";
							echo "><a href='" . get_pagenum_link($i) ."'";
							echo ">$i</a></li>";
						}
					}
					echo '<li><span>...</span></li>';
				}
				elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
					echo '<li><span>...</span></li>';
					for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
						if($i!=1){
							echo '<li';
							if($i==$paged)echo " class='active-page'";
							echo "><a href='" . get_pagenum_link($i) ."'";
							echo ">$i</a></li>";
						}
					}
					echo '<li><span>...</span></li>';
				}
			}
		    else{
		    	for($i = 2; $i <= $max_page-1; $i++){
			    		echo '<li';
			    		if($i==$paged)echo " class='active-page'";
						echo "><a href='" . get_pagenum_link($i) ."'";
			    		echo ">$i</a>";
		    		}
		    	}
		    if($paged != $max_page){
		    	echo "<li><a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> ".$max_page."</a></li>";
		    	}else{
		    		echo '<li';
			    	if($i==$paged)echo " class='active-page'";
					echo "><a href='" . get_pagenum_link($paged) ."'";
			    	echo ">$paged</a>";
		    	}
			
			if(get_next_posts_link()){
				echo '<li class="next-page">';
				next_posts_link(' 下一页 ');
				echo '</li>';
			}else{
				echo '<li class="prev-page">';
				echo '<span>下一页</span>';
				echo '</li>';
			}
		}
	}
	
	//归档模块
	function mm_get_the_archive_title() {
		$title='';
	    if ( is_category() ) {
	        $title = sprintf( single_cat_title( '', false ) );
	    } elseif ( is_tag() ) {
	        $title = sprintf( single_tag_title( '', false ) );
	    } elseif ( is_author() ) {
	        $title = sprintf( get_the_author() );
	    } elseif ( is_year() ) {
	        $title = sprintf( get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
	    } elseif ( is_month() ) {
	        $title = sprintf(  get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
		}
		return $title;
	}
	//评论模块
	function mm_comment($comment, $args, $depth) {
		static $comment_number=1;
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
	
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php 
		$author_id = get_the_author_meta('ID');
		if( $author_id == $comment->user_id )
		{
		   echo '<i class="iconfont ">&#xe605</i>';
		} ?>
		<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
			<br />
		<?php endif; ?>
	
		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
			?>
		</div>
		<span class="commentnumber">#<?php echo $comment_number++; ?></span>
	
		<?php comment_text(); ?>
	
		<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php
	}
	//评论添加@
	function ludou_comment_add_at( $comment_text, $comment = '') {
	  if( $comment->comment_parent > 0) {
	    $comment_text = '@<a href="#comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;
	  }
	
	  return $comment_text;
	}
	add_filter( 'comment_text' , 'ludou_comment_add_at', 20, 2);
	
	//缩略图
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-thumbnails', array( 'post' ) ); // 给日志启用日志缩略图
	set_post_thumbnail_size( 220, 155, true );
	
	//七牛镜像
	function mm_get_avatar($avatar) {
    	$avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"7vzpzk.com1.z0.glb.clouddn.com",$avatar);
   	 return $avatar;
	}
	add_filter( 'get_avatar', 'mm_get_avatar', 10, 3 );
	
	
	
	
	
	
?>