<?php
/*
Plugin Name: Random Posts with Thumbnails
Plugin URI: http://bakingwholegrains.com/wordpress-plugin-random-posts-with-thumbnails/
Description: WordPress Plugin: Random Posts with Thumbnails Widget grabs random posts and it's thumbnail to display on your sidebar. Allows you to set the Number of Posts, Categories to Include, Thumbnail Width & Height, and Widget Title.
Author: The WonderMill Web Team
Version: 1
Author URI: http://www.thewondermill.com/
*/
 
 
class RandomPostsWithThumbnails_Widget extends WP_Widget
{
	function RandomPostsWithThumbnails_Widget()
	{
		$widget_ops = array('classname' => 'RandomPostsWithThumbnails_Widget', 'description' => 'Displays a random post with thumbnail' );
		$this->WP_Widget('RandomPostsWithThumbnails_Widget', 'Random Posts with Thumbnails', $widget_ops);
	}
	
	function form($instance)
	{
		$instance = wp_parse_args( (array) $instance, array('title'=>'Random Posts', 'categories'=>'', 'num_posts'=>'2', 'max_width'=>'180', 'max_height'=>'280', 'border_color'=>'#999999', 'border_highlight_color'=>'#00F', 'background_color'=>'#FFFFFF', 'background_highlight_color'=>'#DEF') );
		$title = $instance['title'];
		$categories = $instance['categories'];
		$num_posts = $instance['num_posts'];
		$max_width = $instance['max_width'];
		$max_height = $instance['max_height'];
		$border_color = $instance['border_color'];
		$border_highlight_color = $instance['border_highlight_color'];
		$background_color = $instance['background_color'];
		$background_highlight_color = $instance['background_highlight_color'];
		?>
        
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><b>Widget Title:</b> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id('categories'); ?>"><b>Category IDs:</b> (separated by commas)<input class="widefat" id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" type="text" value="<?php echo $categories; ?>" /></label>(leave blank to include all categories)</p>
		
		<p><label for="<?php echo $this->get_field_id('num_posts'); ?>"><b>Number of Posts:</b> <select id="<?php echo $this->get_field_id( 'num_posts' ); ?>" name="<?php echo $this->get_field_name( 'num_posts' ); ?>" class="widefat" style="width:50px;">
		<option <?php if ( '1' == $num_posts ) echo 'selected="selected"'; ?>>1</option>
		<option <?php if ( '2' == $num_posts ) echo 'selected="selected"'; ?>>2</option>
		<option <?php if ( '3' == $num_posts ) echo 'selected="selected"'; ?>>3</option>
		<option <?php if ( '4' == $num_posts ) echo 'selected="selected"'; ?>>4</option>
		<option <?php if ( '5' == $num_posts ) echo 'selected="selected"'; ?>>5</option>
		<option <?php if ( '6' == $num_posts ) echo 'selected="selected"'; ?>>6</option>
		<option <?php if ( '7' == $num_posts ) echo 'selected="selected"'; ?>>7</option>
		<option <?php if ( '8' == $num_posts ) echo 'selected="selected"'; ?>>8</option>
		<option <?php if ( '9' == $num_posts ) echo 'selected="selected"'; ?>>9</option>
		<option <?php if ( '10' == $num_posts ) echo 'selected="selected"'; ?>>10</option>
		<option <?php if ( '11' == $num_posts ) echo 'selected="selected"'; ?>>11</option>
		<option <?php if ( '12' == $num_posts ) echo 'selected="selected"'; ?>>12</option>
		<option <?php if ( '13' == $num_posts ) echo 'selected="selected"'; ?>>13</option>
		<option <?php if ( '14' == $num_posts ) echo 'selected="selected"'; ?>>14</option>
		<option <?php if ( '15' == $num_posts ) echo 'selected="selected"'; ?>>15</option>
		<option <?php if ( '16' == $num_posts ) echo 'selected="selected"'; ?>>16</option>
		<option <?php if ( '17' == $num_posts ) echo 'selected="selected"'; ?>>17</option>
		<option <?php if ( '18' == $num_posts ) echo 'selected="selected"'; ?>>18</option>
		<option <?php if ( '19' == $num_posts ) echo 'selected="selected"'; ?>>19</option>
		<option <?php if ( '20' == $num_posts ) echo 'selected="selected"'; ?>>20</option>
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('max_width'); ?>"><b>Max Thumbnail Width:</b> <input class="widefat" id="<?php echo $this->get_field_id('max_width'); ?>" name="<?php echo $this->get_field_name('max_width'); ?>" type="text" value="<?php echo $max_width; ?>" style="width:40px;" /></label>px</p>
		
		<p><label for="<?php echo $this->get_field_id('max_height'); ?>"><b>Max Thumbnail Height:</b> <input class="widefat" id="<?php echo $this->get_field_id('max_height'); ?>" name="<?php echo $this->get_field_name('max_height'); ?>" type="text" value="<?php echo $max_height; ?>" style="width:40px;" /></label>px</p>
        
        <p><b><u>Choose Box Colors</u>:</b></p>
		
		<p><label for="<?php echo $this->get_field_id('border_color'); ?>">Border: <input class="widefat" id="<?php echo $this->get_field_id('border_color'); ?>" name="<?php echo $this->get_field_name('border_color'); ?>" type="text" value="<?php echo $border_color; ?>" style="width:60px;" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id('border_highlight_color'); ?>">Border Mouseover: <input class="widefat" id="<?php echo $this->get_field_id('border_highlight_color'); ?>" name="<?php echo $this->get_field_name('border_highlight_color'); ?>" type="text" value="<?php echo $border_highlight_color; ?>" style="width:60px;" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id('background_color'); ?>">Background: <input class="widefat" id="<?php echo $this->get_field_id('background_color'); ?>" name="<?php echo $this->get_field_name('background_color'); ?>" type="text" value="<?php echo $background_color; ?>" style="width:60px;" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id('background_highlight_color'); ?>">Background Mouseover: <input class="widefat" id="<?php echo $this->get_field_id('background_highlight_color'); ?>" name="<?php echo $this->get_field_name('background_highlight_color'); ?>" type="text" value="<?php echo $background_highlight_color; ?>" style="width:60px;" /></label></p>
		
		<?php
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['categories'] = $new_instance['categories'];
		$instance['num_posts'] = $new_instance['num_posts'];
		$instance['max_width'] = $new_instance['max_width'];
		$instance['max_height'] = $new_instance['max_height'];
		$instance['border_color'] = $new_instance['border_color'];
		$instance['border_highlight_color'] = $new_instance['border_highlight_color'];
		$instance['background_color'] = $new_instance['background_color'];
		$instance['background_highlight_color'] = $new_instance['background_highlight_color'];
		return $instance;
	}
	
