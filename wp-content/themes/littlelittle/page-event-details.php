<?php 
    get_header();
?>

<?php 
    if(have_posts()) :
         while(have_posts()) : 
            the_post(); 
            get_template_part('template-parts/content', 'event-details');
?>



<?php 

    endwhile; else: endif;
    get_footer();

?>