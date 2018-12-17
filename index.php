<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kata Dasar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Masukan Kalimat Dibawah ini</h2>
  <p>Insert</p>

    <div class="form-group" >
      <form action="index.php" method="GET">
      <label for="comment">Tulis Kalimat:</label>
      <textarea class="form-control" rows="5" id="comment" name="isi"></textarea>
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </form>
</div>

<?php

// include composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

$kalimat = $_GET['isi'];


// create stemmer
// cukup dijalankan sekali saja, biasanya didaftarkan di service container
$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();
$tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
$tokenizer = $tokenizerFactory->createDefaultTokenizer();

$tokens = $tokenizer->tokenize($kalimat);
//$tampil=(var_dump($tokens));

// stem
$sentence = $kalimat;
$output   = $stemmer->stem($sentence);


echo "<center>".$output . "</center>";
// ekonomi indonesia sedang dalam tumbuh yang bangga


?>

</body>
</html>
