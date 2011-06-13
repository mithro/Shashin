<?php
/**
 * Manage photo albums.
 *
 * This file is part of Shashin. Please see the Shashin.phl file for
 * copyright and license information.
 *
 * @author Michael Toppa
 * @version 3.0
 * @package Shashin
 * @subpackage AdminPanels
 * @uses ToppaWPFunctions::displayInput()
 */

?>

<div style="float: right; font-weight: bold; margin-top: 15px; width: 340px;">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="5378623">
    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" /><?php _e("Support Shashin", 'shashin'); ?> &raquo;
    <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="<?php _e("Support Shashin", 'shashin'); ?>" title="<?php _e("Support Shashin", 'shashin'); ?>" style="vertical-align: middle; padding-right: 20px;" />
    <a href="<?php echo $this->shashin->faq_url; ?>" target="_blank"><?php _e("Shashin Help", 'shashin'); ?></a>
    </form>

    <p style="font-weight: normal; font-style: italic;"><?php _e('If you tip your pizza delivery person, please consider a small donation to your plugin developer.'); ?></p>
</div>