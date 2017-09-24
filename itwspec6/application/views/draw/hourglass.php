<h1>&emsp;Hourglass</h1>
<br>
<?php
for ($i = 0; $i < $number - 1; $i++) {
    echo "&nbsp; &nbsp; ";
    echo " &nbsp;  ";
    for ($j = 0; $j < $i; $j++) {
        echo " &nbsp;  ";
    }
    echo " &nbsp;  ";
    for ($k = $number - $i; $k > 0; $k--) {
        echo "* ";
        echo " &nbsp;  ";
    }
    echo "<br>";
}
echo " &nbsp;  ";
echo " &nbsp;  ";
for ($i = 0; $i < $number; $i++) {
    echo " &nbsp;  ";
    echo " &nbsp;  ";
    for ($j = $number - $i; $j > 1; $j--) {

        echo " ";
        echo " &nbsp;  ";
    }
    for ($k = 0; $k < $i + 1; $k++) {
        echo "* ";

        echo " &nbsp;  ";
    }
    echo "<br>";

    echo " &nbsp;  ";
    echo " &nbsp;  ";
}
?>
