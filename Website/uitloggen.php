<?php

session_start();

$userid = '';

session_destroy();

header("location: index.php");
