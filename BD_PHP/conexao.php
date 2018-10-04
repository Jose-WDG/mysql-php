<?php
$db_user = 'root';
$db_pass = '';

$dns = "mysql:host=localhost;dbname=teste;charset=utf8;port:3306";


try
{
  $db = new PDO($dns,$db_user,$db_pass);
}
catch (\Exception $e)
{
  echo $e->getMessage();
}

$filmes = $db->prepare("SELECT titulo FROM filme where titulo like ? ");
$idioma = $db->prepare("SELECT nome FROM idioma");
// $consulta_filmes = $filmes->ocicollgetelem(PDO::FETCH_ASSOC);

$idioma->execute();
$filmes->execute(['ac%']);

$consulta_filme = $filmes->fetchAll(PDO::FETCH_ASSOC);
$cunsulta_idioma = $idioma->fetchAll(PDO::FETCH_ASSOC);

?>


<html>
<body>
  LISTA TITULOS FILMES
  <ul>
  <?php
  foreach ( $consulta_filme as $value) {
    foreach ($value as $valor) { echo '<li>'.$valor.'</li>' ; } }
  ?>

 </ul>
LISTA IDIOMAS
 <select>
 <?php
 foreach ( $cunsulta_idioma as $value) {
   foreach ($value as $valor) { echo '<option value="'.$valor.'">. '.$valor.'</option>' ; } }
 ?>

</select>
</body>
</html>
