<?php
/*
 * Template Name: Single Eventos
 * Template Post Type: eventos
 */

get_header(); ?>
   <!-- Page content-->
        <div class="container mt-5">
            <div class="row">				
                <div class="col-lg-12 card">					
                    <!-- Post content-->
                    <article class="eventos">
                        <figure>
							<?php
								the_post_thumbnail(); 
							?>				
						</figure>
						<!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-normal mb-4"><?php the_title(); ?></h1>                                                      
                         						
                        </header>                        
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-3 mb-4 fw-light"><?php echo get_the_content(); ?></p>	
							<p class="fs-3 mb-4 fw-light"><?php echo get_the_excerpt(); ?></p>	
							<h2 class="fw-light mb-4 mt-3 p-2">Información del evento</h2>
							<p class="fs-4 mb-4 fw-light"><span class="fw-normal">Fecha del evento</span> <?php								
								$date = get_field( "campos_fecha" );
								if($date != ''){
									echo date("d/m/Y", strtotime($date));
								}
								?></p>
							<p class="fs-4 mb-4 fw-light"><span class="fw-normal">Dirección:</span> <?php echo get_field( "campos_direccion" ); ?></p>
							<?php 
							$terms = get_the_terms( $post->ID , 'ubicacion' );
							?>
							 <p class="fs-4 mb-4 fw-light"><span class="fw-normal">Ciudad/es:</span>							
							<?php
							foreach ( $terms as $term ) {
							?>
							 <span class="ciudad"><?php echo $term->name; ?></span>  
							<?php 
							}
							?> 
							</p> 
							<p class="fs-4 mb-4 fw-light"><span class="fw-normal">Precio:</span> <?php echo get_field( "campos_precio" ); ?> €</p>
						</section>
                    </article>                  
                </div>            
            </div>
        </div>
<?php get_footer(); ?>
