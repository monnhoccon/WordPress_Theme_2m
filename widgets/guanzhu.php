<?php
	class mm_guanzhu_class extends WP_Widget {
		function mm_guanzhu_class(){
			$widget_ops = array('classname'=>'guanzhu_Widget','description'=>'填写关注的链接');
			$control_ops = array('width'=>300,'height'=>300);
			$this->WP_Widget(false, '关注我吧', $widget_ops, $control_ops);
		}
		
		function form($instance){
			$instance = wp_parse_args((array)$instance,array('sina'=>'','github'=>'','rss'=>'','email'=>'','zhihu'=>''));//默认值
			$sina = $instance['sina'];
			$github = $instance['github'];
			$rss = $instance['rss'];
			$email=$instance['email'];
			$zhihu=$instance['zhihu'];
			
			echo '<p style="text-align:left;"><label for="'.$this->get_field_name('sina').'">新浪:<input class="widefat" id="'.
			$this->get_field_id('sina').'" name="'.$this->get_field_name('sina').'" type="text" value="'.$sina.'" /></label></p>';
			echo '<p style="text-align:left;"><label for="'.$this->get_field_name('github').'">GitHub:<input class="widefat" id="'.
			$this->get_field_id('github').'" name="'.$this->get_field_name('github').'" type="text" value="'.$github.'" /></label></p>';
			echo '<p style="text-align:left;"><label for="'.$this->get_field_name('rss').'">RSS:<input class="widefat" id="'.
			$this->get_field_id('rss').'" name="'.$this->get_field_name('rss').'" type="text" value="'.$rss.'" /></label></p>';
			echo '<p style="text-align:left;"><label for="'.$this->get_field_name('email').'">邮箱:<input class="widefat" id="'.
			$this->get_field_id('email').'" name="'.$this->get_field_name('email').'" type="text" value="'.$email.'" /></label></p>';
			echo '<p style="text-align:left;"><label for="'.$this->get_field_name('zhihu').'">知乎:<input class="widefat" id="'.
			$this->get_field_id('zhihu').'" name="'.$this->get_field_name('zhihu').'" type="text" value="'.$zhihu.'" /></label></p>';
		}
		
		function update($new_instance,$old_instance){
			$instance = $old_instance;
			$instance['sina'] = $new_instance['sina'];
			$instance['github'] = $new_instance['github'];
			$instance['rss'] = $new_instance['rss'];
			$instance['email'] = $new_instance['email'];
			$instance['zhihu'] = $new_instance['zhihu'];
			
			return $instance;
		}
		
		function widget($args, $instance){
			extract($args);
			$sina = apply_filters('widget_guanzhu_sina', empty($instance['sina']) ? __('nothing') : $instance['sina']);//小工具前台标题
			$github = apply_filters('widget_guanzhu_github', empty($instance['github']) ? __('nothing') : $instance['github']);//小工具前台标题
			$rss = apply_filters('widget_guanzhu_rss', empty($instance['rss']) ? __('nothing') : $instance['rss']);//小工具前台标题
			$email = apply_filters('widget_guanzhu_email', empty($instance['email']) ? __('nothing') : $instance['email']);//小工具前台标题
			$zhihu = apply_filters('widget_guanzhu_zhihu', empty($instance['zhihu']) ? __('nothing') : $instance['zhihu']);//小工具前台标题
		
			echo $before_widget;
			
			echo '<i class="iconfont iconfont-siadebar">&#xe60b</i>
					<h3 class="widget-title">
						关注我吧
					</h3>
					<div class="widget-main">';
			if( $sina!='nothing' ) echo '<a href="' . $sina . '" target="_blank" id="guanzhu-sina"><i class="iconfont iconfont-guanzhu sina" >&#xe60f</i></a>';
			if( $github!='nothing'  ) echo '<a href="' . $github . '" target="_blank" id="guanzhu-github"><i class="iconfont iconfont-guanzhu github" >&#xe615</i></a>';
			if( $rss!='nothing'  ) echo '<a href="' . get_bloginfo('rss2_url') . '" target="_blank" id="guanzhu-RSS"><i class="iconfont iconfont-guanzhu RSS" >&#xe611</i></a>';
			if( $email!='nothing'  ) echo '<a href="' . $email . '" target="_blank" id="guanzhu-email"><i class="iconfont iconfont-guanzhu email" >&#xe612</i></a>';
			if( $zhihu!='nothing'  ) echo '<a href="' . $zhihu . '" target="_blank" id="guanzhu-zhihu"><i class="iconfont iconfont-guanzhu zhihu" >&#xe614</i></a>';
			
			echo '</div>';
			
			echo $after_widget;
		}
	}
	register_widget('mm_guanzhu_class');
?>