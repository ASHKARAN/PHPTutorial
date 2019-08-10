<?php



echo "\n\n GET";
print_r($_GET);



if(isset($_GET['fname'])) echo $_GET['fname'];
if(isset($_GET['lname'])) echo $_GET['lname'];
if(isset($_GET['hi'])) echo $_GET['hi'];



echo "\n\n POST";


print_r($_POST);


echo "\n\n REQUEST";

print_r($_REQUEST);
