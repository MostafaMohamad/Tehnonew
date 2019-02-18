<?php
header( 'Access-Control-Allow-Origin: *' );
require_once( 'DAL.class.php' );

if ( isset( $_GET[ "op" ] ) ) {
	//Get Programs by os
	if ( $_GET[ "op" ] == 'progbyos' ) {
		$sql = "SELECT * FROM programs";
		if($_GET["os"] != 'All'){
			$sql .= " WHERE programs.prog_id IN (SELECT program_specs.prog_id FROM program_specs WHERE program_specs.os_type = '" . $_GET[ "os" ] . "')";
		}
		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo $e;
		}

	}
}

//Get all professions
function GetProfessions() {
	$sql = "SELECT * FROM profession_major WHERE pm_type = 'profession' ";
	try {
		$db = new DAL();
		$data = $db->getData( $sql );
		if ( !empty( $data ) ) {
			$majors = '<optgroup label="Professions">';
			for ( $i = 0; $i < count( $data ); $i++ ) {
				$majors .= '<option value="' . $data[ $i ][ "pm_name" ] . '">' . $data[ $i ][ "pm_name" ] . '</option>';
			}
			$majors .= '</optgroup>';
			echo( $majors );
		}

	} catch ( Exception $e ) {
		echo - 1;
	}
}

//Get all majors
function GetMajors() {
	$sql = "SELECT * FROM profession_major WHERE pm_type = 'major' ";
	try {
		$db = new DAL();
		$data = $db->getData( $sql );
		if ( !empty( $data ) ) {
			$majors = '<optgroup label="Majors">';
			for ( $i = 0; $i < count( $data ); $i++ ) {
				$majors .= '<option value="' . $data[ $i ][ "pm_name" ] . '">' . $data[ $i ][ "pm_name" ] . '</option>';
			}
			$majors .= '</optgroup>';
			echo( $majors );
		}

	} catch ( Exception $e ) {
		echo - 1;
	}
}
?>