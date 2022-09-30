<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="contact.css">

</head>
<body>

    <?php
        $name = null;
        if (!empty($_POST)) {
            $name = $_POST['name'];

            $now = date('Ymd_His');
            $file = "submissions/{$now}_{$name}.txt";
            $body = json_encode($_POST, JSON_PRETTY_PRINT);

            file_put_contents($file, $body);
        }
    ?>
    
    <?php require 'elements/navigation.php' ?>

    <form action="" method="POST" id="form">

        <ul id="errors"></ul>

        <?php if ($name !== null): ?>
            <span id="thankyou">Thank you for contacting us, <?=$name?>!</span>
        <?php endif; ?>

        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="input" >

        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="input">

        <label for="body">Body</label>
        <textarea name="body" id="body" cols="30" rows="10" class="input"></textarea>

        <label for="agree">I agree to my data being used</label>
        <input type="checkbox" name="agree" id="agree" class="input">

        <input type="submit" value="Send" class="input">
    </form>

    
    <?php require 'elements/footer.php' ?>
    
<script src="contact.js"></script>

</body>
</html>