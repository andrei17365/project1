<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comments</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    Project
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <?php if(isset($_SESSION['authorization']) & $_SESSION['authorization']) {?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Комментарии</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="logout.php">Выйти</a>
                            </li>
                            <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                            <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>Профиль пользователя</h3></div>

                        <div class="card-body">
                        <? if (!isset($_SESSION['name_edit_err']) & !isset($_SESSION['email_edit_err']) & !isset($_SESSION['image_edit_err'])){?>
                          <div class="alert alert-success" role="alert">
                            Профиль успешно обновлен
                          </div>
						<? } ?>
                            <form action="edit_profile.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">


										<div class="form-group">
											<? if (isset($_SESSION['name_edit_err'])){ ?>
												<label for="exampleFormControlInput1">Email</label>
                                            	<input type="text" class="form-control is-invalid" name="name" id="exampleFormControlInput1" value="<?php echo $_COOKIE['name_login']; ?>">
                                            	<span class="text text-danger">
                                                	<? echo $_SESSION['name_edit_err'];?>
                                            	</span>
											<? unset($_SESSION['name_edit_err']);} else { ?>

                                            	<label for="exampleFormControlInput1">Name</label>
                                            	<input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="<?php echo $_COOKIE['name_login']; ?>">
											<? } ?>
                                        </div>




                                        <div class="form-group">
                                        	<? if (isset($_SESSION['email_edit_err'])){ ?>
                                            	<label for="exampleFormControlInput1">Email</label>
                                            	<input type="email" class="form-control is-invalid" name="email" id="exampleFormControlInput1" value="<?php echo $_COOKIE['email_login']; ?>">
                                            	<span class="text text-danger">
                                                	<? echo $_SESSION['email_edit_err'];?>
                                            	</span>
                                            	<? unset($_SESSION['email_edit_err']);} else { ?>
                                            	<label for="exampleFormControlInput1">Email</label>
                                            	<input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="<?php echo $_COOKIE['email_login']; ?>">
											<? } ?>
                                        </div>



                                        <div class="form-group">
                                        	<? if (isset($_SESSION['email_edit_err'])){ ?>
											<label for="exampleFormControlInput1">Аватар</label>
											<input type="file" class="form-control is-invalid" name="image" id="exampleFormControlInput1">
											<span class="text text-danger">
                                                	<? echo $_SESSION['image_edit_err'];?>
                                            </span>
                                            <? unset($_SESSION['image_edit_err']);} else { ?>

                                            <label for="exampleFormControlInput1">Аватар</label>
                                            <input type="file" class="form-control" name="image" id="exampleFormControlInput1">
                                            <? } ?>
                                        </div>




                                    </div>
                                    <div class="col-md-4">
                                        <img src="<? echo "img/".$_SESSION['image_login']; ?>" alt="" class="img-fluid">
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn btn-warning">Edit profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="card">
                        <div class="card-header"><h3>Безопасность</h3></div>

                        <div class="card-body">

							<? if ((!isset($_SESSION['current_pass_err'])) & (!isset($_SESSION['new_pass_err'])) & (!isset($_SESSION['new_pass_conf_err']))){?>
                            <div class="alert alert-success" role="alert">
                                Пароль успешно обновлен
                            </div>
							<? } ?>


                            <form action="edit_profile_password.php" method="post">
                                <div class="row">
                                    <div class="col-md-8">


                                        <div class="form-group">
                                        	<? if (isset($_SESSION['current_pass_err'])){ ?>
                                        	<label for="exampleFormControlInput1">Current password</label>
                                            <input type="password" class="form-control is-invalid" name="current" class="form-control" id="exampleFormControlInput1">
                                            <span class="text text-danger">
                                                	<? echo $_SESSION['current_pass_err'];?>
                                            </span>
                                            <? unset($_SESSION['current_pass_err']);} else { ?>

                                            <label for="exampleFormControlInput1">Current password</label>
                                            <input type="password" name="current" class="form-control" id="exampleFormControlInput1">
                                            <? } ?>
                                        </div>



                                        <div class="form-group">
											<? if (isset($_SESSION['new_pass_err'])){ ?>
											<label for="exampleFormControlInput1">New password</label>
                                            <input type="password" class="form-control is-invalid" name="password" class="form-control" id="exampleFormControlInput1">
                                            <span class="text text-danger">
                                                	<? echo $_SESSION['new_pass_err'];?>
                                            </span>
                                            <? unset($_SESSION['new_pass_err']);} else { ?>

                                            <label for="exampleFormControlInput1">New password</label>
                                            <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                                            <? } ?>
                                        </div>



                                        <div class="form-group">
											<? if (isset($_SESSION['new_pass_conf_err'])){ ?>
											<label for="exampleFormControlInput1">Password confirmation</label>
                                            <input type="password" class="form-control is-invalid" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
                                            <span class="text text-danger">
                                                	<? echo $_SESSION['new_pass_conf_err'];?>
                                            </span>
                                            <? unset($_SESSION['new_pass_conf_err']);} else { ?>

                                            <label for="exampleFormControlInput1">Password confirmation</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
                                            <? } ?>
                                        </div>



                                        <button class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>
</body>
</html>
<? var_dump($_COOKIE); ?>