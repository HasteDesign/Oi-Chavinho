<?php
/**
 * @package Chavinho
 * @version 1.0
 */
/*
Plugin Name: Oi Chavinho!
Plugin URI: 
Description: This is not just a plugin, it is the childhood of thousands of people, which over the years grew up watching the Roberto Gómez Bolaños art, which enjoyed themselves and were moved watching his great series Chaves (El Chavo Del 8).
Author: Haste Design
Version: 1.0
Author URI: http://www.hastedesign.com.br
*/

function oi_chavinho_get_phrase() {
	/** These are the phrases from El Chavo Del 8 */
	$phrases = "Isso, isso, isso.
	O que que foi, o que que foi, o que que há!
	Foi sem querer querendo...
	Tá bom, mas não se irrite.
	Ninguém tem paciência comigo...
	Já chegou o disco voador!
	Ai que burro, dá zero pra ele.
	É tudo culpa do professor linguiça!
	Prefiro morrer do que perder a vida.
	Tá, tá, tá, tá, tá!
	Gostaria de entrar e tomar um xícara de café?
	Não existe um mal trabalho, o mal é ter que trabalhar.
	A vingança nunca é plena, mata a alma e a envenena.
	As pessoas boas devem amar seus inimigos.
	Tinha que ser o Chaves de novo!
	Teria sido melhor ir ver o filme do Pelé.
	Eu nunca roubei, e nunca vou roubar de novo.
	Olha ele, olha ele!
	Conta tudo pra sua mãe!
	Eu prefiro evitar a fadiga.
	Esse é de laranja, que parece de limão, mas tem gosto de tamarindo.
	Não se misture com essa gentalha.
	";

	// Here we split it into lines
	$phrases = explode( "\n", $phrases );

	// And then randomly choose a line
	return wptexturize( $phrases[ mt_rand( 0, count( $phrases ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function oi_chavinho() {
	$chosen = oi_chavinho_get_phrase();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'oi_chavinho' );

// We need some CSS to position the paragraph
function chavinho_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'chavinho_css' );

?>