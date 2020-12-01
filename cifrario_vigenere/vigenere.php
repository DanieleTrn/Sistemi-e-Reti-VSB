<html>
<head>
</head>
<body>
  <?php include 'methods.php';
  ?>
  <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    Testo in chiaro: <input type="text" name="testo"><br>
    Chiave: <input type="text" name="chiave"><br>

    <input type="radio" id="encrypt" name="encrypt" value="en">
    <label for="encrypt">Critta testo</label><br>

    <input type="radio" id="decrypt" name="encrypt" value="de">
    <label for="decrypt">Decritta testo</label><br>

    <input name="invia" value="Invia" type="submit"><br>
    <input name="Cancella" type="reset"><br>
    </form>

  </form>
  <?php if(isset($_POST['invia']) && isset($_POST['testo']) && isset($_POST['chiave'])){

  $alfabeto = "abcdefghijklmnopqrstuvwxyz"; //alfabeto di riferimento

  $testo = $_POST["testo"]; //Prendo il testo dalla pagina cifra.html
  $testoFormatted = strtolower($testo); //Formatto la stringa in minuscolo per evitare errori

  $chiave = $_POST["chiave"]; //verme da iterare
  $iKey = -1; //indice per iterare nel verme
  $count = 0; //percorre il testo in chiaro

  $testoCifrato = "";

  echo "Testo in chiaro: " . $testo;
  echo "<br />Testo cifrato: ";

  while($count != strlen($testo)){
    if($iKey >= strlen($chiave)-1){
      $iKey = 0;
    }else{
      $iKey += 1;
    }

    $iLetteraVerme = spotIndex($alfabeto,substr($chiave,$iKey,1));
    $iLetteraChiaro = spotIndex($alfabeto,substr($testo,$count,1));
    $indexRis = encryptVigenere($iLetteraChiaro,$iLetteraVerme);

    $lettera = substr($alfabeto,$indexRis,1);
    $testoCifrato = $testoCifrato . $lettera;

    $count += 1;
  }
  echo $testoCifrato;
}
  ?>
</body>
</html>
