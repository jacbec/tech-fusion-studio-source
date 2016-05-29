<?php
require_once '../@core/init.php';
DB::getInstance();

if(Input::exists()) {
    if(Input::post('create-profile')) {
        if(Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'name' => 'Username',
                    'required' => true,
                    'min' => 4,
                    'max' => 32,
                    'preg' => 'username',
                    'unique' => 'users'
                ),
                'first_name' => array(
                    'name' => 'First Name',
                    'required' => true,
                    'max' => 45
                ),
                'last_name' => array(
                    'name' => 'Last Name',
                    'required' => true,
                    'max' => 45
                ),
                'email' => array(
                    'name' => 'Email',
                    'required' => true,
                    'max' => 255,
                    'preg' => 'username'
                ),
                'verify_email' => array(
                    'name' => 'Verify Email',
                    'required' => true,
                    'matches' => 'email'
                ),
                'password' => array(
                    'name' => 'Password',
                    'required' => true,
                    'min' => 6
                ),
                'verify_password' => array(
                    'name' => 'Verify Password',
                    'required' => true,
                    'matches' => 'password'
                )
            ));

            if($validation->passed()) {
                $user = new User();
                $salt = Hash::salt(32);
                try {
                    $user->create(array(
                        'username' => Input::get('username'),
                        'first_name' => Input::get('first_name'),
                        'last_name' => Input::get('last_name'),
                        'email' => Input::get('email'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'group' => 1,
                        'joined' => Config::get('date/today')
                    ));
                } catch(Exception $e) {
                    die($e->getMessage());
                }
                Session::flash('success', 'Your profile was successfully created.');
                Redirect::to('http://forums.techfusionstudio.comm/profile.php');
            } else {
                 Session::flash('failed', $validation->errors());
                 Redirect::to('http://forums.techfusionstudio.comm/profile.php?create-profile');
            }
        }
    }

    if(Input::post('login')) {
        if(Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'name' => 'Username',
                    'required' => true
                ),
                'password' => array(
                    'name' => 'Password',
                    'required' => true
                )
            ));

            if($validation->passed()) {
                echo 'passed';
                $user = new User();

                $remember = (Input::get('selected') === 'remember') ? true : false;
                $login = $user->login(Input::get('username'), Input::get('password'), $remember);

                if($login) {
                    //Session::flash('success', '');
                    Redirect::to('http://forums.techfusionstudio.comm/profile.php');
                } else {
                    Session::flash('failed', 'Your username or password was incorrect!');
                    Redirect::to('http://forums.techfusionstudio.comm/profile.php?login');
                }
            } else {
                 Session::flash('failed', $validation->errors());
                 Redirect::to('http://forums.techfusionstudio.comm/profile.php?login');
            }
        }
    }

    if(Input::post('change-username')) {
        if(Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'name' => 'Username',
                    'required' => true,
                    'min' => 4,
                    'max' => 32,
                    'preg' => 'username',
                    'unique' => 'users'
                )
            ));

            if($validation->passed()) {
                $user = new User();
                try {
                    $user->update(array(
                        'username' => Input::get('username')
                    ));

                    //Session::flash('success', '');
                    //Redirect::to();
                } catch(Exception $e) {
                    die($e->getMessage());
                }
            } else {
                 Session::flash('success', $validation->errors());
            }
        }
    }

    if(Input::post('change-email')) {
        if(Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'email' => array(
                    'name' => 'Email',
                    'required' => true,
                    'max' => 255,
                    'preg' => 'username'
                ),
                'verify_email' => array(
                    'name' => 'Verify Email',
                    'required' => true,
                    'matches' => 'email'
                )
            ));

            if($validation->passed()) {
                $user = new User();
                try {
                    $user->update(array(
                        'email' => Input::get('email')
                    ));

                    //Session::flash('success', '');
                    //Redirect::to();
                } catch(Exception $e) {
                    die($e->getMessage());
                }
            } else {
                 Session::flash('success', $validation->errors());
            }
        }
    }

    if(Input::post('change-password')) {
        if(Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'current_password' => array(
                    'name' => 'Current Password',
                    'required' => true,
                    'min' => 6
                ),'new_password' => array(
                    'name' => 'New Password',
                    'required' => true,
                    'min' => 6
                ),
                'verify_new_password' => array(
                    'name' => 'Verify New Password',
                    'required' => true,
                    'matches' => 'new_password'
                )
            ));

            if($validation->passed()) {
                $user = new User();

                if(Hash::make(Input::get('current_password'), $user->date()->salt) !== $user->data()->password) {
                    $errors .= "The current password is incorrect!\n";
                } else {
                    $salt = Hash::salt(32);
                    try {
                        $user->update(array(
                            'password' => Hash::make(Input::get('new_password'), $salt),
                            'salt' => $salt
                        ));

                        //Session::flash('success', '');
                        //Redirect::to();
                    } catch(Exception $e) {
                        die($e->getMessage());
                    }
                }
            } else {
                 $errors .= $validation->errors();
            }
        }
    }

    if(Input::post('')) {
        if(Token::check(Input::get('token'))) {

        }
    }

}
?>
<!DOCTYPE html>
<html>
	<head>
        <title>forums.techfusionstudio.comm | Tech Fusion Studio</title>

    	<!-- Meta/Favicons/Fonts Section ------------------------------------------------------------------------------------------------>
		<?php require '../@includes/tags.php'; ?>
		<link rel="stylesheet" type="text/css" media="screen" href="http://style.techfusionstudio.comm/css/forums-style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="http://style.techfusionstudio.comm/css/profile-style.css">

	</head>
    <body>
    	<!-- Header Section ------------------------------------------------------------------------------------------------>
		<?php require '../@includes/header.php'; ?>
    	<?php require 'nav.php'; ?>

		<!-- Content ------------------------------------------------------------------------------------------------>
		<section class="body-slide" style="background-color: #FFF;">
