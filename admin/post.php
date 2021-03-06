<?php
define( 'ASAPH_PATH', '../' );
require_once( ASAPH_PATH.'lib/asaph_post.class.php' );

header( 'Content-type: text/html; charset=utf-8' );

$asaphPost = new Asaph_Post();
if( isset($_POST['login']) ) {
	if( $asaphPost->login($_POST['name'], $_POST['pass']) ) {
		include( ASAPH_PATH.'admin/templates/remote-post.html.php' );
	}
	else {
		$loginError = true;
		include( ASAPH_PATH.'admin/templates/remote-login.html.php' );
	}
}
else if( !empty($_POST['post'])){ //} && (!empty($_POST['image']) || !empty($_POST['url'])) ) {
	if( !empty($_POST['image']) ) {
		$status = $asaphPost->postImage( $_POST['image'], $_POST['source'], $_POST['title'], $_POST['description'] );
	}
	else if( !empty($_POST['video']) ) {
		$status = $asaphPost->postVideo( $_POST['video'], $_POST['source'], $_POST['video_type'], $_POST['width'], $_POST['height'], $_POST['thumb'], $_POST['title'], $_POST['description'] );
	}
	else if( !empty($_POST['quote']) ) {
		$status = $asaphPost->postQuote( $_POST['quote'], $_POST['source'], $_POST['speaker'], $_POST['title'], $_POST['description'] );
	}
	else
	{
		$status = $asaphPost->postUrl( $_POST['url'], $_POST['title'], $_POST['description'] );
	}
	echo $status;
	if( $status === true ) {
		include( ASAPH_PATH.'admin/templates/remote-success.html.php' );
	} else {
		include( ASAPH_PATH.'admin/templates/remote-post.html.php' );
	}
} else if( $asaphPost->checkLogin() ) {
	include( ASAPH_PATH.'admin/templates/remote-post.html.php' );
} else {
	include( ASAPH_PATH.'admin/templates/remote-login.html.php' );
}


// Shortcut function to echo request data in templates
function printReqVar( $s ) {
	if( !empty($_POST[$s]) ) {
		echo htmlspecialchars($_POST[$s]);
	} else if( !empty($_GET[$s]) ) {
		echo htmlspecialchars($_GET[$s]);
	}
}
?>