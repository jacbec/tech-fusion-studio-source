<?php

class Email 
{
    private $name;
	private $email;
	private $reason;
	private $message;

    function __construct($name, $email, $reason, $message) 
	{
        require 'PHPMailer/class.phpmailer.php';
	    require 'PHPMailer/class.pop3.php';
        require 'PHPMailer/class.smtp.php';

      	$EMAIL = new PHPMailer;

      	$EMAIL->isSMTP();
      	$EMAIL->SMTPAuth = true;
        //$EMAIL->SMTPDebug = 2;

        $EMAIL->Host = 'your.mail.host.com';
      	$EMAIL->Username = 'name';
      	$EMAIL->Password = 'password';
      	$EMAIL->SMTPSecure = 'tls';
      	$EMAIL->Port = 587;

        //Send Email
        $EMAIL->Subject = "Contact form submission: $reason";
        $EMAIL->setFrom('contact@techfusionstudio.comm', $name);
        $EMAIL->addReplyTo($email, $name);
      	$EMAIL->addAddress('contact@techfusionstudio.comm' , '');

      	$EMAIL->isHTML(true);

      	$EMAIL->Body = $message;
      	$EMAIL->AltBody = $message;

     	$EMAIL->WordWrap = 50;

	    if(!$EMAIL->send())	
		{
		    Session::flash('failed', 'Your Email was not sent.<br>Please try again later.');
            Redirect::to('#contact');
	    } 
		else 
		{
            Session::flash('success', 'Your Email was sent successfully<br>We will get back to you as soon as possible.');
            Redirect::to('#contact');
	    }
    }
}
?>
