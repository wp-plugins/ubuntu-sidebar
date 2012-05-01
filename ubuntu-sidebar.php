<?php
/**
 * @package ubuntu-sidebar
 * @version 0.3
 */
/*
Plugin Name: Ubuntu Sidebar
Plugin URI: http://wordpress.org/extend/plugins/ubuntu-sidebar
Description: Add Ubuntu media buttons to the right side of your website with style and ease.
Author: Zeljko Popivoda
Version: 0.3
Author URI: http://zeljko.popivoda.com
*/
/*  Copyright 2012  Zeljko Popivoda  (email : zh.popivoda@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/* This is edited version of Social sidebar, Thomas Davis
*/

add_action('admin_menu', 'ubuntusidebar');
if(!is_admin()){
	add_action('wp_print_scripts', 'include_ubuntusidebar');
	add_action('wp_footer', 'embed_ubuntusidebar');
} else {
add_action('wp_print_scripts', 'load_custom_scripts');
}
function load_custom_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jflow' );
	wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-ui-tabs' );
}
function include_ubuntusidebar(){
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('ubuntu-sidebar', '/wp-content/plugins/ubuntu-sidebar/js/ubuntu-sidebar.js');
}
function embed_ubuntusidebar(){
	if( get_option("social_offset")){
		$socialoffset = get_option("social_offset");
	} else {
		$socialoffset = 100;
	}
echo "

<script type=\"text/javascript\">
   (function ($) {
        $('body').ubuntuSidebar({
            'top': '$socialoffset"."px',
            'ubuntu-com': {";
				if( get_option("ubuntu-com_image") ){
					echo "'image': '". get_option("ubuntu-com_image"). "',";
				}
               echo "'link': '". get_option("ubuntu-com_link"). "'
            },
            'ubuntu-loco': {";
				if( get_option("ubuntu-loco_image") ){
					echo "'image': '". get_option("ubuntu-loco_image"). "',";
				}
               echo "'link': '". get_option("ubuntu-loco_link"). "'
            },
            'why-ubuntu': {";
				if(  get_option("why-ubuntu_image") ){
					echo "'image': '". get_option("why-ubuntu_image"). "',";
				}
               echo "'link': '". get_option("why-ubuntu_link"). "'
            },
			'download-ubuntu': {";
				if(  get_option("download-ubuntu_image") ){
					echo "'image': '". get_option("download-ubuntu_image"). "',";
				}
               echo "'link': '". get_option("download-ubuntu_link"). "'
            },
			'ubuntu-dvd': {";
				if(  get_option("ubuntu-dvd_image") ){
					echo "'image': '". get_option("ubuntu-dvd_image"). "',";
				}
               echo "'link': '". get_option("ubuntu-dvd_link"). "'
            }
        });
   })(jQuery);
</script>";
}
function ubuntusidebar() {
  add_options_page('Ubuntu Sidebar', 'Ubuntu Sidebar', 'manage_options', 'ubuntusidebar', 'ubuntusidebar_options');
}
function ubuntusidebar_options() {
  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }
  echo '<div class="wrap">';
    echo '<h2>Ubuntu Sidebar</h2>';
