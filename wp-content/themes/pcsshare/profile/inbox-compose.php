<?php
/**
 * BuddyPress - Members Single Messages Compose
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>
<form action="<?php bp_loggedin_user_domain() . bp_get_messages_slug() . '/compose' ?>" method="post" id="send_message_form" class="standard-form form-horizontal" enctype="multipart/form-data">

	<?php

	/**
	 * Fires before the display of message compose content.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_messages_compose_content' ); ?>
    <div class="form-group">
	    <label for="send-to-input" class="col-sm-2 control-label"><?php _e("Send To (Username or Friend's Name)", 'buddypress' ); ?></label>
		<?php bp_message_get_recipient_tabs(); ?>
        <div class="col-sm-10">
		    <input type="text" name="send-to-input" class="send-to-input form-control" id="send-to-input" />
        </div>
    </div>

    <div class="form-group">
        <label for="subject" class="col-sm-2 control-label"><?php _e( 'Subject', 'buddypress' ); ?></label>
        <div class="col-sm-10">
            <input type="text" name="subject" id="subject" class="form-control" value="<?php bp_messages_subject_value(); ?>" />
        </div>
    </div>

    <div class="form-group">
        <label for="message_content" class="col-sm-2 control-label"><?php _e( 'Message', 'buddypress' ); ?></label>
        <div class="col-sm-10">
            <textarea name="content" id="message_content" class="form-control" rows="15" cols="40"><?php bp_messages_content_value(); ?></textarea>
        </div>
    </div>

	<input type="hidden" name="send_to_usernames" class="form-control" id="send-to-usernames" value="<?php bp_message_get_recipient_usernames(); ?>" class="<?php bp_message_get_recipient_usernames(); ?>" />

	<?php

	/**
	 * Fires after the display of message compose content.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_messages_compose_content' ); ?>

	<div class="submit form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-primary" value="<?php esc_attr_e( "Send Message", 'buddypress' ); ?>" name="send" id="send" />
        </div>
    </div>

	<?php wp_nonce_field( 'messages_send_message' ); ?>
</form>

<script type="text/javascript">
	document.getElementById("send-to-input").focus();
</script>
