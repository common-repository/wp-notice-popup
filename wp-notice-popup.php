<?php
/*
Plugin Name: WP Notice Popup
Plugin URI: http://www.nexxuz.com
Description: Agrega Noticias personalizadas a tu web
Version: 1.1
Author: Jose Daniel Canchila
Author URI: http://www.nexxuz.com

*/

/*  Copyright 2009 Jose Daniel Canchila - nexxuz.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

 
*/

// Hook for adding admin menus
add_action('admin_menu', 'WP_Notice_Popup_add_pages');

// action function for above hook
function WP_Notice_Popup_add_pages() {
    add_options_page('WP_Notice_Popup', 'WP_Notice_Popup', 'administrator', 'WP_Notice_Popup', 'WP_Notice_Popup_options_page');
}

// WP_Notice_Popup_options_page() displays the page content for the Test Options submenu
function WP_Notice_Popup_options_page() {

    // variables for the field and option names 
    $opt_name = 'mt_op_header_notice';
    $opt_name_2 = 'mt_op_noticia';
    $opt_name_4 = 'mt_op_px';
    $opt_name_5 = 'mt_op_py';
    $opt_name_6 = 'mt_op_unidx';
    $opt_name_7 = 'mt_op_unidy';
    $opt_name_8 = 'mt_op_show_widget';
	$opt_name_9 = 'mt_op_show_notice';
	$opt_name_10 = 'mt_op_show_icon';
	$opt_name_11 = 'mt_op_show_js';
	$opt_name_12 = 'mt_op_show_creditos';
	
    $hidden_field_name = 'mt_op_submit_hidden';
    $data_field_name = 'mt_op_header_notice';
    $data_field_name_2 = 'mt_op_noticia';
    $data_field_name_4 = 'mt_op_px';
    $data_field_name_5 = 'mt_op_py';
    $data_field_name_6 = 'mt_op_unidx';
    $data_field_name_7 = 'mt_op_unidy';
    $data_field_name_8 = 'mt_op_show_widget';
	$data_field_name_9 = 'mt_op_show_notice';
	$data_field_name_10 = 'mt_op_show_icon';
	$data_field_name_11 = 'mt_op_show_js';
	$data_field_name_12 = 'mt_op_show_creditos';
	

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
    $opt_val_2 = get_option( $opt_name_2 );
    $opt_val_4 = get_option( $opt_name_4 );
    $opt_val_5 = get_option( $opt_name_5 );
    $opt_val_6 = get_option( $opt_name_6 );
    $opt_val_7 = get_option( $opt_name_7 );
    $opt_val_8 = get_option( $opt_name_8 );
	$opt_val_9 = get_option( $opt_name_9 );
	$opt_val_10 = get_option( $opt_name_10 );
	$opt_val_11 = get_option( $opt_name_11 );
	$opt_val_12 = get_option( $opt_name_12 );
	
    
$blog_url=get_bloginfo('url');

if (!$_POST['feedback']=='') {
$my_email1="jodacame@gmail.com";
$plugin_name="WP_Notice_Popup";
$blog_url_feedback=get_bloginfo('url');
$user_email=$_POST['email'];
$subject=$_POST['subject'];
$feedback_feedback=$_POST['feedback'];
$headers1 = "From: jodacame@gmail.com";
$emailsubject1=$plugin_name." - ".$subject;
$emailmessage1="Blog: $blog_url_feedback\n\nUser E-Mail: $user_email\n\nMessage: $feedback_feedback";
mail($my_email1,$emailsubject1,$emailmessage1,$headers1);
?>
<div class="updated"><p><strong><?php _e('Correo Enviado!', 'mt_trans_domain' ); ?></strong></p></div>
<?php
}

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( $_POST[ $hidden_field_name ] == 'Y' ) {
        // CARGA LAS VARIABLES
        $opt_val = $_POST[ $data_field_name ]; //TITULO WIDGET
        $opt_val_2 = $_POST[ $data_field_name_2 ];
		$opt_val_4 = $_POST[ $data_field_name_4 ]; 
     	$opt_val_5 = $_POST[ $data_field_name_5 ]; 
        $opt_val_6 = $_POST[$data_field_name_6];
        $opt_val_7 = $_POST[$data_field_name_7];
 		$opt_val_9 = $_POST[$data_field_name_9];
		$opt_val_8 = $_POST[$data_field_name_8];
		$opt_val_10 = $_POST[$data_field_name_10];
		$opt_val_11 = $_POST[$data_field_name_11];
		$opt_val_12 = $_POST[$data_field_name_12];
		
        // GUARDA LOS CAMBIOS
        update_option( $opt_name, $opt_val );
        update_option( $opt_name_2, $opt_val_2 );
        update_option( $opt_name_5, $opt_val_5 );
		update_option( $opt_name_4, $opt_val_4 );
        update_option( $opt_name_6, $opt_val_6 );  
        update_option( $opt_name_7, $opt_val_7 ); 
		update_option( $opt_name_9, $opt_val_9 );
		update_option( $opt_name_8, $opt_val_8 );
		update_option( $opt_name_10, $opt_val_10 );
		update_option( $opt_name_11, $opt_val_11 );
		update_option( $opt_name_12, $opt_val_12 );

        // MUESTRA MENSAJE QUE LOS CAMBIOS SE REALIZARON

?>
<div class="updated"><p><strong><?php _e('Los cambios fueron realizados', 'mt_trans_domain' ); ?></strong></p></div>
<?php

    }

    // Muestra las opciones del plugin

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'WP_Notice_Popup Plugin Options', 'mt_trans_domain' ) . "</h2>";

    // Opciones del formulario
    
    $change4 = get_option("mt_op_show_widget");
    $change5 = get_option("mt_op_show_notice");
	$change6 = get_option("mt_op_show_js");
	$change7 = get_option("mt_op_show_creditos");




