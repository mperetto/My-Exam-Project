<?php
include('./include/creo_dir.php');

// limito la dimensione massima a 12MB
if ($_FILES['userfile']['size'] > 12582912) {
  echo 'Il file è troppo grande, la dimensione massima <strong>non deve</strong> superare i 12 Megabyte!';
  exit;
}

// controllo che il file sia un'immagine
$is_img = getimagesize($_FILES['userfile']['tmp_name']);
if (!$is_img) {
  echo 'Puoi inviare <strong>solo</strong> immagini';
  exit;
}

// verifico che il file sia stato effettivamente caricato
if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
  echo 'Il file non &egrave; stato caricato';
  exit;
}

//percorso della cartella dove mettere i file caricati dagli utenti
$uploaddir = './immagini/ID_'.$_POST["id_t"];

//controllo se la cartella esiste già, altrimenti la creo
cartella($uploaddir);

$uploaddir = $uploaddir."/";

//Recupero il percorso temporaneo del file
$userfile_tmp = $_FILES['userfile']['tmp_name'];

//recupero il nome originale del file caricato
$userfile_name = "ID_".$_POST["id_t"]."_".$_FILES['userfile']['name'];

//copio il file dalla sua posizione temporanea alla mia cartella upload
if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {
  //Se l'operazione è andata a buon fine...
  echo 'File inviato con successo.';
}else{
  //Se l'operazione è fallita...
  echo 'Upload NON valido!';
}
header("Refresh: 5; url=./area_lavoro.php");
?>