<?php declare (strict_types = 1);
//default function int, float no mismatch
?>
<?php include "function.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Website</title>
</head>
<body>
<h1>Hello World</h1>
<?php
echo "<h2>My name is Tanjina.I am a student.</h2>";

?>
<?php
//Declare some Variables...
$instructorName = "Tanjina Akter";
$courseName = "Computer Science Engineering"
?>
<h1>My name is <?php echo "$instructorName"?>;</h1>
<p>Course of <?php echo "$courseName";?></p>

<?php
//variable declare camel cashing...
$fName = "Tanjina";
$lName = "Jui";
$fullname = "Tanjina Akter";
$email = "tanjinaakter994@gmail.com";
echo $fullname. "<br>";
echo $fName. "". $lName . "<br>";
echo $email;
?>

<?php 
echo "string : ". "<br>";
$name= "Tanjina";
echo var_dump($name);
echo "<br>";
echo strlen($name);
echo strrev($name);
echo "<br>";
echo strpos("Hello Tanjina","Tanjina");
echo "<br>";
echo str_replace("World", "Bangladesh", "Hello World");
echo "<br>";
?>
<?php
//if_else statement....
$a = 20;
if ($a < 100){
	echo $a . " is less then 100";
}
else{
	echo $a . "is Bigger then 100";

}
echo "<br>";
?> 

<?php
echo "if_else statement: ". "<br>";
$username = "Tanjina";
$password = 12365;

if ($username == "Tanjina") {
	echo "Welcome" . $username;
}
else{
	echo "Username is Wrong";
}
echo "<br>";
?>

<?php
echo "nested if_else statement: ". "<br>";
$username = "Tanjina";
$password = 12365;

if ($username == "Tanjina") {
	if ($password == 12365) {
		echo "Welcome" . $username;
	} 
	else{
		echo "Password is Wrong";
	}
}
else{
	echo "Username is Wrong";
}
echo "<br>";
?>

<?php
//Switch_case....
echo "Switch_case: ". "<br>";
$car = "";
switch ($car) {
	case 'Nissan':
		echo "I Love " . $car;
		break;
	case 'Mitsubishi':
			echo "I Love " . $car;
			break;	
	case 'Toyota':
		echo "I Love " . $car;
		break;
	
	default:
		echo "I Love BMW";
		break;
}
echo "<br>";

?>

<?php
//for_loops......
echo "for loops: ". "<br>";
$a = 5;
for ($i=1; $i <= 10 ; $i++) { 
echo $a . " * " . $i . " = " . $a * $i . "<br>";
}
echo "<br>";
?>


<?php
//while loops----
echo "while loops: ". "<br>";
$a = 6;
$i = 1;
while ( $i <= 10) {
	echo $a . " * " . $i . " = " . $a * $i . "<br>" ;
	$i++;
echo "<br>";
}
?>

<?php
//do-while loops----
echo "do_while loops: ". "<br>";
$a = 7;
$i = 1;
do {
	echo $a . " * " . $i . " = " . $a * $i . "<br>" ;
	$i++;
}while ( $i <= 10) 

?>

<?php
//array---
echo "Array". "<br>";
$bikes = array("Suzuki", "TVS", "Honda", "Bajaj", "Hero" );
echo "I have my own " . $bikes[0] . " My Previous Bike was " . $bikes[2]." <br>";
echo count($bikes). "<br>";
?>

<?php
//Array with for_loops
echo "Array with for_loops". "<br>";
$bikes = array("Suzuki", "TVS", "Honda", "Bajaj", "Hero" );
$arrLength = count($bikes);
for ($i=0; $i < $arrLength ; $i++) { 
	echo $bikes[$i] . "<br>";
}
echo "<br>";
?>

<?php
//Array with foreach_loops
echo "Array with foreach_loops". "<br>";
$bikes = array(
"bikeOne" => "Suzuki",
"bikeTwo" => "TVS",
"bikeThree" => "Bajaj",
"bikeFour" => "Honda",
"bikeFive" => "BMW",
 );

foreach ($bikes as $bike) {
	echo $bike . "<br>";
}
echo "<br>";
?>
<?php
$ages = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach($ages as $age) {
  echo $ages['Peter'] . $age;
  echo "<br>";
}
echo "<br>";
?>

<?php 
// Function call...
welcomeMessage();
echo "<br>";
?>
<?php 
// Function Arguments...
function studentName ($stdName, $address){
	echo "Welcome " . $stdName . " , to our Brand New Skill Development Course. <br> Current Location is now at - " . $address . "<br>";
}
studentName("Tanjina Jui ", "Narayanganj");
studentName("Pipoly" , "Sonargaon");
echo "<br>";
?>
<?php 
function addNumbers(int $x, int $y){
	return $x + $y;
}
echo addNumbers(10,150);
echo "<br>";
?>

<?php
$a = 50;
$b = 25;
function addNumber(){
	$GLOBALS['add'] = $GLOBALS['a'] + $GLOBALS ['b'];
}
addNumber();
echo "Addition- " . $add . "<br>";

function subNumber(){
	$GLOBALS['sub'] = $GLOBALS['a'] - $GLOBALS ['b'];
}
subNumber();
echo "Subtraction- " . $sub . "<br>";
?>

<?php
//Constant.

define("Welcome", "Welcome to the Course of Mastering In PHP with a Complete Dynamic Project");
echo Welcome;
echo "<br>";
?>
<?php 
// Mathmatically Predefine function....
echo pow(2, 4);
echo "<br>";
echo sqrt(100);
echo "<br>";
echo rand(1,200);
echo "<br>";
echo ceil(8.3);
echo "<br>";
echo floor(8.7);
echo "<br>";
echo round(9.3);
echo "<br>";
?>
<?php
//String function operation
$string = "Hello World";
echo strtoupper($string);
echo "<br>";
echo strtolower($string);
echo "<br>";
echo strlen($string);
echo "<br>";
echo str_word_count($string);
echo "<br>";
echo str_replace("World", "Bangladesh", "Hello World");
echo "<br>";
echo strpos("Hello Bangladesh", "Bangladesh");
echo "<br>";
?>
<?php 
$table =[100,175,50,30,200,400,800,10];
echo max($table);
echo "<br>";
echo min($table);
echo "<br>";
echo sort($table);
echo "<br>";
echo print_r($table);
?>
</body>
</html>