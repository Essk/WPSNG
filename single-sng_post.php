<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav'); ?>
 
<!-- start content container -->
<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
<!-- end content container -->

<?php get_template_part('template-part', 'footernav'); ?>

<?php get_footer(); ?>
<?php get_footer(); ?>