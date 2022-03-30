<!DOCTYPE html>
<?php session_start() ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <?php
    // if(isset($_POST)){
    //     $firstname = $_POST['firstname'];
    //     $lastname = $_POST['lastname'];
    //     $eMail = $_POST['mail'];
    //     $password = $_POST['password'];
    // }else{
    //     $firstname='';
    //     $lastname ='';
    //     $eMail ='';
    //     $password ='';
    // }
    // ?>
</head>
<body>
<nav class="navbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="../php/index.php" class="nav-link" >
                <svg id="App-logo" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="futbol"
                     class="svg-inline--fa fa-futbol" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 512 512">
                    <path fill="currentColor"
                          d="M177.1 228.6L207.9 320h96.5l29.62-91.38L256 172.1L177.1 228.6zM255.1 0C114.6 0 .0001 114.6 .0001 256S114.6 512 256 512s255.1-114.6 255.1-255.1S397.4 0 255.1 0zM416.6 360.9l-85.4-1.297l-25.15 81.59C290.1 445.5 273.4 448 256 448s-34.09-2.523-50.09-6.859L180.8 359.6l-85.4 1.297c-18.12-27.66-29.15-60.27-30.88-95.31L134.3 216.4L106.6 135.6c21.16-26.21 49.09-46.61 81.06-58.84L256 128l68.29-51.22c31.98 12.23 59.9 32.64 81.06 58.84L377.7 216.4l69.78 49.1C445.8 300.6 434.8 333.2 416.6 360.9z"></path>
                </svg>
                <span class="link-text logo-text">FootBall Ligue</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sitemap"
                     class="svg-inline--fa fa-sitemap" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 640 512">
                    <path fill="currentColor"
                          d="M128 352H32c-17.62 0-32 14.38-32 32v96c0 17.62 14.38 32 32 32h96c17.62 0 32-14.38 32-32v-96C160 366.4 145.6 352 128 352zM104 272h192V320h48V272h192V320h48V262.4C584 241.3 566.8 224 545.6 224H344V160H384c17.62 0 32-14.38 32-32V32c0-17.62-14.38-32-32-32H256C238.4 0 224 14.38 224 32v96c0 17.62 14.38 32 32 32h40v64H94.38C73.25 224 56 241.3 56 262.4V320h48V272zM368 352h-96c-17.62 0-32 14.38-32 32v96c0 17.62 14.38 32 32 32h96c17.62 0 32-14.38 32-32v-96C400 366.4 385.6 352 368 352zM608 352h-96c-17.62 0-32 14.38-32 32v96c0 17.62 14.38 32 32 32h96c17.62 0 32-14.38 32-32v-96C640 366.4 625.6 352 608 352z"></path>
                </svg>
                <span class="link-text logo-text">Clubs</span>
            </a>
        </li>
        <li class="nav-item">
            <a <?php if (isset($_SESSION['id'])){ ?>href="../php/account.php" <?php } else { ?> href="#popup-two" <?php } ?>
               class="nav-link">
                <?php if (!isset($_SESSION['id']) || $_SESSION['image'] == null) { ?>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user"
                         class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 448 512">
                        <path fill="currentColor"
                              d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                    </svg><?php }else{ ?> <img class="imgNav" src="<?= '../../'.$_SESSION['image'] ?>" height="80" width="80"> <?php } ?>
                <span class="link-text logo-text">Your account</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="../php/article.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="newspaper" class="svg-inline--fa fa-newspaper fa-w-18" role="img" viewBox="0 0 576 512"><path fill="currentColor" d="M552 64H88c-13.255 0-24 10.745-24 24v8H24c-13.255 0-24 10.745-24 24v272c0 30.928 25.072 56 56 56h472c26.51 0 48-21.49 48-48V88c0-13.255-10.745-24-24-24zM56 400a8 8 0 0 1-8-8V144h16v248a8 8 0 0 1-8 8zm236-16H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm-208-96H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm0-96H140c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h360c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12z"/></svg>
                <span class="link-text logo-text">Article</span>
            </a>
        </li>
        <?php if (isset($_SESSION['id'])) { ?>
            <li class="nav-item">
                <a href="../../backend/include/logout.inc.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas"
                         data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img"
                         viewBox="0 0 512 512">
                        <path fill="currentColor"
                              d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/>
                    </svg>
                    <span class="link-text logo-text">Logout</span>
                </a>
            </li>

        <?php } else {

        } ?>
        <li class="nav-item">
            <a href="../php/QnA.php" class="nav-link">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="question"
                     class="svg-inline--fa fa-question fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 384 512">
                    <path fill="currentColor"
                          d="M202.021 0C122.202 0 70.503 32.703 29.914 91.026c-7.363 10.58-5.093 25.086 5.178 32.874l43.138 32.709c10.373 7.865 25.132 6.026 33.253-4.148 25.049-31.381 43.63-49.449 82.757-49.449 30.764 0 68.816 19.799 68.816 49.631 0 22.552-18.617 34.134-48.993 51.164-35.423 19.86-82.299 44.576-82.299 106.405V320c0 13.255 10.745 24 24 24h72.471c13.255 0 24-10.745 24-24v-5.773c0-42.86 125.268-44.645 125.268-160.627C377.504 66.256 286.902 0 202.021 0zM192 373.459c-38.196 0-69.271 31.075-69.271 69.271 0 38.195 31.075 69.27 69.271 69.27s69.271-31.075 69.271-69.271-31.075-69.27-69.271-69.27z"></path>
                </svg>
                <span class="link-text logo-text">Q&A</span>
            </a>
        </li>
    </ul>
