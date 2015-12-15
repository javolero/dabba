<?php 

	$coupons = get_user_coupons( get_current_user_id() );
	if( $coupons ) : 
		echo '<h3>Cupones</h3>';
		foreach ( $coupons as $coupon ) : 
			echo '<div class="[ coupon ]">';
			echo '<h4>' . $coupon->code . '</h4>';
			echo '<p>Cantidad: ' . $coupon->coupon_amount . '</p>';
			echo '</div>';
		endforeach;
	endif;
