<?php
/**
* Template Name: Perros
*
*/

get_header(); ?>

<h1 class="fw-light mb-4">Nuestros perros</h1>
<section>
<?php 
$args = array( 'post_type' => 'perro', 'posts_per_page' => 100 );
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
<div class="row">	
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<article class="col-md-4 col-sm-4 p-0 mb-4">        
		<div class="m-4 card">				
			<figure>
				<?php
					the_post_thumbnail(); 
				?>				
			</figure>
			
			<div class="cat p-3">
			
                            <p class="badge bg-info fw-light"><?php echo get_field( "sexo" ); ?></p>
							<?php
							$vacunado = get_field( "vacunado" );
							if ($vacunado == 'Si') {
							?>	
							<p class="badge bg-primary fw-light">Vacunado</p>
							<?php								
							}
							?>
							<?php
							$castrado = get_field( "castrado" );
							if ($castrado == 'Si') {
							?>	
							<p class="badge bg-danger fw-light">Castrado</p>
							<?php								
							}
							?>
							<?php
							$chip = get_field( "chip" );
							if ($chip == 'Si') {
							?>	
							<p class="badge bg-success fw-light">Lleva chip</p>
							<?php								
							}
							?>	
			</div>
			<div class="p-3">
				<h2 class="fw-light mb-1"><?php the_title(); ?></h2>
				<p class="fs-4 mb-4 fw-light"><span>Descripción:</span> <?php echo get_the_content(); ?></p>
				<p class="fs-4 mb-4 fw-light"><span>Edad:</span> <?php echo get_field( "edad" ); ?> años</p>
				<p class="fs-4 mb-4 fw-light"><span>Tamaño:</span> <?php echo get_field( "tamano" ); ?></p>
				<p class="fs-4 mb-4 fw-light"><span>Raza:</span> <?php echo get_field( "raza" ); ?></p>
				<p class="fs-4 mb-4 fw-light"><span>Tipo de pelo:</span> <?php echo get_field( "pelo" ); ?></p>
				<p class="fs-4 mb-4 fw-light"><span>Personalidad:</span> <?php echo get_field( "personalidad" ); ?></p>			
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
