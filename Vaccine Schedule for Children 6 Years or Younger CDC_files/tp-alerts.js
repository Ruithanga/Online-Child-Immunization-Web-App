/**
 * @version 4.23.2
 * Date: 2023-06-27T23:34:30.094Z
 */
/**
 * TP Alerts
 * Logic for rendering WCMS alerts
 */
( function( $ ) {

	$( '*[id^="alert_unique_"]' ).each( function() {

		var today = new Date();
		var alertStart = new Date( $( this ).attr( 'data-alert-start' ) );
		var alertEnd = new Date( $( this ).attr( 'data-alert-end' ) );

		if ( ( today.getTime() >= alertStart.getTime() && alertEnd.getTime() >= today.getTime() ) ||
			( today.getTime() >= alertStart.getTime() && isNaN( alertEnd.getTime() ) ) ||
			( isNaN( alertStart.getTime() ) && alertEnd.getTime() >= today.getTime() ) ||
			( isNaN( alertStart.getTime() ) && isNaN( alertEnd.getTime() ) ) ) {
			$( this ).removeClass( 'd-none' );
		}
	} );

} )( jQuery );
