<?php
require_once( 'ws/DAL.class.php' );
if ( isset( $_GET[ 'op' ] ) ) {
	switch ( $_GET[ 'op' ] ) {
		case 'products':
			$sql = "SELECT * FROM products, sub_categories WHERE products.subc_id = sub_categories.subc_id ORDER BY products.product_added DESC";
			break;
		case 'featured':
			$sql = "SELECT * FROM products, sub_categories WHERE products.subc_id = sub_categories.subc_id AND products.Featured = 1 ORDER BY featured_date DESC";
			break;
		case 'enabled':
			$sql = "SELECT * FROM products, sub_categories WHERE products.subc_id = sub_categories.subc_id AND products.product_status = 1 ORDER BY products.product_added DESC";
			break;
		case 'disabled':
			$sql = "SELECT * FROM products, sub_categories WHERE products.subc_id = sub_categories.subc_id AND products.product_status = 0 ORDER BY products.product_added DESC";
			break;
	}
	if ( !empty( $sql ) ) {
		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			if ( count( $data ) > 0 ) {
				for ( $i = 0; $i < count( $data ); $i++ ) {
					echo( '<tr><td>' . $data[ $i ][ 'product_name' ] . '</td>' .
						'<td>' . $data[ $i ][ 'model_number' ] . '</td>' .
						'<td>' . $data[ $i ][ 'subc_name' ] . '</td>' .
						'<td>' . $data[ $i ][ 'product_brand' ] . '</td>' .
						'<td>' . $data[ $i ][ 'product_price' ] . ' &#36;</td>' .
						'<td>' . $data[ $i ][ 'product_description' ] . '</td>' .
						'<td><img style="max-width:100px; max-height:100px;" src ="img/products/' . $data[ $i ][ 'product_name' ] . $data[ $i ][ 'model_number' ] . '/' . $data[ $i ][ 'product_image' ] . '"></td>' .
						'<td><a class="btn fas fa-edit href="#"></a><br>' );
					if ( $data[ $i ][ "Featured" ] == '0' ) {
						echo( '<a class="btn fas fa-star nftd"  href="#"></a><br>' );
					} else if ( $data[ $i ][ "Featured" ] == '1' ) {
						echo( '<a class="btn fas fa-star ftd"  href="#"></a><br>' );
					}
					if ( $data[ $i ][ 'product_status' ] == '0' ) {
						echo( '<a class="btn fas fa-check enb" href="#"></a></td><td><span class="fas fa-times-circle"></span></td></tr>' );
					} else if ( $data[ $i ][ 'product_status' ] == '1' ) {
						echo( '<a class="btn fas fa-times dis" href="#"></a></td><td><span class="fas fa-check-circle"></span></td></tr>' );
					}

				}
			}

		} catch ( Exception $e ) {
			echo - 1;
		}
	}
}

function GetAllProgarms() {
	if ( isset( $_GET[ "programs" ] ) ) {
		$sql = '';
		switch ( $_GET[ "programs" ] ) {
			case 'all':
				$sql = "SELECT * FROM programs, program_specs WHERE programs.prog_id = program_specs.prog_id";
		}

		if ( !empty( $sql ) ) {
			try {
				$db = new DAL();
				$data = $db->getData( $sql );

				if ( count( $data ) > 0 ) {
					for ( $i = 0; $i < count( $data ); $i++ ) {
						echo( '<tr><td>' . $data[ $i ]["prog_name"].'</td>
						<td>' . $data[ $i ]["cpu"].'</td>
						<td>' . $data[ $i ]["multicore"].'</td>
						<td>' . $data[ $i ]["ram"].'</td>
						<td>' . $data[ $i ]["vram"].'</td>
						<td>' . $data[ $i ]["os_type"].'</td>
						<td>' . $data[ $i ]["prog_details"].'</td>
						<td><img style="height:48px;" src="img/programs/'. $data[ $i ]["prog_name"].'/'. $data[ $i ]["prog_image"].'"></td>
						<td>' . $data[ $i ]["prog_name"].'</td>
						<td>' . $data[ $i ]["prog_name"].'</td></tr>' );
					}

				}
			} catch ( Exception $e ) {
				echo( $e );
			}
		}
	}
}

function GetAllSpecs() {
	$sql = 'SELECT * FROM specifications ORDER BY spec_name ASC';
	try {
		$db = new DAL();
		$data = $db->getData( $sql );

		if ( count( $data ) > 0 ) {
			for ( $i = 0; $i < count( $data ); $i++ ) {
				echo( '<tr><td style="display:none;">'.$data[$i]["spec_id"].'</td>
				<td>' . $data[ $i ][ 'spec_name' ] . '</td>
				<td><a href="#" data-toggle="modal" data-target="#edit-spec" class="edit-btn"><span class="fas fa-edit"></span></a></td></tr>' );
			}
		}

	} catch ( Exception $e ) {
		echo( $e );
	}
}


?>