	function widget($args, $instance)
	{
		extract($args, EXTR_SKIP);
		
		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		
		if (!empty($title))
		  echo $before_title . $title . $after_title;;
		
		?>
		<style>
            #RandomPostsByWondermill_Widget img{
                border:0px; 
            }
            #RandomPostsByWondermill_Widget a{
                display:block; 
                text-decoration:none; 
                width:<?php echo $instance['max_width']+2; ?>px; 
                border:1px solid <?php echo $instance['border_color']; ?>; 
                background-color:<?php echo $instance['background_color']; ?>;
                padding-bottom:4px; 
                padding-top:1px; 
                text-align:center; 
                font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                font-size:14px; 
                margin-left:4px; 
                color:#000;
                margin-bottom:10px; 
            }
            #RandomPostsByWondermill_Widget a:hover{
                background-color:<?php echo $instance['background_highlight_color']; ?>;
                border:1px solid <?php echo $instance['border_highlight_color']; ?>; 
                color:#000;
                text-decoration:none; 
            }
        </style>
        
        <div id="RandomPostsByWondermill_Widget">
        
            <?php
            $the_query = new WP_Query('showposts='.$instance['num_posts'].'&orderby=post_date&orderby=rand&cat='.$instance['categories']);
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array($instance['max_width'],$instance['max_height']), array('title' => $linkTitle)); ?><br><?php the_title(); ?></a>
                <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        
        </div>
		
		<?php
		echo $after_widget;
	}
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("RandomPostsWithThumbnails_Widget");') );?>