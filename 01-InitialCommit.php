<?php


//TODO  INHERITANCE,  TRAIT, NameSpace , .HTACCESS, ajax headers, COMPOSER, MYSQL, PDO,  JSON, mvc
//
//variables
$a = 1;
$b = 2.2;
$c = "Good Bye ";

$c = $c . " ali";
echo $c;


$d = $a + $b;

$e = true;

$d = 20;
$d--;


echo "<hr/>";

//if else
if ($d++ == 20) {
    echo "$d > 20";
} else if ($d == 20 || $e) {
    echo "$d = 20";
} else echo $d . " < 20";

/*.
 *  ==
 * >
 * <
 * <=
 * >=
 *
 * &&
 * ||
 *
 *
 * .=
 * +=
 * *=
 * /=
 *
 * ++
 * --
 *
 *
 */

/*
 * weygwekfygkwef
 */


//for loop
for ($i = 0; $i <= 4; $i++) {
    // echo "for loop $i <br/>";
}


echo "<hr/>";

//while loop
while (($d < 10 && $e) || ($a > 5 && 3 < 4)) {
    $d++;
    if ($d == 22) continue;
    echo "while loop $d<br/>";
    if ($d == 25) break;
}

echo "<hr/>";

//do while loop
do {
    $d++;
    if ($d == 22) continue;
    echo "do while loop $d<br/>";
    if ($d == 25) break;
} while (($d < 10 && $e) || ($a > 5 && 3 < 4));

echo "<hr/>";


// inner loops
for ($i = 0; $i < 10; $i++)
    for ($j = 0; $j < 10; $j++)
        for ($k = 0; $k < 10; $k++) {
            if ($k == 2) break 3;
            echo "$i - $j - $k <br/>";
        }

echo "<hr/>";


$f = 6;


//switch
switch ($f) {
    case 0 :
        {
            echo "0 = $f";
            break;
        }
    case 1 :
    case 2 :
        echo "f is 1 or 2";
        break;
    case 3 :
        echo "f is 3";
        break;
    case 4 :
        echo "f is 4";
        break;
    case 5 :
        echo "f is 5";
        break;
    default :
        {
            echo "default value of f is $f";
        }
}
echo "<hr/>";


//arrays

$g = [1, 2, 3, 4];
$h = ["ali", "razie", "omid", "mamadReza"];
$i = ["fname" => "ali", "lname" => "ashkaran", "age" => 32, "sex" => "male", "activate" => true];
$k = array(
    "fname" => "razie",
    "lname" => "ahmadi",
    "age" => 15,
    "sex" => "female",
    "activate" => false

);

echo $k["fname"] . $k['lname'];
echo "<hr/>";
$k["email"] = "ali.ashkaran@gmail.com";
echo $k["email"];


echo "<hr/>";
//CONSTANTS
define("MYNAME", "ALI");
echo MYNAME;

echo "<hr/>";
//foreach loop


foreach ($k as $key => $value) {
    //  echo  " $key is  $value   <br/>";
}

echo "<hr/>";

// GLOBALS
if (isset($_GET['TEST']))
    ECHO $_GET['TEST'];
else echo "please enter the TEST";


echo "<hr/>";
//inclution
//include_once 'second.php';


?>

