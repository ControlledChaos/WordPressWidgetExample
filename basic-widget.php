<?php
	/*
	Plugin Name: Basic Widget
	Plugin URI: http://github.com/
	Description: Basic widget example
	Version: 1.0
	Author: Nicholas Eli
	Author URI: http://github.com/
	License: None
	*/

	class BasicWidget extends WP_Widget{
		// fires before any other functions
		public function __construct(){
			//params(unique id, name)
			parent::__construct('basic_widget', $name = __('Basic Widget'));
		}
		//admin form
		public function form( $instance ){
			//default value
			$title = '';
			//new value
			if(isset($instance['title'])):
				$title = $instance['title'];
			endif;

			echo '<label for="' . $this->get_field_id('title') . '">Name</label>';
			echo '<input id="' . $this->get_field_id('title') . '" type="text" name="' . $this->get_field_name('title') . '" value="' . $title . '">';
		}
		//submits form values and clear data
		public function update($new_instance, $old_instance){
			$instance['title'] = $new_instance['title'];
			return $instance;
		}
		//widget output
		public function widget( $args, $instance ){
			if(isset($instance['title'])):
				echo '<h1>' . $instance['title'] . '</h1>';
			endif;
		}
	}

	//initialize widget
	add_action('widgets_init', function() {
		//parameter is same name as class name
		register_widget('BasicWidget');
	});
?>