<?php
require_once '../@core/init.php';
DB::getInstance();

if(Input::exists())
{
    if(Input::post('create-topic'))
    {
        if(Token::check(Input::get('token')) && Session::get('page') !== '')
        {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'topic_name' => array(
                    'name' => 'Topic Name',
                    'required' => true
                ),
                'topic_body' => array(
                    'name' => 'Topic Body',
                    'required' => true
                )
            ));

            if($validation->passed())
            {
                Session::flash('success', 'Your profile was successfully created.');
                Redirect::to('http://forums.techfusionstudio.comm/');
            }
            else
            {
                Session::flash('failed', $validation->errors());
                Redirect::to('http://forums.techfusionstudio.comm/?create-topic');
            }
        }
    }

    if(Input::post(''))
    {
        if(Token::check(Input::get('token')))
        {
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

</head>
<body>
    <!-- Header Section ------------------------------------------------------------------------------------------------>
    <?php require '../@includes/header.php'; ?>
    <?php require 'nav.php'; ?>

    <!-- Content ------------------------------------------------------------------------------------------------>
    <section class="body-slide" style="background-color: #FFF;">
        <?php if(isset($_GET['create-topic'])): ?>
            <section id="create-topic" class="forums container-fluid" style="padding: 50px 0px 175px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Create Topic</h2>
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
                            <form name="create_topic" class="forums-form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Topic Name *" name="topic_name" >
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Topic Body *" name="topic_body" ></textarea>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <div class="success"></div>
                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                        <input class="btn btn-xl" type="reset" value="Reset Fields">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['news'])): ?>
            <?php Session::set('page', 'news') ?>
            <section id="news" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Tech Fusion Studio News</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">News Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>
                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['updates'])): ?>
            <?php Session::set('page', 'updates') ?>
            <section id="updates" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Tech Fusion Studio Updates</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Update Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['projects'])): ?>
            <?php Session::set('page', 'projects') ?>
            <section id="projects" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Tech Fusion Studio Projects</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Projects Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['random'])): ?>
            <?php Session::set('page', 'random') ?>
            <section id="random" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Tech Fusion Studio Random</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Random Discussions Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Random Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['websites'])): ?>
            <?php Session::set('page', 'websites') ?>
            <section id="websites" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Need Help With Websites</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Websites Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['apps'])): ?>
            <?php Session::set('page', 'apps') ?>
            <section id="apps" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Need Help With Apps</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Apps Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['pcs'])): ?>
            <?php Session::set('page', 'pcs') ?>
            <section id="pcs" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Need Help With PCs</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">PCs Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['servers'])): ?>
            <?php Session::set('page', 'servers') ?>
            <section id="servers" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Need Help With Servers</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Servers Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['networks'])): ?>
            <?php Session::set('page', 'networks') ?>
            <section id="networks" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Need Help With Networks</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Networks Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['off-topic'])): ?>
            <?php Session::set('page', 'off-topic') ?>
            <section id="general" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Off-Topic Discussions</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Stickies</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3">Off-Topic Discussions</th>
                                        <th>Posts</th>
                                        <th>Last Post</a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php $user = new User(); if($user->isLoggedin()):?>
                			<section id="create-topic" class="forums container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="topic_reply" class="forums-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div class="success"></div>
                                                        <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                                        <input class="btn btn-xl" type="submit" name="create-topic" value="Create Topic">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php endif;?>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php elseif(isset($_GET['stream'])): ?>
            <section id="stream" class="container-fluid" style="padding: 50px 0px 50px 0px;">
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
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="3"></th>
                                        <th></th>
                                        <th><a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>

                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>

        <?php else: ?>
            <?php Session::set('page', '') ?>
            <section id="forums" class="container-fluid" style="padding: 50px 0px 50px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Tech Fusion Studio Forums</h2>

                            <hr class="primary">
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="2">Tech Fusion Studio Discussions</th>
                                        <th>Topics</th>
                                        <th>Posts</th>
                                        <th>Last Post<a><i class="fa fa-angle-right float-right forum-toggle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?news">Tech Fusion Studio News</a></a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?updates">Tech Fusion Studio Updates</a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?projects">Tech Fusion Studio Projects</a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?random">Tech Fusion Studio Random</a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="2">Need Help Discussions</th>
                                        <th>Topics</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?websites">Need Help With Websites</a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?apps">Need Help With Apps</a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?pcs">Need Help With PCs</a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?servers">Need Help With Servers</a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?networks">Need Help With Networks</a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <table class="table">
                                <thead class="top-label">
                                    <tr>
                                        <th colspan="2">Off-Topic Discussions</th>
                                        <th>Topics</th>
                                        <th>Posts</th>
                                        <th>Last Post</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    <tr>
                                        <td><span class="fa-stack fa-1x float-left"><i class="fa fa-square fa-stack-2x text-primary"></i><i class="fa fa-comments fa-stack-1x fa-inverse"></i></span></td>
                                        <td><a href="?off-topic">Off-Topic</a><p class="text-muted">Text wil go here. Just not too sure as of now.</p></td>
                                        <td><?php ?></td>
                                        <td><?php ?></td>
                                        <td><div><?php ?></div><div><?php ?></div></td>
                                    </tr>
                                </tbody>
                                <tfoot class="bottom-label">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php require 'forums-addon.php'; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </section>
    <!-- Footer ------------------------------------------------------------------------------------------------>
    <?php require '../@includes/footer.php'; ?>
    <!-- Scripts ------------------------------------------------------------------------------------------------>
    <?php require '../@includes/scripts.php'; ?>
    <script src="http://style.techfusionstudio.comm/js/forum-toggle.js"></script>
</body>
</html>