if ($change4=="Yes" || $change4=="") {
$change4="checked";
$change41="";
} else {
$change4="";
$change41="checked";
}

if ($change5=="Yes" || $change5=="") {
$change5="checked";
$change51="";
} else {
$change5="";
$change51="checked";
}
if ($change6=="Yes" || $change6=="") {
$change12="checked";
$change612="";
} else {
$change12="";
$change612="checked";
}
if ($change7=="Yes" || $change7=="") {
$change11="checked";
$change511="";
} else {
$change11="";
$change511="checked";
}




    ?>
	


<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
<table>
	<tr>
		<td colspan="2">
			<p><?php _e("Titulo Widget", 'mt_trans_domain' ); ?> 
			<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="25">
			</p><hr />
		</td>
	</tr>
	<tr>
		<td colspan="2" valign="top">
			<?php _e("Noticia:", 'mt_trans_domain' ); ?> <br>
			<textarea   cols="100" name="<?php echo $data_field_name_2; ?>"><?php echo $opt_val_2; ?></textarea>
			<hr />
		</td>
	</tr>
	<tr>
	<td colspan="2">
				<p><?php _e("Icono del a Noticia", 'mt_trans_domain' ); ?> 
				<br><br>
			<input type="radio" name="<?php echo $data_field_name_10; ?>" checked value="icon1"><img src="<? echo $blog_url; ?>/wp-content/plugins/wp-notice-popup/images/icon1.png" align="absmiddle">
			<input type="radio" name="<?php echo $data_field_name_10; ?>" value="icon2"><img src="<? echo $blog_url; ?>/wp-content/plugins/wp-notice-popup/images/icon2.png" align="absmiddle">
			<input type="radio" name="<?php echo $data_field_name_10; ?>" value="icon3"><img src="<? echo $blog_url; ?>/wp-content/plugins/wp-notice-popup/images/icon3.png" align="absmiddle">
			<input type="radio" name="<?php echo $data_field_name_10; ?>" value="icon4"><img src="<? echo $blog_url; ?>/wp-content/plugins/wp-notice-popup/images/icon4.png" align="absmiddle">
			<input type="radio" name="<?php echo $data_field_name_10; ?>" value="icon5"><img src="<? echo $blog_url; ?>/wp-content/plugins/wp-notice-popup/images/icon5.png" align="absmiddle">
			<input type="radio" name="<?php echo $data_field_name_10; ?>" value="icon6"><img src="<? echo $blog_url; ?>/wp-content/plugins/wp-notice-popup/images/icon6.png" align="absmiddle">
			<input type="radio" name="<?php echo $data_field_name_10; ?>" value="icon7"><img src="<? echo $blog_url; ?>/wp-content/plugins/wp-notice-popup/images/icon7.png" align="absmiddle">
			
			
			</p><hr />
		</td>
	
	</td>
	</tr>
	<tr>
		<td colspan="2">
			<p><?php _e("Coordenadas", 'mt_trans_domain' ); ?>  
			<?php _e("X:", 'mt_trans_domain' ); ?> <input type="text" maxlength="3" name="<?php echo $data_field_name_4; ?>" value="<?php echo $opt_val_4; ?>" size="3">
			<select name="<?php echo $data_field_name_6; ?>">
			<option value="px" selected>px</option>
			</select>
			<?php _e("Y:", 'mt_trans_domain' ); ?> <input type="text" maxlength="3" name="<?php echo $data_field_name_5; ?>" value="<?php echo $opt_val_5; ?>" size="3">
				<select name="<?php echo $data_field_name_7; ?>">
			<option value="px" selected>px</option>
			</select>
			</p><hr />
		</td>
	</tr>
	</td></tr><tr>
		<td>
			<!-- Boton 2.0-->
			<p><?php _e("Widget", 'mt_trans_domain' ); ?> 
			<select name="<?php echo $data_field_name_8; ?>">
			<option value="Yes" selected>Mostrar</option>
			<option value="No">Ocultar</option>
			</select>
			</p><hr />
		</td>
		<td>
				<p><?php _e("Noticia", 'mt_trans_domain' ); ?> 
			<select name="<?php echo $data_field_name_9; ?>">
			<option value="Yes" selected>Mostrar</option>
			<option value="No">Ocultar</option>
			</select>
			</p><hr />
		</td>
	</tr>
	<tr>
		<td>
			<p><?php _e("Habilitar Ver/Ocultar", 'mt_trans_domain' ); ?> 
			<input type="radio" name="<?php echo $data_field_name_11; ?>" value="Yes" <?php echo $change12; ?>>Si
			<input type="radio" name="<?php echo $data_field_name_11; ?>" value="No" <?php echo $change612; ?>>No
			</p><hr />
		</td>
		<td>
			<p><?php _e("Mostrar Creditos", 'mt_trans_domain' ); ?> 
			<input type="radio" name="<?php echo $data_field_name_12; ?>" value="Yes" <?php echo $change11; ?>>Si
			<input type="radio" name="<?php echo $data_field_name_12; ?>" value="No" <?php echo $change511; ?> id="Si quieres que otros usuarios usen este plugin. Por favor no desactives esta opcion." onClick="alert(id)">No
			</p><hr />
		</td>
	</tr>
	<tr>
	<td>
	Tu aporte es muy valioso para el desarrollo de nuevos proyectos.
	<br>
	<b>Muchas Gracias por tu colaboración.</b><br><br>
	<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=10644953"><img src="https://www.paypalobjects.com/WEBSCR-600-20091209-1/es_ES/ES/i/btn/x-click-butcc-donate.gif"></a>
	
	</td>
	</tr>
	
	</table>
	<p class="submit">
	<input type="submit" name="Submit" value="<?php _e('Guardar Cambios', 'mt_trans_domain' ) ?>" />