?>
<script type="text/javascript">
jQuery(document).ready(function($){
	$("#tabs").tabs();
	$(".optionsform").click( function(){
		$("#optionsform").submit();
		event.preventDefault();
	})
});
</script>
  <?php
  
  echo '<form id="optionsform" method="post" action="options.php">';
  ?>
  <div class="wrap">
  <div id="tabs" style="width: 750px;">
    <ul>
        <li><a href="#info">Info</a></li>
        <li><a href="#tabs-1">Ubuntu Media Buttons</a></li>
        <li><a href="#tabs-2">Options</a></li>
        <li style="margin-left: 1px; float: right;"><a href="" class="optionsform"  style="cursor: pointer;">Save</a></li>
    </ul>
	<div id="info">
	  If you would like a button to appear at the very least you need enter your Ubuntu network links from the menu above.
	<br />
	<br />
	<br />
	<b>Ubuntu sidebar Documentation</b>
	<ul>
	<li><a href="http://zeljko.popivoda.com/2012/03/ubuntu-sidebar-wordpress-plugin" target="_blank">Ubuntu sidebar - Zeljko Popivoda blog</a></li>
	<li><a href="http://spreadubuntu.org/sr/node/792" target="_blank">Ubuntu sidebar - Spread Ubuntu</a></li>
	<li><a href="http://wordpress.org/extend/plugins/ubuntu-sidebar" target="_blank">Ubuntu sidebar - Wordpress plugins</a></li>
	</ul>
	<br />
	<br />
	<b>Documentation of Social sidebar</b>
	<ul>
	<li><a href="http://wordpress.org/extend/plugins/social-sidebar" target="_blank">Social sidebar - Wordpress plugin homepage</a></li>
	<li><a href="http://github.com/thomasdavis/Wordpress-Social-Sidebar" target="_blank">Social sidebar - GitHub Repository</a></li>
	</ul>
</div>
    <div id="tabs-1">
	<?php
	  echo '<table class="form-table">';
echo '<tr valign="top">
<th scope="row" style="width: 300px !important;">Ubuntu <strong>Link</strong>:</th>
<td><input style="width: 400px;" type="text" name="ubuntu-com_link" value="' . get_option('ubuntu-com_link') .'" /></td>
</tr>';  
echo '<tr valign="top">
<th scope="row">Ubuntu Image (optional):</th>
<td><input style="width: 400px;" type="text" name="ubuntu-com_image" value="' . get_option('ubuntu-com_image') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Ubuntu LoCo <strong>Link</strong>:</th>
<td><input style="width: 400px;" type="text" name="ubuntu-loco_link" value="' . get_option('ubuntu-loco_link') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Ubuntu LoCo Image (optional):</th>
<td><input style="width: 400px;" type="text" name="ubuntu-loco_image" value="' . get_option('ubuntu-loco_image') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Why use Ubuntu <strong>Link</strong>:</th>
<td><input style="width: 400px;" type="text" name="why-ubuntu_link" value="' . get_option('why-ubuntu_link') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Why use Ubuntu Image (optional):</th>
<td><input style="width: 400px;" type="text" name="why-ubuntu_image" value="' . get_option('why-ubuntu_image') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Download Ubuntu <strong>Link</strong>:</th>
<td><input style="width: 400px;" type="text" name="download-ubuntu_link" value="' . get_option('download-ubuntu_link') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Download Ubuntu Image (optional):</th>
<td><input style="width: 400px;" type="text" name="download-ubuntu_image" value="' . get_option('download-ubuntu_image') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Get Ubuntu CD/DVD <strong>Link</strong>:</th>
<td><input style="width: 400px;" type="text" name="ubuntu-dvd_link" value="' . get_option('ubuntu-dvd_link') .'" /></td>
</tr>'; 
echo '<tr valign="top">
<th scope="row">Get Ubuntu CD/DVD Image (optional):</th>
<td><input style="width: 400px;" type="text" name="ubuntu-dvd_image" value="' . get_option('ubuntu-dvd_image') .'" /></td>
</tr>';    
echo '</table>';
?>
</div>
	<div id="tabs-2">
<?php
  echo '<table class="form-table">';
echo '<tr valign="top">
<th scope="row" style="width: 300px !important;">Pixels from the top (default: 100px):</th>
<td><input style="width: 200px;" type="text" name="social_offset" value="' . get_option('social_offset') .'" /> px</td>
</tr>';   
echo '</table>';
?>
</div>
</div>
  <?php wp_nonce_field('update-options'); ?>
  <?php
  
echo '<input type="hidden" name="action" value="update" />';
echo '<input type="hidden" name="page_options" value="ubuntu-com_link,ubuntu-com_image,ubuntu-loco_link,ubuntu-loco_image,why-ubuntu_link,why-ubuntu_image,download-ubuntu_link,download-ubuntu_image,ubuntu-dvd_link,ubuntu-dvd_image,social_offset,publica" />';
  echo '</div>';
echo '
</form>
</div>';
}
?>
