<?php
session_start();
session_destroy();
header("Location:clogin.php");