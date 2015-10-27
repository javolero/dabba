<?php

/**
* Here we add all the javascript that needs to be run on the footer.
**/
function footer_admin_scripts(){
	global $post;
?>
		<script type="text/javascript">
			(function( $ ) {
				"use strict";
				$(function(){

					$('.js-datepicker').datepicker({
						changeMonth: 	true,
						changeYear: 	true,
						dateFormat: 	'yy-mm-dd'
					});

				});
			}(jQuery));
		</script>
<?php }// footer_scripts ?>