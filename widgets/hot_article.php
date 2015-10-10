<?php
	class mm_hot_class extends WP_Widget {
		function mm_hot_class(){
			$widget_ops = array('classname'=>'guanzhu_Widget','description'=>'填写文章显示数目');
			$control_ops = array('width'=>300,'height'=>300);
			$this->WP_Widget(false, '最热文章', $widget_ops, $control_ops);
		}
		
		function form($instance){
			$instance = wp_parse_args((array)$instance,array('countt'=>'5'));//默认值
			$countt = $instance['countt'];
			
			echo '<p style="text-align:left;"><label for="'.$this->get_field_name('countt').'">显示数目（最大为10）:<input style="width:50px;" id="'.
			$this->get_field_id('countt').'" name="'.$this->get_field_name('countt').'" type="text" value="'.$countt.'" /></label></p>';
		}
		
		function update($new_instance,$old_instance){
			$instance = $old_instance;
			$instance['countt'] = $new_instance['countt'];
			
			return $instance;
		}
		
		function widget($args, $instance){
			extract($args);
			$countt = apply_filters('widget_guanzhu_sina', empty($instance['countt']) ? __('nothing') : $instance['countt']);//小工具前台标题
		
			echo $before_widget;
			
			echo '<i class="iconfont iconfont-siadebar">&#xe609</i>
					<h3 class="widget-title">
						热门文章
					</h3>
					<div class="widget-main widget-main-hot">
						<ul>';
			if( intval($countt)<=10) {
				$popular = new WP_Query('orderby=comment_count&posts_per_page='.$countt); 
				$count_di=1;
				while ($popular->have_posts()) {
					$popular->the_post();
					echo '<li><span>'. $count_di .'</span>'.'<a href="';
					the_permalink();
					echo '">';
					the_title();
					echo '</a></li>';
					$count_di++;
				} 
			}
			echo '</ul>';
			
			echo '</div>';
			
			echo $after_widget;
		}
	}
	register_widget('mm_hot_class');
?>