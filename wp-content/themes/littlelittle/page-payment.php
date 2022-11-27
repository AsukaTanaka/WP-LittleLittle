<?php 
    session_start();
    get_header();
?>

<?php 
    if(have_posts()) :
         while(have_posts()) : 
            the_post(); 
            get_template_part('template-parts/content', 'payment');
?>



<?php 

    endwhile; else: endif;
    get_footer();

?>