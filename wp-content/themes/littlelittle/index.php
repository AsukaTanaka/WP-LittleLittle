<?php 
    get_header();
?>

<?php 
    if(have_posts()) :
         while(have_posts()) : 
            the_post(); 
            get_template_part('template-parts/content', 'home');
?>



<?php 

    endwhile; else: endif;
    get_footer();

?>