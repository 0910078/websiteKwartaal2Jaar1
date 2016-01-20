<?php
require_once("db.php");
session_start();

$id = $_GET['id'];

$query = "DELETE FROM ikbenik_afspraak WHERE id = $id";

mysqli_query($db, $query);

mysqli_close($db);

header("location: admin.php");
