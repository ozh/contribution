<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Custom Github-like contribution graph    </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Custom Github-like contribution graph on a tshirt">
<meta name="author" content="">
<meta property="og:image" content="http://ozh.org/contribution/assets/img/facebook.png"/>
<meta property="og:url" content="http://ozh.org/contribution/"/>
<meta property="og:title" content="Custom Github-like contribution graph on a tshirt"/>
<meta property="og:description" content="Generate a custom Github-like contribution graph and export it on a t-shirt. Come by and try!"/>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/script.js"></script>
<!--[if lt IE 9]>
  <script src="assets/js/html5shiv.js"></script>
<![endif]-->
<link rel="shortcut icon" href="assets/ico/favicon.png">
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-55088-14']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</head>

<body>

<div id="wrap">

<div id="zomg">
<div class="jumbotron masthead" id="masthead">
	<div>
		<a id="banner" href="http://ozh.org/contribution/"><h1>contribution</h1></a>
		<h2>Github-like contribution graph <span>on a t-shirt (or just for fun)</span></h2>
	</div>
</div>
</div>

<div class="container" id="main">

<?php
$text = isset( $_REQUEST['text'] ) ? ( $_REQUEST['text'] ) : '' ;
$text = str_replace( '♥', '#', $text );
?>

<form class="form-inline" action="" method="POST" name="la_form" id="la_form">
<fieldset>
<legend>Make a custom Github-like contribution graph with your own text</legend>

	<div class="row-fluid">
	<div class="span6">
		<label>Short text:</label>
		<input type="text" id="text" name="text" placeholder="Type something..." value="<?php echo $text; ?>" >
		<button type="submit" class="btn btn-primary" id="make-btn">Make</button> <a href="?"class="btn btn-warning" id="reset-btn">Reset</a> 
	</div>
	<div class="span6">
		<p><span class="label label-info">Tip</span> Don't know where to start? Try one of these:</p>
		<p class="suggestions">
		<a href="#" class="btn btn-mini btn-info">GIT NINJA</a>
		<a href="#" class="btn btn-mini btn-success">I PUSH</a>
		<a href="#" class="btn btn-mini btn-danger" data-content="I # GIT">I &hearts; GIT</a>
		<a href="#" class="btn btn-mini btn-primary">SHIP IT</a>
		<a href="#" class="btn btn-mini btn-warning">I COMMIT</a>
		<a href="#" class="btn btn-mini btn-inverse">@USERNAME</a>
		</p>
		<p class="muted">Works best with few uppercase letters, try and fine-tune!</p>
	</div>
	</div>

</fieldset>
</form>

	
	
<script>
<?php
include( dirname( __FILE__ ) . '/includes/contributions.php' ); ?>

$(document).ready(function() {
	paint();
});
</script>

<?php if( $text ) { ?>
<div id="result">

<div class="row-fluid">
<legend>Your contribution graph</legend>
<div id="graph">
</div>
<p>
	<span class="label label-info">Tip</span> You can customize your graph: click on a cell to paint it.
	<?php
	/**
	Pick a color: 
	<span class="paint">
		<span class="paint-0" data-color="0">&nbsp;</span> 
		<span class="paint-1" data-color="1">&nbsp;</span> 
		<span class="paint-2" data-color="2">&nbsp;</span> 
		<span class="paint-3" data-color="3">&nbsp;</span> 
		<span class="paint-4" data-color="4">&nbsp;</span>
	</span>
	/**/
	?>
</p>
</div>

<div class="row-fluid">
	<div class="span6">
		<form class="form-inline la_form_save" action="save.php" method="POST" name="la_form_image" id="la_form_image">
		<legend>Save this graph</legend>
		<input type="hidden" name="params" class="params" />
		<fieldset>
		<p>Save this graph as a PNG &ndash; great to re-use on a custom work or a tshirt!</p>
		<button type="submit" class="btn btn-primary" id="save-btn"><i class="icon-picture icon-white"></i> Save as .PNG</button>
		</fieldset>
		</form>
	</div>
    <!--
	<div class="span6">
		<form class="form-inline la_form_save" action="export.php" method="POST" name="la_form_export" id="la_form_export">
		<legend>Wear this graph</legend>
		<input type="hidden" name="params" class="params" />
		<fieldset>
		<p><strong>The fun starts here!</strong> Print this graph on a quality t-shirt &ndash; service by Zazzle</p>
		<button type="submit" class="btn btn-success" id="shirt-btn"><i class="icon-star icon-white"></i> Put on a t-shirt</button>
		</fieldset>
		</form>
	</div>
    -->
</div>

</div result>

<?php } // if( $text ) ?>
 
<div id="push"></div>
</div container>

</div wrap>

<div id="footer" class="jumbotron minitron">
  <div class="container">
	<p>By <a href="http://ozh.org/">Ozh</a> &#9726; <a id="at_tw" href="https://twitter.com/ozh">@ozh</a> &#9726; <a id="at_gh" href="https://github.com/ozh">@ozh</a> &mdash; Inspired by Github's <a href="http://shop.github.com/products/contribution-graph-shirt">Contribution Graph Shirt</a> &mdash; not affiliated with / endorsed by Github</p>
  </div>
</div>

</body>
</html>