<?php if(isset($_GET['create-profile'])): ?>
            <section id="create-profile" class="forums container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Create Profile</h2>
                            <?php
                            if(Session::exists('failed')) {
                                echo '<div class="flash flash-forum">' . Session::flash('failed') .'</div>';
                            } else if(Session::exists('success')) {
                                echo '<div class="flash flash-forum">' .Session::flash('success') .'</div>';
                            }
                            ?>
                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form name="create_profile" class="forums-form" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username *" name="username" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" style="display: inline-block">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name *" name="first_name" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: inline-block">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" name="last_name" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" style="display: inline-block">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email *" name="email" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: inline-block">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Verify Email *" name="verify_email" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>


                                    <div class="col-lg-6" style="display: inline-block">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" name="password" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: inline-block">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Verify Password *" name="verify_password" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-lg-12 text-center">
                                        <div class="success"></div>
                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                        <input class="btn btn-xl" type="submit" name="create-profile" value="Create Profile">
                                        <input class="btn btn-xl" type="reset" value="Reset Fields">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

<?php elseif(isset($_GET['login'])): ?>
            <section id="login" class="forums container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Login</h2>
                            <?php
                            if(Session::exists('failed')) {
                                echo '<div class="flash flash-forum">' . Session::flash('failed') .'</div>';
                            } else if(Session::exists('success')) {
                                echo '<div class="flash flash-forum">' .Session::flash('success') .'</div>';
                            }
                            ?>
                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form name="login" class="forums-form" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username *" name="username" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" name="password" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-lg-12 text-center">
                                        <div class="success"></div>
                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                        <input class="btn btn-xl" type="submit" name="login" value="Login">
                                        <!-- <input class="btn btn-xl" type="reset" value="Reset Fields"> -->
                                        <select class="btn btn-xl" name="selected">
                                            <option value="">Don't Remember Me</option>
                                            <option name="remember" value="remember">Remember Me</option>
                                        </select>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

<?php elseif(isset($_GET['users'])): ?>
            <section id="users" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading"></h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>
                </div>
            </section>

