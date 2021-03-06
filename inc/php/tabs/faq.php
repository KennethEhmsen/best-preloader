<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render FAQ Tab Content
 */
?>
    <div class="postbox">
        <h3 class="title"><?php _e( 'Frequently Asked Questions', $text ); ?></h3>
        <div class="inside">

            <p class="note">
                <?php _e( 'If you have a question, please read the Frequently Asked Questions below to see if the answer is here.', $text ); ?>
            </p>

            <div class="panel-group" id="collapse-group">
                <?php
                    $loopvalue = '18';
                    for ( $i = 1; $i <= $loopvalue; $i++ ) {
                        echo '<div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#collapse-group" href="#element' . $i . '">
                                        <h4 class="panel-title"></h4>
                                    </a>
                                </div>
                                <div id="element' . $i . '" class="panel-collapse collapse">
                                    <div class="panel-body">
                                    </div>
                                </div>
                              </div>';
                    }
                ?>
            </div>

            <?php $i = 1; ?>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Where can I find a documentation for this plugin?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php
                    printf(
                        __( 'Please visit our %s Documentation site %s to view documentation.', $text ),
                        '<a href="https://docs.spacexchimp.com" target="_blank">',
                        '</a>'
                    );
                ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Will this plugin work on my wordpress.COM website?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'Sorry, this plugin is available for use only on self-hosted (wordpress.ORG) websites.', $text ); ?>
                <br><br>
                <?php _e( 'Please note that there is a difference between wordpress.COM and wordpress.ORG.', $text ); ?>
                <?php _e( 'The wordpress.COM is a blog hosting service that offers a limited version of the popular self-hosted WordPress software.', $text ); ?>
                <?php
                    printf(
                        __( 'You can learn more about the difference here: %s .', $text ),
                        '<a href="https://en.support.wordpress.com/com-vs-org/" target="_blank">https://en.support.wordpress.com/com-vs-org/</a>'
                    );
                ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Will this plugin work/compatible with the theme I use?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'This plugin is compatible with most themes.', $text ); ?>
                <?php _e( 'But, unfortunately, we cannot check it with all third-party themes (especially paid ones) for compatibility, therefore there are cases when this plugin does not work with a third-party theme.', $text ); ?>
                <?php _e( 'We constantly check this plugin for compatibility with third-party themes.', $text ); ?>
                <?php _e( 'If we find that this plugin is incompatible with a third-party theme, and if we can fix it on our part, we release an update of our plugin to fix the problem.', $text ); ?>
                <br><br>
                <?php _e( 'If you find a conflict between our plugin and a third-party theme, please let us know and we will definitely release an update of our plugin to fix the problem.', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Will this plugin work/compatible with other plugins that I use?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'This plugin is compatible with most plugins.', $text ); ?>
                <?php _e( 'But, unfortunately, we cannot check it with all third-party plugins (especially paid ones) for compatibility, therefore there are cases when this plugin does not work with a third-party plugin.', $text ); ?>
                <?php _e( 'We constantly check this plugin for compatibility with third-party plugins.', $text ); ?>
                <?php _e( 'If we find that this plugin is incompatible with a third-party plugin, and if we can fix it on our part, we release an update of our plugin to fix the problem.', $text ); ?>
                <br><br>
                <?php _e( 'If you find a conflict between our plugin and a third-party plugin, please let us know and we will definitely release an update of our plugin to fix the problem.', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Can I use this plugin on my language?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'Yes.', $text ); ?>
                <?php _e( 'This plugin is ready for translation and has already been translated into several languages.', $text ); ?>
                <?php _e( 'But If your language is not available then you can make one.', $text ); ?>
                <?php _e( 'It is also possible that not all existing translations are up-to-date or correct, so you are welcome to make corrections.', $text ); ?>
                <?php _e( 'Many of plugin users would be delighted if you share your translation with the community.', $text ); ?>
                <?php _e( 'Thanks for your contribution!', $text ); ?>
                <br><br>
                <?php
                    printf(
                        __( 'If you want to help translate this plugin, please visit the %s.', $text ),
                        '<a href="https://translate.wordpress.org/projects/wp-plugins/' . $slug . '" target="_blank">translation page</a>'
                    );
                ?>
                <?php _e( 'You can also use the POT file that is included and placed in the "languages" folder to create a translation PO file.', $text ); ?>
                <?php
                    printf(
                        __( 'Just send the PO file to us ( %s ) and we will include this translation within the next plugin update.', $text ),
                        '<a href="mailto:support@spacexchimp.com?subject=New translation of the ' . $name . ' plugin">support@spacexchimp.com</a>'
                    );
                ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'How does it work?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'On the "Settings" tab, select the desired settings and click the "Save changes" button.', $text ); ?>
                <?php _e( 'Enjoy your fancy preloader.', $text ); ?>
                <?php _e( 'It\'s that simple!', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'How can I upload my image?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'You can put the URL of image to the "Preloader image" field.', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Does this plugin requires any modification of the theme?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'Absolutely not.', $text ); ?>
                <?php _e( 'This plugin is configurable entirely from the plugin settings page.', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Does this require any knowledge of HTML or CSS?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'Absolutely not.', $text ); ?>
                <?php _e( 'This plugin can be configured with no knowledge of HTML or CSS, using an easy-to-use plugin settings page.', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?> question-red">
                <?php _e( 'It\'s not working.', $text ); ?>
                <?php _e( 'What could be wrong?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'As with every plugin, it\'s possible that things don\'t work.', $text ); ?>
                <?php _e( 'It\'s impossible to tell what could be wrong exactly.', $text ); ?>
                <?php _e( 'The most common reason for this is a web browser\'s cache.', $text ); ?>
                <?php _e( 'Every web browser stores a cache of the websites you visit (pages, images, and etc.) to reduce bandwidth usage and server load.', $text ); ?>
                <?php _e( 'This is called the browser\'s cache.', $text ); ?>
                <?php _e( 'Clearing your browser\'s cache may solve the problem.', $text ); ?>
                <br><br>
                <?php _e( 'If you post a support request in the plugin\'s support forum on WordPress.org, we\'d be happy to give it a look and try to help out.', $text ); ?>
                <?php _e( 'Please include as much information as possible, including a link to your website where the problem can be seen.', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?> question-red">
                <?php _e( 'The last WordPress update is preventing me from editing my website that is using this plugin.', $text ); ?>
                <?php _e( 'Why is this?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'This plugin can not cause such problem.', $text ); ?>
                <?php _e( 'More likely, the problem are related to the settings of the website.', $text ); ?>
                <?php _e( 'It could just be a cache, so please try to clear your website\'s cache (may be you using a caching plugin, or some web service such as the CloudFlare) and then the cache of your web browser.', $text ); ?>
                <?php _e( 'Also please try to re-login to the website, this too can help.', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?> question-red">
                <?php _e( 'Where to report bug if found?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'Bug reports are very welcome!', $text ); ?>
                <?php
                    printf(
                        __( 'Please visit our %s contact page %s and report.', $text ),
                        '<a href="https://www.spacexchimp.com/contact.html" target="_blank">',
                        '</a>'
                    );
                ?>
                <?php _e( 'Please do not forget to specify the name of the plugin.', $text ); ?>
                <?php _e( 'Thank you!', $text ); ?>
                <br><br>
                <?php _e( 'Please include as much information as possible, including a link to your website where the problem can be seen.', $text ); ?>
                <?php _e( 'Describe in more detail what exactly you are seeing.', $text ); ?>
                <?php _e( 'Here are some examples:', $text ); ?>
                <br><br>
                <ul class="custom-list">
                    <li><?php _e( 'Elements of the plugin settings page are not working.', $text ); ?></li>
                    <li><?php _e( 'An error message is displayed on the plugin settings page.', $text ); ?></li>
                    <li><?php _e( 'An error message is displayed on the front end of website.', $text ); ?></li>
                    <li><?php _e( 'An error message is displayed on the back end of website.', $text ); ?></li>
                    <li><?php _e( 'Website is crashed.', $text ); ?></li>
                </ul>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Where to share any ideas or suggestions to make the plugin better?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'Any suggestions are very welcome!', $text ); ?>
                <?php
                    printf(
                        __( 'Please visit our %s contact page %s.', $text ),
                        '<a href="https://www.spacexchimp.com/contact.html" target="_blank">',
                        '</a>'
                    );
                ?>
                <?php _e( 'Please do not forget to specify the name of the plugin.', $text ); ?>
                <?php _e( 'Thank you!', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'I love this plugin!', $text ); ?>
                <?php _e( 'Can I help somehow?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php _e( 'Yes, any contributions are very welcome!', $text ); ?>
                <?php
                    printf(
                        __( 'Please visit our %s Support Us %s page.', $text ),
                        '<a href="https://www.spacexchimp.com/donate.html" target="_blank">',
                        '</a>'
                    );
                ?>
                <?php _e( 'Thank you!', $text ); ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Where can I find information about your licenses, payment process and refunds?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php
                    printf(
                        __( 'Answers to common questions about our licenses, payment process and refunds can be found on our %s Common Questions %s page.', $text ),
                        '<a href="https://www.spacexchimp.com/faq.html" target="_blank">',
                        '</a>'
                    );
                ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Where can I find information about your customer support?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php
                    printf(
                        __( 'Answers to common questions about our customer support can be found on our %s Common Questions %s page.', $text ),
                        '<a href="https://www.spacexchimp.com/faq.html" target="_blank">',
                        '</a>'
                    );
                ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'Where can I find information about your affiliate program?', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php
                    printf(
                        __( 'Answers to common questions about our affiliate program can be found on our %s Common Questions %s page.', $text ),
                        '<a href="https://www.spacexchimp.com/faq.html" target="_blank">',
                        '</a>'
                    );
                ?>
            </div>

            <div class="question-<?php echo $i; ?>">
                <?php _e( 'My question wasn\'t answered here.', $text ); ?>
            </div>
            <div class="answer-<?php echo $i; $i++ ?>">
                <?php
                    printf(
                        __( 'You can ask your question on %s this page %s.', $text ),
                        '<a href="https://www.spacexchimp.com/contact.html" target="_blank">',
                        '</a>'
                    );
                ?>
                <?php _e( 'But please keep in mind that this plugin is free, and there is no a special support team, so we have no way to answer everyone.', $text ); ?>
            </div>

        </div>
    </div>
<?php
