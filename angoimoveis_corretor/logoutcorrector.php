<?php

session_start();

session_destroy();
header('Location: ./logincorrector.php');