</nav>

<div id="popup-one" class="overlay">
    <div class="popup">
        <div class="form-container sign-up-container">
            <a class="close" href="#">&times;</a>
            <form class="account" id="monform" action="../../backend/include/signup.inc.php" method="post">
                <h1>Create Account</h1>
                <span>or use your email for registration</span>
                <div class="nameinput">
                    <?php //<?= $firstname ?>
                    <input id="account-input-name" type="text" name="firstname" placeholder="First Name"
                           required="required" value='<?php if (isset($_POST['firstname'])) {
                        echo $_POST['firstname'];
                    } ?>'/>
                    <input id="account-input-name" type="text" name="lastname" placeholder="Last Name"
                           required="required" value='<?php if (isset($_POST['lastname'])) {
                        echo $_POST['lastname'];
                    } ?>'/>
                </div>
                <div class="nameinput">
                    <input id="account-input-name" type="email" name="mail" placeholder="Email" required="required"
                           value='<?php if (isset($_POST['mail'])) {
                               echo $_POST['mail'];
                           } ?>'/>
                    <input id="account-input-name" type="password" name="password" placeholder="Password"
                           required="required" value='<?php if (isset($_POST['password'])) {
                        echo $_POST['password'];
                    } ?>'/>
                </div>
                <div class="button-container">
                    <input type="submit" class="button" name="submit" value="SIGN UP">
                    <a href="#popup-two"><input type="button" class="button" value="I already have one"></button></a>
            </form>
        </div>

    </div>
</div>
</div>
<div>
    <div id="popup-two" class="overlay">
        <div class="popup">
            <div class="form-container sign-in-container">
                <a class="close" href="#">&times;</a>
                <form class="account" action="../../backend/include/login.inc.php" method="post">
                    <h1>Sign in</h1>
                    <span>or use your account</span>
                    <input id="account-input" type="email" name="mail" placeholder="Email" required="required"/>
                    <input id="account-input" type="password" name="password" placeholder="Password"
                           required="required"/>
                    <a href="#">Forgot your password ?</a>
                    <div class="button-container">
                        <input type="submit" class="button" name="submit" value="LOGIN">
                        <a href="#popup-one"><input type="button" class="button" value="Create account"></button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../checkPattern.js"></script>
</body>

</html>