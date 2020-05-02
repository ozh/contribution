<?php
$blah = isset( $_REQUEST['blah'] ) ? $_REQUEST['blah'] : array();
$test = isset( $_REQUEST['test'] ) ? $_REQUEST['test'] : '' ;
?>
<style>
body{background:#ddd;}
input{margin:0}
input[type=text]{width:500px}
</style>
<pre>
<form method="GET">
<?php
$total = array( 0, 0, 0, 0, 0 );

for( $day = 0; $day < 7; $day++ ) {
	for( $week = 0; $week < 5; $week++ ) {
		$checked = isset( $blah[$day][$week] ) ? "checked='checked'" : '' ;
		echo "<input type='checkbox' name='blah[$day][$week]' value='1' $checked />";
		$total[ $week ] += ( $checked ? 1 : 0 );
	}
	echo "<br/>";
}
$last_week = $total[4] ? 5 : ( $total[3] ? 4 : ( $total[2] ? 3 : ( $total[1] ? 2 : 1 ) ) );

?>

<a href="?">reset</a> &mdash; <input type="submit" value="Go">

test: <input name="test" value="<?php echo $test; ?>" />
</form>
<input type=text width=60 value="
<?php

if( $blah ) {
	echo ' => array ( ';
	for( $day = 0; $day < 7; $day++ ) {
		echo "'";
		for( $week = 0; $week < $last_week ; $week++ ) {
			$checked = isset( $blah[$day][$week] ) ? '1' : '0' ;
			echo $checked;
		}
		echo "', ";
	}
	echo '), ';
};

?>
">


<img src="ascii_test.php?text=<?php echo urlencode( $test ); ?>" width="800px">