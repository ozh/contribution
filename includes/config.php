<?php

// Cell (dot) dimension and margin on the timeline, in pixel
$cell_size = isset( $cell_size ) ? $cell_size : 10 ;
$margin = floor( $cell_size / 5 );

$num_of_weeks = isset( $num_of_weeks ) ? $num_of_weeks : 52;
$num_of_days  = 7;

// Generated image size in pixel
$im_width = ( $num_of_weeks + 1 ) * ( $cell_size + $margin ) + $margin;
$im_height = $num_of_days * ( $cell_size + $margin ) + $margin;
