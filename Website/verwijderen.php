<?php
require_once("db.php");
session_start();

$id = $_GET['id'];

$query = "DELETE FROM artikel WHERE id = $id";

mysqli_query($db, $query);

mysqli_close($db);

header("location: index.php");
