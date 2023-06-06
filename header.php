<!DOCTYPE html>
<html>
  <head>	
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>
      <?php bloginfo( 'name' ); ?>
    </title>  
  </head>
  <?php wp_head(); ?>
  <body>
	  <header>	  
		 <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Eleventh navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/wacactus/"><img src="http://localhost/wacactus/wp-content/uploads/2023/06/logo.png" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
         	<?php wp_nav_menu( array(
                'menu' => 'header',
                'theme_location' => 'header-menu',
                'menu_class' => 'nav navbar-nav')  );
			?>
        </div>
      </div>
    </nav>
      </header>
	 
    <div class="container">
