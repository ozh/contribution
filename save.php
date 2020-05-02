<?php

$cell_size = 20;

include_once( dirname( __FILE__ ) . '/includes/config.php' );
include_once( dirname( __FILE__ ) . '/includes/image.php' );

$contribs = explode( ',', $_REQUEST['params'] );

draw_image( $im_width, $im_height, $cell_size, $margin, $num_of_weeks, $num_of_days, $contribs, false );


/*

http://www.zazzle.com/your_contribution_timeline-235931808857633752

http://www.zazzle.com/api/create/at-238080209952171382?
	rf=238080209952171382
	&ax=Linkover
	&pd=235931808857633752
	&fwd=ProductPage
	&ed=true
	&tc=
	&ic=
	&t_contribimg_iid=http%3A%2F%2Fplanetozh.com%2Fimages%2Ferror.jpg


EU:
API Key 	Secret
36c47cda-bf27-43c5-b655-1dd7f9bb7bd9 	4899e3b1-955e-46b4-90e9-ca5ee149355f

NA:
API Key 	Secret
2a14b8bd-169c-4bae-90ba-0c8cabcb63e3 	4c570a09-6a76-40f0-8859-8ad4599eff20

Shipping times:
EU:
http://www.spreadshirt.net/-C62/categoryId/313/articleId/19
NA:
http://www.spreadshirt.com/-C62/categoryId/313/articleId/19

*/