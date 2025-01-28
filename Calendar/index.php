<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="calendar.css">
</head>

<body>

    <?php
    
        $months = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь",];

        //сегодняшняя дата
        $today = date('d', time());
        $thisMonth = date('m', time());
        $month = $thisMonth;
        $thisYear = date('Y', time());
        $year = $thisYear;

        //кол-во дней в месяце
        $countDays = cal_days_in_month(CAL_GREGORIAN, $thisMonth, $thisYear);
        $days = range(1, $countDays);
        //название дня
        $name_day = jddayofweek($days[0], $mode = CAL_DOW_DAYNO);

        if(isset($_GET['num']))
        {
            $num = (int)$_GET['num'];
            $getYear = (int)$_GET['year'];

            if($num == 13)
            {
                $num = 1;
                $getYear++;
            }
            
            if($num === 0){
                $num = 12;
                $getYear--;
            }

            $year = $getYear;
            $month = $num;         
            
            if($year == $thisYear && $month == $thisMonth)
            {
                $today = date('d', time());
            }else{
                $today = '';
            }
       
            $countDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $days = range(1, $countDays);
            $name_day = jddayofweek($days[0], $mode = CAL_DOW_DAYNO);
        }
        
    ?>

    <div class="custom-calendar-wrap">
        <div class="custom-inner">
            <div class="custom-header clearfix">
                <nav>
                    <a href="index.php?num=<?= $month - 1 ?>&year=<?= $year ?>" class="custom-btn custom-prev"></a>
                    <a href="index.php?num=<?= $month + 1 ?>&year=<?= $year ?>" class="custom-btn custom-next"></a>
                </nav>
                <h2 id="custom-month" class="custom-month"><?= $months[$month - 1] ?></h2>
                <h3 id="custom-year" class="custom-year"><?= $year ?></h3>
            </div>
            <div id="calendar" class="fc-calendar-container">
                <div class="fc-calendar fc-five-rows">
                    <div class="fc-head">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="fc-body">
                     
                        <div class="fc-row">
                        <?php  

                            for($i = 0; $i <= $name_day; $i++)
                            {
                                echo '<div ><span class="fc-date"></span></div>';
                            }

                            $count = $name_day + 1;

                            foreach($days as $day)
                            {
                                if($today == $day)
                                {
                                    echo '<div class="fc-today"><span class="fc-date">'.$day.'</span></div>';
                                }
                                else
                                {
                                    echo '<div><span class="fc-date">'.$day.'</span></div>';
                                }
                            
                              
                                $count = $count + 1;

                                if($count === 7)
                                {
                                    $count = 0;
                                    echo '</div>';

                                    echo '<div class="fc-row">';
                                }

                                if($day == $countDays)
                                {
                                    echo '</div>';
                                }
                            }
                            ?>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>