<?php 
/*
Template Name: events
*/
get_header();

$milestone_link = get_catlink_by_id('milestones');
$holiday_link = get_catlink_by_id('holidays');
$outing_link = get_catlink_by_id('outings');
$gathering_link = get_catlink_by_id('gatherings');
$archive_link = get_catlink_by_id('Pyles of Veggies');




?>

<div class="container">
    <div class="row bottom-margin">
        <a class="hover-link" href="<?php echo esc_url( $milestone_link ); ?>">
            <div class="col-lg-6 col-sm-12">
                <figure>
                    <img class="responsive" src="<?php bloginfo('template_url'); ?>/images/milestones.jpg">
                    <figcaption><p>milestones</p></figcaption>
                </figure>
            </div>
        </a>
        <a class="hover-link" href="<?php echo esc_url( $holiday_link ); ?>">
            <div class="col-lg-6 col-sm-12">
                <figure>
                    <img class="responsive" src="http://placehold.it/800x800">
                    <figcaption><p>holidays</p></figcaption>
                </figure>
            </div>
        </a>
    </div>
    <div class="row bottom-margin">
        <a class="hover-link" href="<?php echo esc_url( $outing_link ); ?>">
            <div class="col-lg-6 col-sm-12">
                <figure>
                    <img class="responsive" src="<?php bloginfo('template_url'); ?>/images/outings.jpg">
                    <figcaption><p>outings</p></figcaption>
                </figure>
            </div>
        </a>
        <a class="hover-link" href="<?php echo esc_url( $gathering_link ); ?>">
            <div class="col-lg-6 col-sm-12">
                <figure>
                    <img class="responsive" src="http://placehold.it/800x800">
                    <figcaption><p>gatherings</p></figcaption>
                </figure>
            </div>
        </a>
    </div>
    <div class="row bottom-margin">
        <a class="hover-link" href="<?php echo esc_url( $archive_link ); ?>">
            <div class="col-lg-6 col-sm-12">
                <figure>
                    <img class="responsive" src="http://placehold.it/800x800">
                    <figcaption><p>pyles of veggies</p></figcaption>
                </figure>
            </div>
        </a>
    </div>
</div>


<?php get_footer(); ?>
