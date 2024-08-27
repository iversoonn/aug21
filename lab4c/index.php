<?php

require "Profile.php";

$profile = new Profile(
    "David",
    "Iverson",
    "Sison"
);

$profile->setEmail('david.iverson@auf.edu.ph');
$profile->setAddress('Barangay Manibaug Libutad, Porac Pampanga, Philippines 2007');
$profile->setFavoriteQuote('Code teaches you how to face really big problems -Jack Dorsey');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile: <?php echo $profile->getCompleteName(); ?></title>
</head>
<body>
    <h1>Complete Name: <?php echo $profile->getCompleteName(); ?></h1>
    <h2>Email: <?php echo $profile->getEmail();?></h2>
    <h2>Address: <?php echo $profile->getAddress();?></h2>
    <p>
        <?php echo $profile->getFavoriteQuote();?>
    </p>
</body>
</html>