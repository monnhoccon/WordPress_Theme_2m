<?php
	class mm_friends_class extends WP_Widget {
		function mm_friends_class(){
			$widget_ops = array('classname'=>'guanzhu_Widget','description'=>'选择友情链接的菜单');
			$control_ops = array('width'=>300,'height'=>300);
			$this->WP_Widget(false, '友情链接', $widget_ops, $control_ops);
		}
		
		function form($instance){
			$instance = wp_parse_args((array)$instance,array('countt'=>'10','menu_name'=>''));//默认值
			$countt = $instance['countt'];
			$menu_name=$instance['menu_name'];
			
			echo '<p style="text-align:left;"><label for="'.$this->get_field_name('countt').'">显示数目（最大为40）:<input style="width:50px;" id="'.
			$this->get_field_id('countt').'" name="'.$this->get_field_name('countt').'" type="text" value="'.$countt.'" /></label></p>';
			
			echo '<p><label for="'.$this->get_field_id('menu_name').'">'.'选择链接菜单: </label>';
			echo '<select  class="widefat" id="'.$this->get_field_id('menu_name'). '" name="'.$this->get_field_name('menu_name').'">';
		    echo '<option value="">- '.'请选择-</option>';
		    $menus=get_terms('nav_menu');
			foreach($menus as $menu){
				echo '<option value="' . $menu->name . '"' ;
				if ( $instance['menu_name'] == $menu->name) echo 'selected="SELECTED"'; else echo ''; 
				echo '>'. $menu->name . '</option>';
			} 
		    echo '</select></p>';
		 } 
		
		function update($new_instance,$old_instance){
			$instance = $old_instance;
			$instance['countt'] = $new_instance['countt'];
			$instance['menu_name'] = $new_instance['menu_name'];
			
			return $instance;
		}
		
		function widget($args, $instance){
			extract($args);
			$countt = empty($instance['countt'])? 10 : $instance['countt'];
			$menu_name= $instance['menu_name'];
		
			echo $before_widget;
			
			echo '<i class="iconfont iconfont-siadebar">&#xe60a</i>
					<h3 class="widget-title">
						友情链接
					</h3>
					';
			if( intval($countt)<=50) {
				$nav_menu = wp_get_nav_menu_object($menu_name);
				wp_nav_menu( array( 
				'fallback_cb' => '', 
				'menu' => $nav_menu ,
				'container' => 'div',
				'container_class'=>'widget-main widget-main-friends'
				));
			}
			echo '</ul>';
			
			echo '</div>';
			
			echo $after_widget;
		}
	}
	register_widget('mm_friends_class');
?>