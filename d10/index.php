<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form name="form" method="post">
        <textarea id="" cols="30" rows="10" name="str">
            <?php

                if(isset($_POST['form']))
                {
                    $input = $_POST['str'];

                    $input = str_split($input);

                    foreach($input as $char)
                    {
                        if(!is_numeric($char))
                        {
                            echo $char;
                        }
                    }
                }

            ?>
        </textarea>
        <button name="form">
            Отправить
        </button>
    </form>
</body>
</html>