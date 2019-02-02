<?php
if ( isset( $_FILES[ 'file' ] ) ) {
	$file = $_FILES[ 'file' ];
	$fileName = $_FILES[ 'file' ][ 'name' ];
	$tmp_name = $_FILES[ 'file' ][ 'tmp_name' ];
	$location = "../img/products/" . $fileName;
	if ( file_exists( $location ) ) {} else {
		mkdir( $location );
	}

	$now = new DateTime();
	$now->setTimezone( new DateTimeZone( 'Asia/Beirut' ) );
	$name = ( $now->format( 'dmYHis' ) ) . ".jpeg";

	if ( move_uploaded_file( $tmp_name, $location . '/' . $name) ) {
		echo $name;
	}
}
?>