<?php

session_start();
require_once("path.php");
session_destroy();
header('Location: ' . BASE_URL);
