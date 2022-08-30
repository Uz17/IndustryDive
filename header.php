<!DOCTYPE html>
<html lang="<?php language_attributes( ); ?>" class="no-js">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head( ); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="top-bar">
            <div class="search"><?php get_search_form(); ?></div>
            <div class="logo">
                <h1><?php echo get_bloginfo('name'); ?> </h1>
                <h3><?php echo get_bloginfo('description'); ?></h3>
            </div>
            <div class="subscribe"><button>Subscribe</button></div>
        </div >
        <div><nav class="bottom-bar"><?php wp_nav_menu( array('theme_location' => 'my_main_menu') ); ?></nav></div>
    </header>