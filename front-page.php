<?php
/**
* Template Name: Página de inicio
*
*/

get_header(); ?>

<h1 class="fw-light mb-4">Eventos</h1>
<section>
<?php 
$args = array( 'post_type' => 'eventos', 'posts_per_page' => 100 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
<div class="row">	
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<article class="col-md-4 col-sm-4 p-0 mb-4 eventos">        
	<div class="m-4 card">		
			<figure>
				<?php
					the_post_thumbnail(); 
				?>				
			</figure>
			<div class="p-3">
				<h2 class="fw-light mb-4"><?php the_title(); ?></h2>				
				<p class="fs-4 mb-4 fw-light"><?php echo get_the_excerpt(); ?></p>							       
				<a class="btn btn-success" href="<?php the_permalink(); ?>">Más info</a>
			</div>
	</div>
</article>
<?php endwhile; ?>
</div>
<?php wp_reset_postdata(); ?>
<?php else:  ?>
<p><?php _e( 'Lo sentimos, pero no hay eventos que mostrar.' ); ?></p>
<?php endif; ?>
</section>

<h1 class="fw-light mb-4">Últimos perros</h1>
<section>
<?php 
$args = array( 'post_type' => 'perro', 'posts_per_page' => 2 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
<div class="row">	
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<article class="col-md-6 col-sm-6 p-0 mb-4">        
		<div class="m-4 card">
			<figure>
				<?php
					the_post_thumbnail(); 
				?>				
			</figure>
			<div class="p-3">
				<h2 class="fw-light mb-4"><?php the_title(); ?></h2>
				<p class="fs-3 mb-4 fw-light">Descripción: <?php echo get_the_content(); ?></p>
				<p class="fs-4 mb-4 fw-light">Edad: <?php echo get_field( "edad" ); ?> años</p>				
				<p class="fs-4 mb-4 fw-light">Raza: <?php echo get_field( "raza" ); ?></p>								
			</div>
		</div>
	
</article>
<?php endwhile; ?>
</div>
<?php wp_reset_postdata(); ?>
<?php else:  ?>
<p><?php _e( 'Lo sentimos, pero no hay perros que mostrar.' ); ?></p>
<?php endif; ?>
</section>

<?php get_footer(); ?>
