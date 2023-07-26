<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB;?>/public/clients/css/style.css">
    <title><?php echo $title; ?></title>
</head>

<body>
    <?php
    $this->renderView('blocks/header');
    ?>

    <?php
    $this->renderView($content,$sub_content);
    ?>

    <?php
    $this->renderView('blocks/footer');
    ?>

    <script type="text/javascript" src="<?php echo _WEB;?>/public/clients/js/script.js"></script>
</body>

</html>