<?php else: ?>
    <?php $user = new User(); ?>
        <?php if($user->isLoggedin()): ?>
            <section id="profile" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">User Profile</h2>
                            <?php
                            if(Session::exists('failed')) {
                                echo '<div class="flash flash-forum">' . Session::flash('failed') .'</div>';
                            } else if(Session::exists('success')) {
                                echo '<div class="flash flash-forum">' .Session::flash('success') .'</div>';
                            }
                            ?>
                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-sm-3">
                                <div class="text-center"> <!--<img class="img-responsive" src="http://style.techfusionstudio.comm/img/profile.png">--></div>
                                <div class="panel">
                                    <div class="row">
                                        <div class="col-xs-12"><a class="btn btn-xs btn-block no-br"><?php ?></a></div>
                                        <div class="col-xs-12"><a class="btn btn-xs btn-block no-br"><?php ?></a></div>
                                    </div>
                                    <h2 class="font-semibold mgbt-xs-5"><?php echo $user->data()->first_name .' ' .$user->data()->last_name; ?></h2>
                                    <h4><?php ?></h4>
                                    <p><?php ?></p>

                                    <div class="mgtp-20">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td style="width:60%;">Status</td>
                                                    <td><?php  ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Member Since</td>
                                                    <td><?php  ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- panel widget -->

                                <!-- <div class="panel">
                                    <h3 class="pd-20 mgbt-xs-0"><i class="fa fa-users mgr-10"></i>Friends</h3>
                                    <div class="content-grid column-xs-2 column-sm-3 height-xs-auto mgbt-xs-20">
                                        <div>
                                            <ul class="list-wrapper">
                                                <li><a href="#"></a></li>
                                                <li class="warning"><a href="#"></a></li>
                                                <li> <a href="#"></a></li>
                                                <li> <a href="#"></a></li>
                                                <li> <a href="#"></a></li>
                                                <li> <a href="#"></a></li>
                                                <li> <a href="#"></a></li>
                                                <li> <a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="closing text-center" style=""> <a href="#">See All Friends<i class="fa fa-angle-double-right prepend-icon"></i></a> </div>
                                </div> -->
                            </div>

                            <div class="col-sm-9">
                                <div class="tabs widget">
                                    <ul class="nav nav-tabs">
                                        <li class="active"> <a data-toggle="tab" href="#profile-tab"> Profile <span class="menu-active"></span> </a></li>
                                        <li> <a data-toggle="tab" href="#projects-tab"> Projects <span class="menu-active"></span> </a></li>
                                        <li> <a data-toggle="tab" href="#photos-tab"> Photos <span class="menu-active"></span> </a></li>
                                        <li> <a data-toggle="tab" href="#friends-tab"> Friends <span class="menu-active"></span> </a></li>
                                        <li> <a data-toggle="tab" href="#groups-tab"> Groups <span class="menu-active"></span> </a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="profile-tab" class="tab-pane active">
                                            <div class="pd-20">
                                                <a class="btn btn-xs float-right"><i class="fa fa-pencil append-icon"></i> Edit </a>
                                                <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="fa fa-user fa-2x mgr-10"></i> ABOUT</h3>
                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="row mgbt-xs-0">
                                                            <label class="col-xs-5 control-label">First Name:</label>
                                                            <div class="col-xs-7 controls"><?php echo $user->data()->first_name; ?></div>
                                                            <!-- col-sm-10 -->
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="row mgbt-xs-0">
                                                            <label class="col-xs-5 control-label">Last Name:</label>
                                                            <div class="col-xs-7 controls"><?php echo $user->data()->last_name; ?></div>
                                                            <!-- col-sm-10 -->
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="row mgbt-xs-0">
                                                            <label class="col-xs-5 control-label">Username:</label>
                                                            <div class="col-xs-7 controls"><?php echo $user->data()->username; ?></div>
                                                            <!-- col-sm-10 -->
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="row mgbt-xs-0">
                                                            <label class="col-xs-5 control-label">Email:</label>
                                                            <div class="col-xs-7 controls"><?php echo $user->data()->email; ?></div>
                                                            <!-- col-sm-10 -->
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="row mgbt-xs-0">
                                                            <label class="col-xs-5 control-label">City:</label>
                                                            <div class="col-xs-7 controls"><?php echo $user->data()->city; ?></div>
                                                            <!-- col-sm-10 -->
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="row mgbt-xs-0">
                                                            <label class="col-xs-5 control-label">Country:</label>
                                                            <div class="col-xs-7 controls"><?php echo $user->data()->country; ?></div>
                                                            <!-- col-sm-10 -->
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="row mgbt-xs-0">
                                                            <label class="col-xs-5 control-label">Birthday:</label>
                                                            <div class="col-xs-7 controls"><?php echo $user->data()->birthday; ?></div>
                                                            <!-- col-sm-10 -->
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="row mgbt-xs-0">
                                                            <label class="col-xs-5 control-label">Phone:</label>
                                                            <div class="col-xs-7 controls"><?php echo '1+' .$user->data()->phone; ?></div>
                                                            <!-- col-sm-10 -->
                                                        </div>
                                                    </div>

                                                </div>

                                                <hr class="primary">

                                                <div class="row">
                                                    <div class="col-sm-7 mgbt-xs-20">
                                                        <h3 class="mgbt-xs-15"><i class="fa mgr-10 "></i> </h3>
                                                        <div class="content-list content-menu">
                                                            <ul class="list-wrapper">
                                                                <li class="mgbt-xs-10"></li>
                                                                <li class="mgbt-xs-10"></li>
                                                                <li class="mgbt-xs-10"></li>
                                                                <li class="mgbt-xs-10"></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-5">
                                                        <h3 class="mgbt-xs-15"><i class="fa mgr-10 "></i> </h3>
                                                        <div class="content-list content-menu">
                                                            <ul class="list-wrapper">
                                                                <li class="mgbt-xs-10"></li>
                                                                <li class="mgbt-xs-10"></li>
                                                                <li class="mgbt-xs-10"></li>
                                                                <li class="mgbt-xs-10"></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- row -->
                                            </div>
                                        </div>

                                        <div id="projects-tab" class="tab-pane">
                                        </div>

                                        <div id="photos-tab" class="tab-pane">
                                        </div>

                                        <div id="friends-tab" class="tab-pane">
                                        </div>  <!-- photos tab -->

                                        <div id="groups-tab" class="tab-pane">
                                        </div>  <!-- groups tab -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php else: ?>
    <?php endif; ?>
<?php endif; ?>
		</section>
    	<!-- Footer ------------------------------------------------------------------------------------------------>
		<?php require '../@includes/footer.php'; ?>
    	<!-- Scripts ------------------------------------------------------------------------------------------------>
		<?php require '../@includes/scripts.php'; ?>
		<script src="http://style.techfusionstudio.comm/js/forum-toggle.js"></script>
	</body>
</html>
