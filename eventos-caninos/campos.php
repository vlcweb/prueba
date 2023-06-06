<div class="campos_form">    
    <style>
        .campos_form {
            display: grid;            
        }		
		.campos_fields input{
			width:100%;
		}
    </style>
    <div class="campos_fields">
        <label for="campos_fecha">Fecha del evento</label><br>
        </div>
        <input id="campos_fecha" name="campos_fecha" type="date" value="<?php echo esc_attr(get_post_meta(get_the_ID(), key:'campos_fecha',single:true)) ?>">        
    <div class="campos_fields">
        <label for="campos_precio">Precio (€)</label><br>
        <input id="campos_precio" name="campos_precio" type="number" value="<?php echo esc_attr(get_post_meta(get_the_ID(), key:'campos_precio',single:true)) ?>">
    </div>
	<div class="campos_fields">
        <label for="campos_direccion">Dirección</label><br>
        <input id="campos_direccion" name="campos_direccion" type="text" value="<?php echo esc_attr(get_post_meta(get_the_ID(), key:'campos_direccion',single:true)) ?>">
    </div>
</div>