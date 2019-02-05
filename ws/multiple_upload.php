<?php
if ( isset( $_FILES[ 'images' ] ) && !empty( $_FILES[ 'images' ] ) ) {
	$no_files = count( $_FILES[ "images" ][ 'name' ] );

	for ( $i = 0; $i < $no_files; $i++ ) {
		if ( $_FILES[ "images" ][ "error" ][ $i ] > 0 ) {
			echo "Error: " . $_FILES[ "images" ][ "error" ][ $i ] . "<br>";
		} else {
			if ( file_exists( 'img/' . $_FILES[ "images" ][ "name" ][ $i ] ) ) {
				echo 'File already exists : img/' . $_FILES[ "images" ][ "name" ][ $i ];
			} else {
				$fileName = $_FILES[ 'images' ][ 'name' ][$i];
				$location = "../img/products/" . $fileName;
				$now = new DateTime();
				$now->setTimezone( new DateTimeZone( 'Asia/Beirut' ) );
				$name = ( $now->format( 'dmYHis' ) ). $i . ".jpeg";
				move_uploaded_file( $_FILES[ "images" ][ "tmp_name" ][ $i ], $location . '/' . $name );
				echo ($name.",");

			}
		}
	}
}
?>