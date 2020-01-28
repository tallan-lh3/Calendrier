<?php

$arrayMonths = [
    1 => 'Janvier',
    2 => 'Février',
    3 => 'Mars',
    4 => 'Avril',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juillet',
    8 => 'Aout',
    9 => 'Septembre',
    10 => 'Octobre',
    11 => 'Novembre',
    12 => 'Décembre'
];
$arrayyears = [
    2010 => '2010',
    2011 => '2011',
    2012 => '2012',
    2013 => '2013',
    2014 => '2014',
    2015 => '2015',
    2016 => '2016',
    2017 => '2017',
    2018 => '2018',
    2019 => '2019',
    2020 => '2020',
    2021 => '2021'
];
if (isset($_POST['validate'])) {
    $daysInMonths = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']);


    $timestampFirstDay = mktime(0, 0, 0, $_POST['month'], 1, $_POST['year']);
    $firstDay = date('N', $timestampFirstDay);
    $day = 1;
    // calcul des cases dans le calendrier
    $totalCases = $firstDay + $daysInMonths - 1;

    if (($totalCases % 7) != 0) {
        $totalCases += 7 - ($totalCases % 7);
    };
}else{
    $daysInMonths = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y')) ;


    $timestampFirstDay = mktime(0, 0, 0, date('n'), 1, date('Y'));
    $firstDay = date('N', $timestampFirstDay);
    $day = 1;
    // calcul des cases dans le calendrier
    $totalCases = $firstDay + $daysInMonths - 1;

    if (($totalCases % 7) != 0) {
        $totalCases += 7 - ($totalCases % 7);
    };

};
?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>TPDate</title>
</head>

<body>

    <form action="" method="post">
        <select name="month" id="month">
            <?php
            foreach ($arrayMonths as $key => $value) { ?>
                <option value="<?= $key ?>" <?= isset($_POST['month']) && $_POST['month'] == $key ? 'selected' : '' ?>><?= $value ?></option>
            <?php
            }
            ?>
        </select>
        <select name="year" id="year">
            <?php
            foreach ($arrayyears as $key => $value) { ?>
                <option value="<?= $key ?>" <?= isset($_POST['year']) && $_POST['year'] == $key ? 'selected' : '' ?>><?= $value ?></option>
            <?php
            }
            ?>
        </select>

        <input type="submit" name="validate" value="Générer" />
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
                <th>Samedi</th>
                <th>Dimanche</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                if (isset($totalCases)) {
                    for ($case = 1; $case <= $totalCases; $case++) { ?>
                        <td><?= $case >= $firstDay && $case < ($daysInMonths + $firstDay) ? $day++ : '' ?></td><?= ($case % 7) == 0 ? '</tr><tr>' : '' ?>
                <?php
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>














    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>