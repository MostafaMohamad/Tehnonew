<?php
require_once( 'ws/DAL.class.php' );
if ( isset( $_GET[ 'op' ] ) ) {
	if ( $_GET[ 'op' ] = 'products' ) {
		$sql = "SELECT * FROM products, sub_categories WHERE products.subc_id = sub_categories.subc_id";
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
						'<td>' . $data[ $i ][ 'product_name' ] . '</td></tr>' );

				}
			}

		} catch ( Exception $e ) {
			echo - 1;
		}
	}
}

?>