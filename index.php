<?php get_header(); ?>

<div class="content-area">
        <main>
            <section class="top-banner">
            <?php
    $post = get_post(25); //assuming $id has been initialized
    setup_postdata($post);

        // display the post here
        
        the_excerpt();
        the_post_thumbnail();?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
       
       <?php wp_reset_postdata();
?>
<a href="<?php the_permalink(); ?>">Read More</a>
            </section>

            
            <h1 class="title-fn">Featured News</h1>
            <section class="featured">
        <div class="two-row-ft">
                            
                            <?php 
                                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'featured',
                    'posts_per_page' => 2,
                );
                $arr_posts = new WP_Query( $args );
                
                if ( $arr_posts->have_posts() ) :
                
                    while ( $arr_posts->have_posts() ) :
                        $arr_posts->the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail();
                            endif;
                            ?>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>            <div class="entry-content">
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                endif; ?>
        </div>
         <div class="single-panel">
            <?php
    $post = get_post(31); //assuming $id has been initialized
    setup_postdata($post);

        // display the post here
        
        the_excerpt();
        the_post_thumbnail();?> 
        <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>  
       
        <?php wp_reset_postdata();
    ?>
<a href="<?php the_permalink(); ?>">Read More</a>
         </div>
            </section>

            <h1 class="title-fn">Trending News</h1>


    <section class="trending">
            
        <div class="single-panel">
                                <?php
                                        $post = get_post(58); //assuming $id has been initialized
                                        setup_postdata($post);

                            // display the post here
                            
                                    the_excerpt();
                                    the_post_thumbnail();?> 
                                    <header class="entry-header">
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                    </header>  
                        
                            <?php wp_reset_postdata();
                        ?>

                           <a href="<?php the_permalink(); ?>">Read More</a>
        </div>
        <div class="two-row-ft">
                            
                            <?php 
                                $sub = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'trending',
                    'posts_per_page' => 2,
                );
                $arr_posts = new WP_Query( $sub );
                
                if ( $arr_posts->have_posts() ) :
                
                    while ( $arr_posts->have_posts() ) :
                        $arr_posts->the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail();
                            endif;
                            ?>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>            <div class="entry-content">
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                endif; ?>
        </div>
                
    </section>
                <h1 class="title-fn">Latest</h1>

            <section class="Latest">
            <div class="three-panel">
                <?php 
                                $latest = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'latest',
                    'posts_per_page' => 3,
                );
                $arr_posts = new WP_Query( $latest );
                
                if ( $arr_posts->have_posts() ) :
                
                    while ( $arr_posts->have_posts() ) :
                        $arr_posts->the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail();
                            endif;
                            ?>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>            
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                endif; ?>

            </div>

            <div class="button" ><?php
                    if (  $wp_query->max_num_pages > 1 )
                        echo '<div class="my_loadmore">Load More Posts</div>'; // you can use <a> as well
                    ?>
            </div>
            </section>


    </main>
</div>
<?php get_footer(); ?>