<?php
$url = 'localhost';
$username = '0910078';
$password = 'ighobuaz';
$database = '0910078';

//create connection
$db = mysqli_connect($url, $username, $password, $database)
or die ('Error: ' .mysqli_connect_error());

//create query for db
$query = "SELECT * FROM ikbenik_gebruiker";
//fetch result
$result = mysqli_query ($db, $query);

//create array & store result from db
$gebruiker = [];
while ($row = mysqli_fetch_assoc($result))
{
    $gebruiker[] = $row;
}
