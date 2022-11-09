<!-- Instagram -->

<style type="text/css">
	
.message-bubble {
    font-family: Nunito Sans, sans-serif;
    display: flex;
    flex-flow: row wrap;
    position: fixed;
    background: #fff;
    color: #7499bf;
    right: calc(100px + 2%);
    max-width: 240px;
    bottom: 60px;
    padding: 1em 1em 12px 12px;
    border-radius: 13px 13px 2px 13px;
    box-shadow: 1px -1px 9px rgba(0, 0, 0, .75);
    z-index: 980;
    animation: toggle-bubble .5s ease-out;
    margin-left: 15px;
    line-height: 1.5em;
    transform-origin: 100% 100%
}

.message-bubble::after {
    bottom: 0;
    content: '';
    position: absolute;
    left: calc(100% - 15px);
    width: 0;
    border: 14px solid transparent;
    border-bottom-color: #fff;
    border-radius: 4.5px
}

.message-bubble::before {
    bottom: 0;
    content: '';
    position: absolute;
    left: calc(100% - 12px);
    width: 0;
    border: 15px solid transparent;
    border-bottom-color: rgba(0, 0, 0, .25);
    filter: blur(2px);
    border-radius: 4.5px
}

.message-bubble p {
    margin: 0
}

.message-bubble p + p {
    margin-block: .4em 0
}

.message-bubble .close-button {
    position: absolute;
    right: 5px;
    top: 5px;
    width: .7em;
    height: .7em;
    opacity: .3
}

.message-bubble .close-button:hover {
    opacity: 1;
    cursor: pointer
}

.message-bubble .close-button:before, .message-bubble .close-button:after {
    position: absolute;
    content: ' ';
    height: .7999999999999999em;
    width: 2px;
    background-color: #333
}

.message-bubble .close-button:before {
    transform: rotate(45deg)
}

.message-bubble .close-button:after {
    transform: rotate(-45deg)
}

@-moz-keyframes toggle-bubble {
    from {
        transform: scale(.1)
    }
    to {
        transform: scale(1)
    }
}

@-webkit-keyframes toggle-bubble {
    from {
        transform: scale(.1)
    }
    to {
        transform: scale(1)
    }
}

@-o-keyframes toggle-bubble {
    from {
        transform: scale(.1)
    }
    to {
        transform: scale(1)
    }
}

@keyframes toggle-bubble {
    from {
        transform: scale(.1)
    }
    to {
        transform: scale(1)
    }
}
	
</style>

<div class="message-bubble">
  <p>Qual é a sua dúvida?</p>
  <p>Vamos conversar sobre isso!</p>
  <span class="close-button" id="bubble-msg" onclick="this.parentElement.style.display='none'"></span>
</div>

<?php if (td_util::get_option('tds_footer_instagram') == 'show') { ?>

    <div class="td-main-content-wrap td-footer-instagram-container td-container-wrap <?php echo td_util::get_option('td_full_footer_instagram'); ?>">
        <?php
        //get the instagram id from the panel
        $tds_footer_instagram_id = td_instagram::strip_instagram_user(td_util::get_option('tds_footer_instagram_id'));
        ?>

        <div class="td-instagram-user">
            <h4 class="td-footer-instagram-title">
                <?php echo  __td('Follow us on Instagram', TD_THEME_NAME); ?>
                <a class="td-footer-instagram-user-link" href="https://www.instagram.com/<?php echo $tds_footer_instagram_id ?>" target="_blank">@<?php echo $tds_footer_instagram_id ?></a>
            </h4>
        </div>

        <?php
        //get the other panel seetings
        $tds_footer_instagram_nr_of_row_images = intval(td_util::get_option('tds_footer_instagram_on_row_images_number'));
        $tds_footer_instagram_nr_of_rows = intval(td_util::get_option('tds_footer_instagram_rows_number'));
        $tds_footer_instagram_img_gap = td_util::get_option('tds_footer_instagram_image_gap');
        $tds_footer_instagram_header = td_util::get_option('tds_footer_instagram_header_section');

        //show the insta block
        echo td_global_blocks::get_instance('td_block_instagram')->render(
            array(
                'instagram_id' => $tds_footer_instagram_id,
                'instagram_header' => /*td_util::get_option('tds_footer_instagram_header_section')*/ 1,
                'instagram_images_per_row' => $tds_footer_instagram_nr_of_row_images,
                'instagram_number_of_rows' => $tds_footer_instagram_nr_of_rows,
                'instagram_margin' => $tds_footer_instagram_img_gap
            )
        );

        ?>
    </div>

<?php } ?>

<?php

$tds_footer_page = td_util::get_option('tds_footer_page');
$footer_page = null;

if ($tds_footer_page !== '' && intval($tds_footer_page) !== get_the_ID()) {
	$footer_page = get_post( $tds_footer_page );
}

if ( $footer_page instanceof WP_Post ) {

	?>

	<div class="td-footer-wrapper td-footer-page td-container-wrap">
	<?php

		// This action must be removed, because it's added by TagDiv Composer, and it affects footers with custom content
		remove_action( 'the_content', 'tdc_on_the_content', 10000 );

		$content = apply_filters( 'the_content', $footer_page->post_content );
		$content = str_replace( ']]>', ']]&gt;', $content );
		echo $content;

		wp_reset_query();

	?>
	</div>

<?php

} else { ?>


	<!-- Footer -->
	<?php
	if ( td_util::get_option( 'tds_footer' ) != 'no' ) {
		td_api_footer_template::_helper_show_footer();
	}
	?>

	<!-- Sub Footer -->
	<?php
	if ( td_util::get_option( 'tds_sub_footer' ) != 'no' ) {
		td_api_sub_footer_template::_helper_show_sub_footer();
	}
}
?>
<!--script src="https://unpkg.com/blip-chat-widget@1.6.*" type="text/javascript"></script>
<script>
    (function () {
        window.onload = function () {
          var blipClient = new BlipChat()
		  .withAppKey('cm91dGVyZGlhY29ub3M6ZTgwNDk4MzItOWE4MC00ZTdkLWI1NmEtYzA1YzdiZjZkOTUy')
		  .withButton({"color":"#219160","icon":"https://arquivoscad.s3.sa-east-1.amazonaws.com/logodiaconos.png"})
          .withEventHandler(BlipChat.CREATE_ACCOUNT_EVENT, function () {
              blipClient.sendMessage({
                  "type": "text/plain",
                  "content": "Start"
              });
			  document.getElementById('bubble-msg').click();
          });
          blipClient.build();
        }
    })();
</script>

</div><!--close td-outer-wrap-->

<?php wp_footer(); ?>

</body>
</html>
