<?php

if ( function_exists('register_sidebars') ){
    register_sidebar(array(
		'name'=>'sidebar-left',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
		'name'=>'sidebar-right',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}
/*

	register_sidebars(2, array(
		'before_widget' => '<li>',
		'after_widget' => '</li><li class="sidebar-spacer"></li>',
	));
*/
 ?>