</p><hr />

</form>
<h3>Contacto</h3>
<form name="form2" method="post" action="">
<table>
	<tr>
		<td><p><?php _e("E-Mail (Optional):", 'mt_trans_domain' ); ?>  </td><td><input type="text" name="email" /></p></td>
	</tr>
	<tr>
		<td> <p><?php _e("Asunto:", 'mt_trans_domain' ); ?></td><td><input type="text" name="subject" /></p></td>
	</tr>
	<tr>
		<td><p><?php _e("Comentario:", 'mt_trans_domain' ); ?> </td><td> <textarea name="feedback"></textarea> </p></td>
	</tr>
</table>


<p class="submit">
<input type="submit" name="submit" value="<?php _e('Enviar', 'mt_trans_domain' ) ?>" />
</p><hr />
</form>
</div>
<?php
}

// Inicia el widget
function show_WP_Notice_PopupX($args) {

extract($args);

$option_header=get_option("mt_op_header_notice");
$option_noticia=get_option("mt_op_noticia");
$option_px=get_option("mt_op_px");
$option_py=get_option("mt_op_py");
$option_unidx=get_option("mt_op_unidx");
$option_unidy=get_option("mt_op_unidy");
$option_show_widget=get_option("mt_op_show_widget");
$option_show_notice=get_option("mt_op_show_notice");
$option_show_js=get_option("mt_op_show_js");
$option_show_creditos=get_option("mt_op_show_creditos");
$option_show_icon=get_option("mt_op_show_icon");





if ($option_header=="") {
$option_header="Notice";
}

if ($option_noticia=="") {
$option_noticia="Debes configurar el plugin";
}

if ($option_px=="") {
$option_px="50";
}

if ($option_py=="") {
$option_py="50";
}

if ($option_unidx=="") {
$option_unidx="px";
}

if ($option_unidy=="") {
$option_unidy="px";
}

if ($option_show_widget=="") {
$option_show_widget="No";
}

if ($option_show_notice=="") {
$option_show_notice="No";
}
if ($option_show_js=="") {
$option_show_js="No";
}
if ($option_show_creditos=="") {
$option_show_creditos="Yes";
}


$blog_url=get_bloginfo('url');

if ($option_javascript=="Yes") {
echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/javascript.js"></script>';
echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/javascript2.js"></script>';
}
if ($option_show_notice=="Yes"){
if (is_home()){ 

 
   
   echo '<link type="text/css" href="'.$blog_url.'/wp-content/plugins/wp-notice-popup/themes/base/ui.all.css" rel="stylesheet" />';
    echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/javascript.js"></script>';
     echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/ui/ui.core.js"></script>';
      echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/ui/ui.draggable.js"></script>';
       echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/ui/ui.resizable.js"></script>';
        echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/ui/ui.dialog.js"></script>';
         echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/external/bgiframe/jquery.bgiframe.js"></script>';
          echo '<script type="text/javascript" src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/external/bgiframe/jquery.bgiframe.js"></script>';
           echo '<link type="text/css" href="'.$blog_url.'/wp-content/plugins/wp-notice-popup/demos.css" rel="stylesheet" />';
    
    
	?>
	
	
	
<script type="text/javascript">
	$(function() {
		$("#dialog").dialog({
			position: [<? echo $option_px; ?>, <? echo $option_py; ?>],
			bgiframe: true,
			modal: false,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
		});
	});
</script>


<div id="dialog" title="<? echo $option_header; ?>">
	<p>
	<?	echo '<br><img  src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/images/'. $option_show_icon.'.png"  style="padding:5px" align="left" caption="X">'; ?>
	<? echo $option_noticia;  ?>
</div>




<?
}

}
// Inicia el widget 2
// SI QUEREMOS MOSTRAR EL WIDGET

if ($option_show_widget=="Yes") {
	if ($option_show_js=="Yes") { 
		

		echo $before_title.'<a href="javascript:animatedcollapse.toggle('."'contenido_noticia'".')" ><img  src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/images/show.png" caption="X" align="absmiddle"></a>&nbsp;'.$option_header.$after_title.$before_widget;

	
		}else{
echo $before_title.$option_header.$after_title.$before_widget;
}
?>
<script type="text/javascript">
animatedcollapse.ontoggle=function($, divobj, state){ //Animacion
}
animatedcollapse.init()
animatedcollapse.addDiv('contenido_noticia', 'fade=1')
</script>
<div id="contenido_noticia" align="center">
<? 
echo '<br><img  src="'.$blog_url.'/wp-content/plugins/wp-notice-popup/images/'. $option_show_icon.'.png" caption="Noticia"><br><br>';
echo $option_noticia; 

	if ($option_show_creditos=="Yes") {
	echo '<br><br><a href="http://nexxuz.com">>></a>'; 
	}


?>


</div>
<?




echo $after_widget;
// Finaliza widget
} //FIN MOSTRAR WIDGET
?>

<?php
}

function init_WP_Notice_PopupX_widget() {
register_sidebar_widget("WP_Notice_Popup", "show_WP_Notice_PopupX");
}

add_action("plugins_loaded", "init_WP_Notice_PopupX_widget");

?>
