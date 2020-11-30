<html>

<head>

</head>

<body>
  <h1>Cesare</h1>
  <?php

  //Funzione per trovare l'indice corrispondente al carattere in $alfabeto
  function spotIndex($alfabeto, $lettera){
    for($i = 0; $i < strlen($alfabeto); $i++){
      if($lettera == $alfabeto[$i]){
        return $i;
      }
    }
  }

  //Formula per criptare con Cesare
  function crittoCesare($lettera, $chiave) {
    return ($lettera + $chiave) % 26;
  }

  //Formula per decriptare con Cesare
  function decrittoCesare($lettera, $chiave) {
    return ($lettera - $chiave) % 26;
  }

    $prova = $_POST["testo"]; //Prendo il testo dalla pagina cifra.html
    $provaFormatted = strtolower($prova); //Formatto la stringa in minuscolo per evitare errori

    $chiave = $_POST["chiave"]; //Prendo la rotazione dalla pagina cifra.html
    $isEncrypt = $_POST["encrypt"]; //Capisco se devo criptare o decriptare

    $alfabeto = "abcdefghijklmnopqrstuvwxyz"; //alfabeto di riferimento
    $newParola = ""; //Qui inserirò il testo cifrato/decifrato

    echo "Testo in chiaro: $prova <br />";
    echo "Testo cifrato: ";

    if($isEncrypt == "de"){

      for($x = 0; $x < strlen($prova); $x++){
        $letteraIndex = spotIndex($alfabeto,substr($provaFormatted,$x,1));
        $lettera = substr($alfabeto,decrittoCesare($letteraIndex,$chiave),1);
        $lettera = strtoupper($lettera);
        $newParola = $newParola . $lettera;
      }
    }else{

      for($x = 0; $x < strlen($prova); $x++){
        $letteraIndex = spotIndex($alfabeto,substr($provaFormatted,$x,1));
        $lettera = substr($alfabeto,crittoCesare($letteraIndex,$chiave),1);
        $lettera = strtoupper($lettera);
        $newParola = $newParola . $lettera;
      }
    }
    echo $newParola;
  ?>
</body>

</html>
