<?php

	$nombre = $_POST['nm'];
	$email = $_POST['email'];
	$comentario = $_POST['comment'];

	$secretkey= 'key-0ffc2d48e3302d215e599c5dad2e228c';
	$domain= 'sandbox173ecd3814c942959b6a5d0d5c98225b.mailgun.org';
	$Option['FROM_MAIL']= $email;
	$Option['FROM_NAME']="$nombre";
	$Option['TO_MAIL']="a01701357@itesm.mx";
	$Option['TO_NAME']= "Angelica Tours"; 
	$Option['SUBJECT']="Comentarios Angelica Tours";
	$Option['BODY_TEXT']= $comentario;

	require 'vendor/autoload.php';

	/* IMPORTANTEEEEE Cambiar a true cuando se empiece a usar el servidor */

	$client=new \GuzzleHttp\Client ([
		'verify' => false,
	]);

	$adapter= new \Http\Adapter\Guzzle6\Client($client);

	$mailgun= new \Mailgun\Mailgun($secretkey, $adapter);

	$result = $mailgun->sendMessage("$domain", array(
		'from' => "{$Option[FROM_NAME]} <{$Option[FROM_MAIL]}>",
		'to' => "{$Option[TO_NAME]} <{$Option[TO_MAIL] }>",
		'subject' => $Option['SUBJECT'],
		'text' => $Option['BODY_TEXT'],
	));
	var_dump($result);

?>