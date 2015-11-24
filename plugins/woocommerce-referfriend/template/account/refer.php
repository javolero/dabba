

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
?>
<h4><?php echo __('Copy the below link and broadcast it to get coupon ') ?></h4>

<?php 

echo '<a href=' . $not_encode_url . '>Share link</a>';

$url = urlencode($not_encode_url);

$facebook = get_option('rf_share_facebook', 'yes');
//if ($facebook =='yes')
$facebook_share_link = "https://www.facebook.com/sharer.php?s=100&p[title]=" . $title . "&p[url]=" . $url . "&[summary]=" . $summary . "&p[images][0]=" . $imageurl;

$twitter_share_link = "https://twitter.com/share?url=" . $url . "&amp;text=" . $twitter_summary ;

$google_share_link = "https://plus.google.com/share?url=" . $url . '&amp;title=' . $title ;
?>

    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/bootstrap.js"></script> -->
<div class="rf-share">
<h3> <?php echo __('Share', 'mg_referfriend') ?></h3>
<ul class="list-inline">
	<?php if (get_option( 'rf_share_facebook' ) == 'yes') : ?>
		<li style="list-style-type: none;">
		<a target="_blank" class="btn btn-fa" href="<?php echo $facebook_share_link ?>">
		
		<i class="fa fa-facebook"></i><?php echo __('Facebook' ,'mg_referfriend')?>
		</a>
		
		</li>
	<?php endif ?>
	
	<?php if (get_option('rf_share_twitter') == 'yes') : ?>
		<li style="list-style-type: none;">
		<a target="_blank" class="btn btn-twi" href="<?php echo $twitter_share_link?>">
		
		
		<i class="fa fa-twitter"></i><?php echo __('Twitter' ,'mg_referfriend')?>
		</a>
		</li>
	<?php endif ?>
	
	<?php if (get_option('rf_share_google_plus') == 'yes') : ?>
		<li style="list-style-type: none;" >
		<a target="_blank" class="btn btn-goog" href="<?php echo $google_share_link ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'>
		<i class="fa fa-google-plus"></i><?php echo __('Google plus' ,'mg_referfriend')?>
		</a></li>
	<?php endif ?>
	
	<?php if (get_option('rf_share_email') == 'yes') : ?>
	<li style="list-style-type: none;display:none "><a id ="share-email" class="email" href="#" onclick="showsharerfform()" ><?php echo __('Email' ,'mg_referfriend')?></a>
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
	</li>
	<?php endif ?>
	
</ul>
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