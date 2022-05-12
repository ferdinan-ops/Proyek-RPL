<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Sort</title>
    <style>
        html,
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 90vh;
            font-family: poppins;
            font-size: 28px;
        }

        span {
            border: 2px solid maroon;
            padding: 10px;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .angka {
            display: flex;
            flex-direction: row;
            border: 2px solid black;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="content">
        <p>Nama: Ferdinan Imanuel Tumanggor</p>
        <p>NPM: 200840007</p>
        <?php
        $numbers = array(6, 5, 3, 1, 8, 7, 2, 4);
        $array_size = count($numbers);

        echo "<p style='font-weight:bold;'>Angka Sebelum diurutkan:</p>";
        echo "<div class='angka'>";
        for ($i = 0; $i < $array_size; $i++)
            echo "<span>$numbers[$i]</span>";
        echo "</div>";

        for ($i = 0; $i < $array_size; $i++) {
            for ($j = 0; $j < $array_size; $j++) {
                if ($numbers[$i] < $numbers[$j]) {
                    $temp = $numbers[$i];
                    $numbers[$i] = $numbers[$j];
                    $numbers[$j] = $temp;
                }
            }
        }

        echo "<p style='font-weight:bold;'>Angka Setelah diurutkan:</p>";
        echo "<div class='angka'>";
        for ($i = 0; $i < $array_size; $i++)
            echo "<span>$numbers[$i]</span>";
        echo "</div>";
        ?>
    </div>
</body>

</html>