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
                                <a class="nav-link" href="profile.php">Редактировать профиль</a>
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
                            <div class="card-header"><h3>Комментарии</h3></div>
                                <div class="card-body">

                                    <?php if (isset($_SESSION['newcomment'])){?>
                                      <div class="alert alert-success" role="alert">
                                        <?php echo $_SESSION['newcomment']; ?>
                                      </div>
                                    <?php unset($_SESSION['newcomment']); }?>


                                      <?php foreach ($comments as $comment): ?>
        								<? if ($comment['hide']==0){?>
                                        <div class="media">
                                          <img src="<?php echo 'img/'.$comment['image']; ?>" class="mr-3" alt="..." width="64" height="64">
                                          <div class="media-body">
                                            <h5 class="mt-0"><?php echo $comment['name']; ?></h5>
                                            <span><small><?php echo date("d/m/Y", strtotime($comment['date'])); ?></small></span>
                                            <p>
                                                <?php echo $comment['text']; ?>
                                            </p>
                                          </div>
                                        </div>
                                        <? } ?>

        							   <?php endforeach; ?>
                                </div>
                        </div>
                    </div>

                    <?php if(isset($_SESSION['authorization']) & $_SESSION['authorization']) {?>
					<div class="col-md-12" style="margin-top: 20px;">
                        <div class="card">
                            <div class="card-header"><h3>Оставить комментарий</h3></div>

                            <div class="card-body">
                                <form action="comments.php" method="post">
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Сообщение</label>
                                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-success">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php } else { ?>
                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="card">
                            <div class="card-header"><h3>Вы не можете оставлять комментарии</h3></div>
								<div class="card-body">
									<li class="nav-item">
	                                <a class="nav-link" href="login.php">Login</a>
	                            	</li>
	                            	<li class="nav-item">
	                                <a class="nav-link" href="register.php">Register</a>
	                            	</li>
                            	</div>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>