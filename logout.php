<?php
/**
 * Created by PhpStorm.
 * User: surid
 * Date: 8/19/18
 * Time: 9:07 AM
 */
session_start();
session_destroy();
header("location: index.php");