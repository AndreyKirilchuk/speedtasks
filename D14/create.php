<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
<?php

    // Your code here

    include("index.php");

    $title = $_POST['title'];
    $description = $_POST['description'];

    // Создаем содержимое для DOC-файла
    $content = "<html>
                        <head>
                            <title>$title</title>
                        </head>
                        <body>
                            <h1>$title</h1>
                            <p>$description</p>
                        </body>
                        </html>";

    file_put_contents($title . '.doc', $content);

?>
    
</body>
</html>