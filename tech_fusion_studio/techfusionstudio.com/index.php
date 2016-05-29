<?php
require_once '../@core/init.php';
if(Input::exists()){
	if(Input::post('send')){
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'name' => array(
					'name' => 'Name',
					'required' => true
				),
				'email' => array(
					'name' => 'Email',
					'required' => true,
					'preg' => 'email'
				),
				'reason' => array(
					'name' => 'Reason',
					'required' => true
				),
				'message' => array(
					'name' => 'Message',
					'required' => true,
				)
			));

			if($validation->passed()) {
				$email = new Email(Input::get('name'), Input::get('email'), Input::get('reason'), Input::get('message'));
			} else {
				 Session::flash('success', $validation->errors());
				 Redirect::to('#contact');
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Tech Fusion Studio</title>

    <!-- Meta/Favicons/Fonts Section ------------------------------------------------------------------------------------------------>
		<?php require '../@includes/tags.php'; ?>
		<link rel="stylesheet" type="text/css" media="screen" href="http://style.techfusionstudio.comm/css/home-style.css">

	</head>
	<body>
		<!-- Header Section ------------------------------------------------------------------------------------------------>
		<?php require '../@includes/header.php'; ?>
		<?php require 'nav.php'; ?>

		<!-- Content Section ------------------------------------------------------------------------------------------------>
		<section class="body-slide" style="background-color: #FFF;">
<?php if(isset($_GET['about'])): ?>
			<!-- About Section ------------------------------------------------------------------------------------------------>
			<?php require 'about.php'; ?>

<?php elseif(isset($_GET['team'])): ?>
			<!-- About Section ------------------------------------------------------------------------------------------------>
			<?php require 'about.php'; ?>

<?php else: ?>
			<!-- Services Section ------------------------------------------------------------------------------------------------>
			<?php require 'services.php'; ?>

<?php endif; ?>
			<!-- Contact Section ------------------------------------------------------------------------------------------------>
			<?php require 'contact.php'; ?>
		</section>
		<!-- Footer ------------------------------------------------------------------------------------------------>
		<?php require '../@includes/footer.php'; ?>
    	<!-- Scripts ------------------------------------------------------------------------------------------------>
		<?php require '../@includes/scripts.php'; ?>
	</body>
</html>
