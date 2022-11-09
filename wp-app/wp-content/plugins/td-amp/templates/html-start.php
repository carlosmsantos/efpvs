<?php
/**
 * HTML start template part.
 *
 */
?>

<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <?php do_action( 'amp_post_template_head', $this ); ?>
    <style amp-custom>
        <?php require_once('style.php'); ?>
        <?php do_action( 'amp_post_template_css', $this ); ?>
    </style>
</head>

<body class="<?php echo esc_attr( $this->get( 'body_class' ) ); ?>" itemscope="itemscope" itemtype="<?php echo td_global::$http_or_https?>://schema.org/WebPage">

<div id="td-outer-wrap">