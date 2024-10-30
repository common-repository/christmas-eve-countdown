<?php
/*
Plugin Name: Christmas Eve Countdown
Plugin URI: www.memocalculator.com
Description: Adds a countdown to your site. Works on PC and mobile deivces. Have any question contact us.
Version: 1.0.1
Author: Memocalculator.com
Author URI: www.memocalculator.com
*/
class MemoCalculatorChristmasEveWidget extends WP_Widget {
  function MemoCalculatorChristmasEveWidget() {
    $widget_ops = array('classname' => 'MemoCalculatorChristmasEveWidget', 'description' => 'Adds a countdown to your site. Works on PC and mobile deivces.' );
    $this->WP_Widget('MemoCalculatorChristmasEveWidget', 'ChristmasEveCountdown', $widget_ops);
  }
 
  function form($instance) {
    $instance = wp_parse_args((array) $instance, array( 'title' => '' ));
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance) {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
 ?>
<script>
(function($) {
	$(function() {
		$(".oMemocalculatorCountdown").each(function() {
			var width = $(this).width();
			var height = (width * 180) / 391;
			$(this).height(height);
		});
	});
})(jQuery);
</script>
<iframe src="http://www.memocalculator.com/commemorative/christmas-eve-countdown-embedded.php" frameborder="0" scrolling="no" width="100%" height="160"></iframe>
<?php
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("MemoCalculatorChristmasEveWidget");') );?>