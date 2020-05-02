<?php
include_once( dirname( __FILE__ ) . '/config.php' );
include_once( dirname( __FILE__ ) . '/letters.php' );
// include_once( dirname( __FILE__ ) . '/image.php' );

// http://cdn.shopify.com/s/files/1/0051/4802/products/contribution-4_1024x1024.jpg?100

$words = isset( $_REQUEST['text'] ) ? ( $_REQUEST['text'] ) : '';

/************************************************/

$length = strlen( $words ); // word length, in letters
$width = 0;                 // word length, in "pixels" (dots / cells)

// Matrix for all words
$ascii = array( '', '', '', '', '', '', '' );

// word length measured in cells
for( $i = 0 ; $i < $length ; $i++ ) {
	if( isset( $letters[ $words[ $i ] ] ) ) {
		$width += strlen( $letters[ $words[ $i ] ][0] );
		if( $i < ( $length - 1 ) )
			$width++;
	}
	
	for( $z=0 ; $z < 7 ; $z++ ) {
		if( isset( $letters[ $words[ $i ] ] ) ) {
			$ascii[ $z ] .= $letters[ $words[ $i ] ][ $z ];
			if( $i < ( $length - 1 ) )
				$ascii[ $z ] .= '0';		
		}
	}
}

// Number of weeks before or after the word dots start
$safe = $words ? floor( ( $num_of_weeks - 1 - $width ) / 2 ) : $num_of_weeks ;

// var_dump( $ascii, $safe );die('ok');

// The array of [week][day] = 0..4
$timeline = array();

// Random contributions
for( $week = 0; $week <= $num_of_weeks ; $week++ ) {
	$start_week = $week == 0 ? true : false;
	$last_week = $week == $num_of_weeks  ? true : false;
	for( $day = 0; $day < $num_of_days ; $day++ ) {
		if( ( $start_week && $day < 3 ) || ( $last_week && $day > 3 ) ) {
			$timeline[$week][$day] = '-';
		} else {
			$max_color = ( $week < $safe || $week > $num_of_weeks - $safe ) ? 3 : 1 ;
			$rand = mt_rand( 0, $max_color );
			$timeline[$week][$day] = $rand;
		}
	}
}

// Letters
if( $length ) {
	for( $week = 0 ; $week < $width ; $week++ ) {
		for( $day = 0 ; $day < $num_of_days  ; $day++ ) {
			$line = $ascii[ $day ];
			if( $line[ $week ] == 1 ) {
				// offset to print centered
				$_week = $week + floor( $num_of_weeks / 2 ) - floor( $width / 2 );
				$timeline[$_week][$day] .= '-4';
			}
		}
	}
}

// var_dump( $timeline );

echo 'var words = "' . str_replace( '"', '\\"', $words ) . "\";\n";
echo 'var matrix = [';
for( $day = 0; $day < $num_of_days ; $day++ ) {
	echo '[';
	for( $week = 0; $week <= $num_of_weeks ; $week++ ) {
		echo '"' . $timeline[$week][$day] . '",';
	}
	echo "],\n";
}
echo "];\n";

