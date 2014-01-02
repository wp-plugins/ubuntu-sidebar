/**
 * @author Željko Popivoda http://popivoda.com
 *
 * Version 0.3
 * Copyright (c) 2012 Željko Popivoda
 *
 * License:
 * https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * Edited version of Social Sidebar, Thomas Davis.
 *
 */
(function( $ ){

  $.fn.ubuntuSidebar = function( options ) {  

    return this.each(function() {
      IMAGE_BASE = '/wp-content/plugins/ubuntu-sidebar/images/';
      var settings = {
		'top'        : '100px',
        'ubuntu-com'         : {
			'link': '',
			'image': IMAGE_BASE + 'ubuntu-com.png'
		},
        'ubuntu-loco'         : {
			'link': '',
			'image': IMAGE_BASE + 'ubuntu-loco.png'
		},
        'why-ubuntu'         : {
			'link': '',
			'image': IMAGE_BASE + 'why-ubuntu.png'
		},
		'download-ubuntu'         : {
			'link': '',
			'image': IMAGE_BASE + 'download-ubuntu.png'
		},
		'ubuntu-dvd'         : {
			'link': '',
			'image': IMAGE_BASE + 'ubuntu-dvd.png'
		},
		'public': 1
      };
      	
      if ( options ) { 
        $.extend( true, settings, options );
      }
	 
		$(this).append("<div id='ubuntuSidebar' style='position:fixed; top:" + settings['top'] + "; right:-3px; z-index:10000;'></div>");
		sidebar = $("#ubuntuSidebar");
		if( settings['ubuntu-com']['link'] != "" ){
			sidebar.append("<div class='socialNetwork'><a target='_blank' title='Ubuntu' href='" + settings['ubuntu-com']['link'] + "'><img style='z-index: 10000;' src='" + settings['ubuntu-com']['image'] + "' /></a></div>");
		}
		if( settings['ubuntu-loco']['link'] != ""){
			sidebar.append("<div class='socialNetwork'><a target='_blank' title='Ubuntu LoCo' href='" + settings['ubuntu-loco']['link'] + "'><img style='z-index: 10000;' src='" + settings['ubuntu-loco']['image'] + "' /></a></div>");
		}		
		if( settings['why-ubuntu']['link'] != ""){
			sidebar.append("<div class='socialNetwork'><a target='_blank' title='Why use Ubuntu' href='" + settings['why-ubuntu']['link'] + "'><img style='z-index: 10000;' src='" + settings['why-ubuntu']['image'] + "' /></a></div>");
		}		
		if( settings['download-ubuntu']['link'] != ""){
			sidebar.append("<div class='socialNetwork'><a target='_blank' title='Download Ubuntu' href='" + settings['download-ubuntu']['link'] + "'><img style='z-index: 10000;' src='" + settings['download-ubuntu']['image'] + "' /></a></div>");
		}		
		if( settings['ubuntu-dvd']['link'] != ""){
			sidebar.append("<div class='socialNetwork'><a target='_blank' title='Get Ubuntu CD/DVD' href='" + settings['ubuntu-dvd']['link'] + "'><img style='z-index: 10000;' src='" + settings['ubuntu-dvd']['image'] + "' /></a></div>");
		}
		$(".socialNetwork").hover( function(){
			$(this).css("margin-left","-3px");	
		}, function(){
			$(this).css("margin-left","0px");	
		})
		
    });

  };
})( jQuery );
