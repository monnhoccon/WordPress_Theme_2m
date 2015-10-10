<?php

class mm_TagCloudWidget extends WP_Widget_Tag_Cloud {

//和之前的评论小工具的方法一样，这里继承的是默认标签小工具的类名。

	function mm_TagCloudWidget() {
		$widget_ops = array('classname' => 'widget_mm_tagcloud_comments', 'description' => __('标签云','mmzi') );
		$this->WP_Widget('mm-tagcloud-comments', __('标签云','mmzi'), $widget_ops);
	}

        //上面的内容是小工具的一些命名

	function widget( $args, $instance ) {
		extract($args);
		$nums = empty($instance['nums'])? 45 : $instance['nums'];
		$ordertag = empty($instance['ordertag'])? 'ASC' : $instance['ordertag'];
		$orderbytag = empty($instance['orderbytag'])? 'name' : $instance['orderbytag'];
		$current_taxonomy = $this->_get_current_taxonomy($instance);

		echo $before_widget;
		
		echo '<i class="iconfont iconfont-siadebar">&#xe60c</i>
					<h3 class="widget-title">
						标签云
					</h3>
					<div class="widget-main widget-main-tags">';
		wp_tag_cloud( apply_filters('widget_tag_cloud_args', array(
		'smallest' => '12',
        'largest' => '12',
        'unit' => 'px',
		'number' => $nums,
		'orderby' => $orderbytag,
		'order' => $ordertag,
		'taxonomy' => $current_taxonomy
		)));
		echo "</div>\n";
		echo $after_widget;
	}

		function update( $new_instance, $old_instance ) {
		$instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
		$instance['nums'] = stripslashes($new_instance['nums']);

		$instance['ordertag'] = stripslashes($new_instance['ordertag']);
		$instance['orderbytag'] = stripslashes($new_instance['orderbytag']);
		return $instance;
	}

//上面这些部分就是用来显示的了。代码量多但是结构都是一样的，里面重要的部分就是使用了wp_tag_cloud()这个函数。根据这个函数的参数来添加对应的选项。这个函数磊子会在函数讲解页面那边写出来。

	function form( $instance ){
		$current_taxonomy = $this->_get_current_taxonomy($instance);
?>

	<p><label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('分类法:') ?></label>
	<select class="widefat" id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>">
	<?php foreach ( get_object_taxonomies('post') as $taxonomy ) :
				$tax = get_taxonomy($taxonomy);
				if ( !$tax->show_tagcloud || empty($tax->labels->name) )
					continue;
	?>
		<option value="<?php echo esc_attr($taxonomy) ?>" <?php selected($taxonomy, $current_taxonomy) ?>><?php echo $tax->labels->name; ?></option>
	<?php endforeach; ?>
	</select></p>

	 <p><label for="<?php echo $this->get_field_id('nums'); ?>"><?php _e('显示的数量(默认是45个):') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id('nums'); ?>" name="<?php echo $this->get_field_name('nums'); ?>" value="<?php if (isset ( $instance['nums'])) {echo esc_attr( $instance['nums'] );} ?>" /></p>

     <p><label for="<?php echo $this->get_field_id('orderbytag'); ?>"><?php _e('排序依据(默认是名称):') ?></label>
	<select  class="widefat" id="<?php echo $this->get_field_id('orderbytag'); ?>" name="<?php echo $this->get_field_name('orderbytag'); ?>">
    <option value="">- <?php echo __('请选择','');?> -</option>
    <option <?php if ( $instance['orderbytag'] == 'name') echo 'selected="SELECTED"'; else echo ''; ?>  value="name"><?php  echo __('标签名称');?></option>
    <option <?php if ( $instance['orderbytag'] == 'count') echo 'selected="SELECTED"'; else echo ''; ?> value="count"><?php echo __('使用次数');?></option>
    </select>
    	</p>

     <p><label for="<?php echo $this->get_field_id('ordertag'); ?>"><?php _e('排序(默认是升序):') ?></label>
	<select  class="widefat" id="<?php echo $this->get_field_id('ordertag'); ?>" name="<?php echo $this->get_field_name('ordertag'); ?>">
    <option value="">- <?php echo __('请选择','');?> -</option>
    <option <?php if ( $instance['ordertag'] == 'ASC') echo 'selected="SELECTED"'; else echo ''; ?>  value="ASC"><?php  echo __('升序');?></option>
    <option <?php if ( $instance['ordertag'] == 'DESC') echo 'selected="SELECTED"'; else echo ''; ?> value="DESC"><?php echo __('降序');?></option>
    <option <?php if ( $instance['ordertag'] == 'RAND') echo 'selected="SELECTED"'; else echo ''; ?> value="RAND"><?php echo __('随机');?></option>
    </select>
    </p>

     

	<?php

       //上面这些内容就是后台小工具那边标签的一些配置选项，下面会有示例图。每个功能的意思里面已经有写明

	}
}
register_widget('mm_TagCloudWidget');
?>