<?php

function draw_image( $im_width, $im_height, $cell_size, $margin, $num_of_weeks, $num_of_days, $timeline, $save_to_disk ) {

	$im = imagecreatetruecolor ( $im_width, $im_height ) or die( 'Cannot Initialize new GD image stream' );

	$white = imagecolorallocate( $im, 255, 255, 255 );
	$red = imagecolorallocate( $im, 255, 0, 0 );
	imagecolortransparent( $im, $red );

	$colors = array(
		imagecolorallocate( $im, 238, 238, 238 ), // #EEEEEE
		imagecolorallocate( $im, 214, 230, 133 ), // #D6E685
		imagecolorallocate( $im, 140, 198, 101 ), // #8CC665
		imagecolorallocate( $im,  68, 163,  64 ), // #44A340
		imagecolorallocate( $im,  30, 104,  35 ), // #1E6823
	);


	// Paint in white
	imagefill( $im, 0 , 0 , $white );
	
	// Paint each cell contributions
	for( $day = 0; $day < $num_of_days ; $day++ ) {
		for( $week = 0; $week <= $num_of_weeks ; $week++ ) {
			$start_week = $week == 0 ? true : false;
			$last_week = $week == $num_of_weeks  ? true : false;
			if( ( $start_week && $day < 3 ) || ( $last_week && $day > 3 ) ) {
				$color = $red;
				$offset1 = $offset2 = $margin;
				if( $last_week )
					$offset1 = 0;
			} else {
				// $contrib = $timeline[$week][$day];
				$contrib = $timeline[ $week + ( $num_of_weeks * $day ) + $day ];
				if( strlen( $contrib ) == 3 )
					$contrib = 4;
				
				$color = $colors[ $contrib ];

				$offset1 = $offset2 = 0;
			}
			$x1 = $week * ( $cell_size + $margin ) + $margin - $offset1;
			$y1 = $day  * ( $cell_size + $margin ) + $margin - $offset1;
			$x2 = $x1 + $cell_size + $offset2 - 1;
			$y2 = $y1 + $cell_size + $offset2 - 1;
			imagefilledrectangle( $im, $x1, $y1, $x2, $y2, $color );
			//imagestring( $im, 3, $x1 + 3, $y1 + 3, "$week-$day", $colors[4] );
		}
	}
	
	$filename = 'contrib' . substr( md5( 'ozhiscool' . mt_rand( 1, 3000 ) . microtime() ), 0, 5 ) . '.png';
	
	if( !$save_to_disk ) {
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		// header("Content-Length: ". filesize("$filename").";");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/octet-stream; "); 
		header("Content-Transfer-Encoding: binary");
		// header("Content-type: image/png");
		imagepng( $im );
		imagedestroy( $im );
	} else {
		$dirname = dirname( dirname( __FILE__ ) ) . '/temp';
		imagepng( $im, $dirname . '/' . $filename );
		return $filename;
	}
}