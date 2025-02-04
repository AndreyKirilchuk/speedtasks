<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $result = '';


    if(isset($_POST["reg"])){
        $numbers = $_POST["number"];
        $numbers = explode("\n", $numbers);

        $newNumbers = [];

        foreach ($numbers as $number) {
            $number = (int)$number / 2;
            array_push($newNumbers, $number);
        }

        sort($newNumbers);

        $result = '';

        foreach ($newNumbers as $number) {
            $result .= $number . "\n";
        }
    }

    ?>

    <form method="POST" name="reg">
        <textarea name="number" id="" cols="30" rows="10">
            <?php
                if($result != '')
                {
                    echo $result;
                }

            ?>
        </textarea>
        <button name="reg">
            Отправить
        </button>
    </form>
</body>
</html>