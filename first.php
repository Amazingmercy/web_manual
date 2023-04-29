<?php
echo "QUESTION ONE<br>";
//first increment method
$num = 5;
$num++;
echo "First method: ".$num."<br>";
//second increment method
$num = 5;
$num+=1;
echo "Second method: ".$num."<br>";
//third increment method
$num = 5;
++$num;
echo "Third method: ".$num."<br><br>";

echo "QUESTION TWO<br>";
$first_num = 4;
$second_num = 5;
echo "First Number: ".$first_num."<br>";
echo "Second Number: ".$second_num."<br><br>";

if($first_num == $second_num){
    echo "Numbers are equal <br>";
}
else{
    echo "Numbers are not equal <br>";
}
if($first_num > $second_num){
    echo "First number is greater <br>";
}
else{
    echo "Second number is greater <br>";
}
if($first_num <= $second_num){
    echo "First number is less than or equal to second <br><br>";
}
else{   
    echo "First number is greater than second <br><br>";
}
echo "QUESTION THREE<br>";
    $fac = 1;
for($n = 0; $n <= 10; $n++){
if($n == 0){
    echo "Factorial of ".$n." = ".$fac."<br>";
}
else{
   $fac = $fac*$n;
   echo "Factorial of ".$n." = ".$fac."<br>";
}
}
?>