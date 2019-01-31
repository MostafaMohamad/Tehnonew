<?php
if ( isset( $_FILES[ 'file' ] ) && !empty( $_FILES[ 'file' ] ) ) {
	$no_files = count( $_FILES[ "file" ][ 'name' ] );

	for ( $i = 0; $i < $no_files; $i++ ) {
		if ( $_FILES[ "file" ][ "error" ][ $i ] > 0 ) {
			echo "Error: " . $_FILES[ "file" ][ "error" ][ $i ] . "<br>";
		} else {
			if ( file_exists( 'img/' . $_FILES[ "file" ][ "name" ][ $i ] ) ) {
				echo 'File already exists : img/' . $_FILES[ "file" ][ "name" ][ $i ];
			} else {
				$fileName = $_FILES[ 'file' ][ 'name' ];
				$location = "../img/products/" . $fileName;
				$now = new DateTime();
				$now->setTimezone( new DateTimeZone( 'Asia/Beirut' ) );
				$name = ( $now->format( 'dmYHis' ) ). $i . ".jpeg";
				move_uploaded_file( $_FILES[ "file" ][ "tmp_name" ][ $i ], $location . '/' . $name );
				echo $name . ".jpeg";

			}
		}
	}
}
?>