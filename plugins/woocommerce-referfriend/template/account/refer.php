

<!-- social share -->
<?php
if (!$url) {
	return ;
}
$not_encode_url = $url;
$title = urlencode(get_option('rf_share_title'));
$replace = array('{wishlist_url}'=>$not_encode_url ) ;
$content = strtr (  get_option( 'rf_share_text' ), $replace );
$twitter_summary =$content  ;//str_replace( '{wishlist_url}', '', get_option( 'rf_share_text' ) );
$summary = urlencode($content);//urlencode( get_option( 'rf_share_text' ));//urlencode( str_replace( '{wishlist_url}', $not_encode_url, get_option( 'rf_share_text' ) ) );
$imageurl = urlencode( get_option( 'rf_share_image_url' ) );
$current_user = wp_get_current_user();

$url = urlencode($not_encode_url);

$facebook = get_option('rf_share_facebook', 'yes');
//if ($facebook =='yes')
$facebook_share_link = "https://www.facebook.com/sharer.php?s=100&p[title]=" . $title . "&p[url]=" . $url . "&[summary]=" . $summary . "&p[images][0]=" . $imageurl;

$twitter_share_link = "https://twitter.com/share?url=" . $url . "&amp;text=" . $twitter_summary ;

$google_share_link = "https://plus.google.com/share?url=" . $url . '&amp;title=' . $title ;
?>

<div class="[ rf-share ][ margin-bottom--large ]">
	<h3>Comparte en redes sociales</h3>
	<p class="[ lead ]">Invita a un amigo a unirse a Dabba y recibe un cupón por $100 en su primera compra. ¡Entre más amigos invites, más comida gratis para todos!</p>
	<?php echo '<p>' . $not_encode_url . '</p>'; ?>
	<?php if (get_option( 'rf_share_facebook' ) == 'yes') : ?>
		<a target="_blank" class="[ margin-sides--small margin-bottom--small ][ btn button-social-login-facebook ]" href="<?php echo $facebook_share_link ?>">
			<img class="[ svg ][ icon icon--iconed--mini icon--fill ][ color-facebook ]" src="<?php echo THEMEPATH; ?>icons/logo-facebook.svg"> <?php echo __('Facebook' ,'mg_referfriend')?>
		</a>
	<?php endif ?>

	<?php if (get_option('rf_share_twitter') == 'yes') : ?>
		<a target="_blank" class="[ margin-sides--small margin-bottom--small ][ btn button-social-login-twitter ]" href="<?php echo $twitter_share_link?>">
			<img class="[ svg ][ icon icon--iconed--mini icon--fill ][ color-twitter ]" src="<?php echo THEMEPATH; ?>icons/logo-twitter.svg"> <?php echo __('Twitter' ,'mg_referfriend')?>
		</a>
	<?php endif ?>

	<?php if (get_option('rf_share_google_plus') == 'yes') : ?>
		<div style="list-style-type: none;" >
		<a target="_blank" class="btn btn-goog" href="<?php echo $google_share_link ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'>
		<i class="fa fa-google-plus"></i><?php echo __('Google plus' ,'mg_referfriend')?>
		</a></div>
	<?php endif ?>

	<?php if (get_option('rf_share_email') == 'yes') : ?>
	<div style="list-style-type: none;display:none "><a id ="share-email" class="email" href="#" onclick="showsharerfform()" ><?php echo __('Email' ,'mg_referfriend')?></a>
		<div >
			<form method="POST" id="share_via_email_form" class="form email" style="display: none">
				<input type="hidden" name="rf-share-email" value="1" />

				<div class="form-field">
					<label for="recipient"><?php echo __('Recipient', 'mg_referfriend') ?></label>
					<input name="recipient" id="recipient" type="text"
						size="40">
					<span class="note"><?php echo __("separate email by commas" , 'mg_referfriend')?></span>
				</div>

				<div class="form-field">
					<label for="email_subject"><?php echo __('Subject', 'mg_referfriend') ?></label>
					<input name="email_subject" id="email_subject" type="text" value="<?php echo get_option('rf_notify_email_subject') ?>"
						size="40">
				</div>

				<div class="form-field">
					<label for="message"><?php echo __('Message', 'mg_referfriend') ?></label>
					<textarea id="message" name="message" rows="" cols=""><?php $re= array('{wishlist_url}'=>$not_encode_url) ; $content = strtr(get_option('rf_share_text'),$re); echo $content;  ?> </textarea>
				</div>

			    <input type="submit" value="Send" />
			</form>
		</div>
	</div>
	<?php endif ?>

</div>
<script type="text/javascript">
function showsharerfform() {
	jQuery('#share_via_email_form').show();

	jQuery('html, body').animate({
	                        scrollTop:jQuery("#share-email").offset().top
	                    }, 1000);
	jQuery('#recipient').focus();
}
</script>