<?php
/*
 * Wolf CMS - Content Management Simplified. <http://www.wolfcms.org>
 * Copyright (C) 2009-2010 Martijn van der Kleijn <martijn.niji@gmail.com>
 * Copyright (C) 2008 Philippe Archambault <philippe.archambault@gmail.com>
 *
 * This file is part of Wolf CMS. Wolf CMS is licensed under the GNU GPLv3 license.
 * Please see license.txt for the full license text.
 */

/**
 * @package Views
 *
 * @author Philippe Archambault <philippe.archambault@gmail.com>
 * @copyright Philippe Archambault, 2008
 * @license http://www.gnu.org/licenses/gpl.html GPLv3 license
 */
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo __('Forgot password'); ?></title>

        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <base href="<?php echo trim(BASE_URL, '?/').'/'; ?>" />        
        <link href="<?php echo URI_PUBLIC; ?>wolf/admin/themes/<?php echo Setting::get('theme'); ?>/login.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="<?php echo URI_PUBLIC; ?>wolf/admin/javascripts/jquery-1.4.2.min.js"></script>
        <script>
            // <![CDATA[
            $(document).ready(function() {
                (function showMessages(e) {
                    e.fadeIn('slow')
                    .animate({opacity: 1.0}, 1500)
                    .fadeOut('slow', function() {
                        if ($(this).next().attr('class') == 'message') {
                            showMessages($(this).next());
                        }
                        $(this).remove();
                    })
                })( $(".message:first") );

                $("input:visible:enabled:first").focus();
            });
            // ]]>
        </script>
    </head>
    <body>
        <section id="dialog">
            <h1><?php echo __('Forgot password'); ?></h1>
            <?php if (Flash::get('error') !== null): ?>
            <div id="error" class="message" style="display: none;"><?php echo Flash::get('error'); ?></div>
            <?php endif; ?>
            <?php if (Flash::get('success') !== null): ?>
            <div id="success" class="message" style="display: none"><?php echo Flash::get('success'); ?></div>
            <?php endif; ?>
            <?php if (Flash::get('info') !== null): ?>
            <div id="info" class="message" style="display: none"><?php echo Flash::get('info'); ?></div>
            <?php endif; ?>
            <form action="<?php echo get_url('login', 'forgot'); ?>" method="post">
                <div>
                    <label for="forgot-email"><?php echo __('Email address'); ?>:</label>
                    <input class="long" id="forgot-email" type="email" name="forgot[email]" value="<?php echo $email; ?>" />
                </div>
                <div id="forgot-submit">
                    <input class="submit" type="submit" accesskey="s" value="<?php echo __('Send password'); ?>" />
                    <span>(<a href="<?php echo get_url('login'); ?>"><?php echo __('Login'); ?></a>)</span>
                </div>
            </form>
        </section>
        <p><?php echo __('website:').' <a href="'.URL_PUBLIC.'">'.Setting::get('admin_title').'</a>'; ?></p>
    </body>
</html>
