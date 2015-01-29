<?php
/*
Plugin Name: Kalendář žonglování
Plugin URI: http://zonglovani.info
Description: Kalendář žonglérských akcí.
Version: 1.1
Author: Žonglérův slabikář
Author URI: http://zonglovani.info/kontakt.html
License: GPL3
*/
 
class ZonglovaniInfoKalendar extends WP_Widget {
 
    public function __construct() {
     
        parent::__construct(
            'zonglovaniinfokalendar_widget',
            'Kalendář žonglování',
            array(
                'classname'   => 'zonglovaniinfokalendar_widget',
                'description' => 'Kalendář žonglérských akcí.'
                )
        );
       
    }
 
    public function widget( $args, $instance ) {    
         
        extract( $args );
         
        $layout    = $instance['layout'];
        $color    = $instance['color'];
         
        echo $before_widget;

				if($layout == 'vertical' and $color == 'light'){
					$extracss = '';
				}

				if($layout == 'vertical' and $color == 'dark'){
					$extracss = '?css=http://zonglovani.info/css/w-dark.css';
				}

				if($layout == 'horizontal' and $color == 'light'){
					$extracss = '?css=http://zonglovani.info/css/ww-light.css';
				}

				if($layout == 'horizontal' and $color == 'dark'){
					$extracss = '?css=http://zonglovani.info/css/ww-dark.css';
				}
         
				echo '<a href="http://zonglovani.info/kalendar" title="Kalendář žonglérských akcí" id="zs-kalendar">Kalendář žonglování</a><br />';
				echo '<script src="http://zonglovani.info/kalendar/widget.js' . $extracss . '" type="text/javascript" charset="utf-8"></script>';
        echo $after_widget;
         
    }
 
    public function update( $new_instance, $old_instance ) {        
         
        $instance = $old_instance;
         
        $instance['color'] = strip_tags( $new_instance['color'] );
        $instance['layout'] = strip_tags( $new_instance['layout'] );
         
        return $instance;
         
    }
  
    public function form( $instance ) {    
     
				$defaults = array( 'layout' => 'vertical','color' => 'light');
				$instance = wp_parse_args( (array) $instance, $defaults );
        $layout      = esc_attr( $instance['layout'] );
        $color    = esc_attr( $instance['color'] );
        ?>
         
<fieldset>
<legend>Rozvržení</legend>
<ul>
<li><label><input type="radio" value="vertical" name="<?php echo $this->get_field_name('layout'); ?>" <?php if($layout == 'vertical'){echo 'checked="checked"';}?>> Na výšku</label></li>
<li><label><input type="radio" value="horizontal" name="<?php echo $this->get_field_name('layout'); ?>"<?php if($layout == 'horizontal'){echo 'checked="checked"';}?>> Vodorovně</label></li>
</ul>
</fieldset>

<fieldset>
<legend>Styl</legend>
<ul>
<li><label><input type="radio" value="light" name="<?php echo $this->get_field_name('color'); ?>" <?php if($color == 'light'){echo 'checked="checked"';}?>> Světlý</label></li>
<li><label><input type="radio" value="dark" name="<?php echo $this->get_field_name('color'); ?>" <?php if($color == 'dark'){echo 'checked="checked"';}?>> Tmavý</label></li>
</ul>
</fieldset>
     
    <?php 
    }
}
 
add_action( 'widgets_init', function(){
     register_widget( 'ZonglovaniInfoKalendar' );
});
