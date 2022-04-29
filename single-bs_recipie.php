<?php
/*
	 * Template Post Type: post
	 */

get_header();  ?>

<!-- hero -->
<div class="container-fluid" style="background-image:url('<?php echo get_field('featured_image'); ?>');background-repeat: no-repeat; background-position: center; background-size: cover; height: 400px; color: white; box-shadow: inset 6000px 6000px #22222263;">
    <div class="container h-100">
        <div class="recipe_title" style="padding-top: 250px;"><?php the_title('<h1>', '</h1>'); ?></div>
    </div>
</div>

<div id="content" class="site-content bg-dark container py-1 mt-4">
    <div id="primary" class="content-area">

        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>

        <!-- Show the tag/s on the specific recipe-->
        <div class="post_tag mb-3">
            <?php
            global $post;
            foreach (get_the_tags($post->ID) as $tag) {
                echo '<span class="badge bg-light text-dark"><a class="text-decoration-none text-dark" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></span>';
            }
            ?>
        </div>
        <div class="alert alert-info" role="alert">
            <?php echo the_field('content'); ?>
        </div>

        <div class="row">
            <!-- Ingredients tab on the recipe -->
            <div class="col-sm-12 col-md-4 col-lg-3 h-auto">
                <div class="ingredients_box mb-4 p-3 bg-light">
                    <b>Portions:</b> <?php echo the_field('servings'); ?>
                </div>
                <!-- ingredients -->
                <div class="ingredients_box p-3 bg-light">
                    <h3>Ingredients</h3>
                    <hr>
                    <?php
                    $rows = get_field('ingredients');
                    if ($rows) {
                        echo '<ul class="ingredients">';
                        foreach ($rows as $row) {
                            echo "<li>" . $row['ingredients'] . "</li>";
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
            <!-- end col 4 -->
            <div class="col-sm-12 col-md-8 col-lg-8">
                <main id="main" class="site-main">
                    <header class="entry-header bg-light p-3">
                        <div class="instruction_box">
                            <h3>Instructions</h3>
                            <hr>
                            <?php the_field('instructions'); ?>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <footer class="entry-footer clear-both">
                        <div class="mb-4">
                            <?php bootscore_tags(); ?>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <?php previous_post_link('%link'); ?>
                                </li>
                                <li class="page-item">
                                    <?php next_post_link('%link'); ?>
                                </li>
                            </ul>
                        </nav>
                    </footer>

                    <?php comments_template(); ?>

                </main> <!-- #main -->

            </div><!-- col -->

        </div><!-- row -->

    </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>