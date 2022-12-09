<?php


if(isset($errMsg) and count($errMsg) > 0){
    foreach ($errMsg as $error){
        ?>
        <li><?=$error?></li>
    <?php
    }
}


