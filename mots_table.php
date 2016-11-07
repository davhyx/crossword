<?php

$cols = 5;
$rows = 5;

$arrGrid = array(
  null,null,null,null,null,
  null,null,null,null,null,
  null,null,null,"empty",null,
  null,null,"empty",null,null,
  null,null,null,null,null
);

$data = file_get_contents("data/mots.json");
$data_mots = json_decode($data, true);

for ($i=0; $i < count($data_mots); $i++){
  ${'word'.($i+1)} = array(
    'word' => $data_mots[$i]['word'],
    'axis' => $data_mots[$i]['axis'],
    'posINI' => $data_mots[$i]['posINI']
  );
}

$arrMots=array(
  "word1" => $word1,
  "word2" => $word2,
  "word3" => $word3,
  "word4" => $word4,
  "word5" => $word5,
  "word6" => $word6,
  "word7" => $word7,
  "word8" => $word8,
  "word9" => $word9,
  "word10" => $word10,
  "word11" => $word11,
  "word12" => $word12,
  "word13" => $word13,
  "word14" => $word14
);

/* SOLUCION:
Si es H escribo en la grid los caracteres de la palabra
correlativas segun longitud de la palabra desde la
posicion Inicial de la primera letra de la palabra.
Si es vertical desde la posIni de la palabra y le sumo
las cols que tiene el crucigrama.
*/
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //un for para recoger todos los inputs(de word1 a word14)

  for($z=1; $z<=count($arrMots); $z++){
      if($_POST["word".$z] == $arrMots["word".$z]['word']) {
        $wordByChar = str_split($arrMots["word".$z]['word'], 1);
        $posINI = (int)$arrMots["word".$z]['posINI'];
        $incre = 1;
        if($arrMots["word".$z]['axis']=='V'){
          $incre = $cols;
        }
        for($i=0;$i<count($wordByChar);$i++){
          $arrGrid[$posINI][0] = $wordByChar[$i];
          $posINI += $incre;
        }
      }
  }

}

?>


<table>
  <?php
  $index=0;
  for ($x=0; $x < 5; $x++) {
    echo "<tr>";
    for ($y=0; $y < 5; $y++){
      if($arrGrid[$index]=="empty"){
        echo "<td class=\"empty\"></td>";
      } else {
          echo "<td>".$arrGrid[$index][0]."</td>";
      }
      $index++;
    }
    echo "</tr>";
  }
  ?>
</table>
