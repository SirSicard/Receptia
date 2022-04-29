<?php /* Template Name: Landingpage */ ?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>
<div id="content" class="site-content container bg-dark py-5 mt-5">
    <div id="primary" class="content-area">

        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>
        <div class="mb-5 mt-3">
            <center>
                <h1 class=" text-white">Receptia, the portal to better food, search for your dishes below!</h1>
            </center>
            <div class="search_form mt-3 mb-3"><?php get_search_form(); ?></div>
            <center>
                <p class=" text-white"><small>or view our different dishes below</small></p>
            </center>
            <div class="tag_cloud">
                <?php $tags = get_tags(); ?>
                <div class="tags mb-3">
                    <?php foreach ($tags as $tag) { ?>
                        <span class="badge bg-white"><a class="text-decoration-none  text-dark" href="<?php echo get_tag_link($tag->term_id); ?> " rel="tag"><?php echo $tag->name; ?></a></span>
                    <?php } ?>
                </div>
            </div>
        </div>
        <main id="main" class="site-main">

            <header class="entry-header">
                <div class="categories mb-5">
                    <center>
                        <h3 class=" text-white">Food Categories</h3>
                    </center>
                    <?php
                    $args = array(
                        'taxonomy' => 'recipe_category',
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    );

                    $cats = get_categories($args);
                    foreach ($cats as $cat) {
                    ?>
                        <a href="<?php echo get_category_link($cat->term_id) ?>">
                            <span class="badge bg-white text-dark"><?php echo $cat->name; ?></span>
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <!-- Title -->
                <center>
                    <h3 class=" text-white">Newly added recipes</h3>
                </center>
                <?php
                $args = array('post_type' =>  'bs_recipie');
                $postslist = get_posts($args);
                echo "<div class='row'>";
                foreach ($postslist as $post) :  setup_postdata($post);
                ?>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="card m-1">
                            <img class="card-img-top" src="<?php the_field('image'); ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                                <p class="card-text"><?php the_field('content'); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">View recipe</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
    </div> <!-- ending row -->
    </header>
    <footer class="entry-footer">

    </footer>
    <!-- Comments -->
    <?php comments_template(); ?>

    </main><!-- #main -->

</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
