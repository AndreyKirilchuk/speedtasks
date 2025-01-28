
<!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
        border:1px solid black;
        }
    </style>
   </head>
   <body>
    
  
   
    <table>
        <thead>
            <tr>
                <td>Question</td>
                <td>Actual Answer</td>
                <td>Submitted Answer</td>
            </tr>
        </thead>
        <tbody>

        <?php
            $questions = [1,2,3,4,5,6,7,8,9,10];

            $a = fopen("actualAnswers.csv", "r");
            $s = fopen("submittedAnswers.csv", "r");

            $score = 0;

            for($i = 0; $i < 10; $i++)
            {
                $row = fgetcsv($a);
                $row2 = fgetcsv($s);

                if($row == $row2)
                {
                    $score = $score + 1;
                }

                echo "
                    <tr>
                        <td>".$questions[$i]."</td>
                        <td>".$row[0]."</td>
                        <td>".$row2[0]."</td>
                    </tr>
                ";
            }

            fclose($a);
            fclose($s);
        ?>
        </tbody>
    </table>

    <?php
        echo "score ".$score."/10";
    ?>

    </body>
</html>