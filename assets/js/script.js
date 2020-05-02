var color = 4;

$(document).ready(function() {
	$('#make-btn').click(function(){
		loading();
	});
	$('p.suggestions a').click(function(){
		loading();
		_gaq.push(['_trackEvent', 'Suggestion', 'Suggestion change']);
		var suggest = ( $(this).attr('data-content') ? $(this).attr('data-content') : $(this).text() );
		$('#text').val( suggest );
		$('#la_form').submit();
		return false;
	});
	
	set_active_paint( color );
});

function loading() {
	$('#result').html( '<p class="muted">Generating wickedly cool graph, please wait...</p>' );
}

function set_active_paint( i ) {
	$('span.paint span').removeClass('active');
	$('span.paint .paint-'+i).addClass('active');
}

function paint() {
	$(matrix).each(function(i,e){
		$(matrix[i]).each(function(j,f){
			var contrib = matrix[i][j];
			var value = 0;
			var la_class = '';
			if( contrib == '-' ) {
				la_class = 'contrib_no';
				value = 0;
			} else if( contrib == '0-4' ) {
				la_class = 'contrib_yes random random0 contrib4';
				matrix[i][j] = value = 4;
			} else if( contrib == '1-4' ) {
				la_class = 'contrib_yes random random1 contrib4';
				matrix[i][j] = value = 4;
			} else {
				la_class = 'contrib_yes contrib'+contrib;
				value = contrib;
			}
			var la_id = 'd'+i+'w'+j;
			la_class += ' day_' + i + ' week_' + j;
			$('#graph').append('<span id="'+la_id+'" data-contrib="'+value+'" data-day="'+i+'" data-week="'+j+'" class="day '+la_class+'"></span>');
		});
	});

	$('.contrib_yes').click(function(){
		$(this).toggleClass('contrib'+color);
		var value = $(this).hasClass('contrib'+color) ? color : get_random( this );
		matrix[ $(this).attr('data-day') ][ $(this).attr('data-week') ] = value;
		console.log( value );
	});
	
	$('.la_form_save button').click(function(){
		$(this).parent().parent().find('.params').val( matrix );
	});
	
	$('span.paint span').click(function(i,e){
		color = $(this).attr('data-color');
		set_active_paint( color );
	});
}

function get_random( cell ) {
	var value = 0;
	if( $(cell).hasClass('random') ) {
		value = $(cell).hasClass('random0') ? 0 : 1;	
	}
	return value;
}

