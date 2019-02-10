<?php
if ( isset( $_FILES[ 'icon' ] ) ) {
	$file = $_FILES[ 'icon' ];
	$fileName = $_FILES[ 'icon' ][ 'name' ];
	$tmp_name = $_FILES[ 'icon' ][ 'tmp_name' ];
	$location = "../img/programs/" . $fileName;
	if ( file_exists( $location ) ) {} else {
		mkdir( $location );
	}

	$now = new DateTime();
	$now->setTimezone( new DateTimeZone( 'Asia/Beirut' ) );
	$name = ( $now->format( 'dmYHis' ) ) . ".svg";

	if ( move_uploaded_file( $tmp_name, $location . '/' . $name) ) {
		echo $name;
	}
}
?>