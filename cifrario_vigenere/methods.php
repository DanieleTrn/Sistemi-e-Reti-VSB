<?php

  function encryptVigenere($indexChiaro,$indexVerme){
    return ($indexChiaro + $indexVerme)%26;
  }

  function spotIndex($alfabeto, $lettera){
    for($i = 0; $i < strlen($alfabeto); $i++){
      if($lettera == $alfabeto[$i]){
        return $i;
      }
    }
  }
?>
