<?php
/**
 * Created by PhpStorm.
 * User: surid
 * Date: 8/12/18
 * Time: 3:23 AM
 */

function runquery($sqlq){
    require "../dbconfig.php";

    $run = $conn->prepare($sqlq);
    $run->execute();
    return $run;
}
?>