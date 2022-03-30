<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="https://www.ligue1.fr/-/media/Themes/LFP/Ligue1/Ligue1/icons/icon-192-192.png" type="image/ico">

    <title>Contact - Random-T</title>
</head>

<body>
    <?php include('../templates/NavBar.php') ?>
    <main>
        <h1>
            Contact
        </h1>

        <div class="contact-form">
            <form id="contact-form" method="post" action="contact-form-handler.php">
                <input name="name" type="text" class="form-control" placeholder="Your Name" required><br>
                <input name="email" type="email" class="form-control" placeholder="Your Email" required><br>
                <textarea name="message" class="form-control" placeholder="Message" row="4" required></textarea><br>
                <button type="submit" class="form-control contact-submit" value="SEND MESSAGE">SEND MESSAGE
            </form>
        </div>
    </main>
    <?php include('../templates/footer.php') ?>
</body>

</html>