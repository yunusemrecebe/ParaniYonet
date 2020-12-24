<?php
$bir = $_POST['increaseAmount'];
$iki = $_POST['accountId'];
if($bir == 1 && $iki == 22){
    echo "Bakiye eklendi!";
}
else{
    echo "Olmadı";
}