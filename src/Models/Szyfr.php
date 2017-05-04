<?php
  require ('./vendor/autoload.php');
  //$napis = 'ąAla ma kota i lubi się z nim bawić AąbBCcĆć';
  // $klucz = 'TOJESTTAJNESZYFRNIEDOZGADNIECIAHAHAHINICNATONIEPORADZISZ';
  // $l=62;
  // $tablicaZnakow = array();
  // $tablicaZnakow = tablica($l);
  //
  // $napis = encode($napis, $tablicaZnakow, $klucz, $l);
  // $napis = decode($napis, $tablicaZnakow, $klucz, $l);

  function encode($napis){
    $klucz = 'TOJESTTAJNESZYFRNIEDOZGADNIECIAHAHAHINICNATONIEPORADZISZ';
    $l=62;
    $tabZnakow = array();
    $tabZnakow = tablica($l);
    $tekst = '';
    $szyfr = '';

    $j=0;
    for ($i=0; $i < strlen($napis); $i++) {
      if ((ord($napis[$i])>47 && ord($napis[$i])<58) || (ord($napis[$i])>64 && ord($napis[$i])<91) || (ord($napis[$i])>96 && ord($napis[$i])<123)){
        if (ord($napis[$i])==32){
          $tekst .= $napis[$i];
        }else {
          if($j>=strlen($klucz))
            $j=0;
          $tekst .= $klucz[$j];
          $j++;
        }
      }else {
        if($j>=strlen($klucz))
          $j=0;
        $j++;
        $tekst .= $napis[$i];
      }
    }
    //d($tekst);
    // d($napis,$klucz,$tekst,$szyfr);
    for ($i=0; $i < strlen($napis); $i++) {
      if ((ord($napis[$i])>47 && ord($napis[$i])<58) || (ord($napis[$i])>64 && ord($napis[$i]) < 91) || (ord($napis[$i])>96 && ord($napis[$i])<123)){
        $x = -1;
        $y = -1;
        for ($j=0; $j < $l; $j++) {
          if(($napis[$i])==$tabZnakow[$j][0]){
            $x=$j;
          }
          if(($tekst[$i])==$tabZnakow[0][$j]){
            $y=$j;
          }
          // echo 'x='.$x.' y='.$y.'<br>';
          // echo strtoupper($napis[$i]).' '.$tabZnakow[$i][0].'<br>';
          if ($x>=0 && $y>=0 ) {
            // if (ctype_lower($napis[$i]))
            //   $szyfr .= strtolower($tabZnakow[$x][$y]);
            // else
              $szyfr .= $tabZnakow[$x][$y];
            break;
          }
        }
      }else {
        $szyfr .= $napis[$i];
      }
    }
    // d($szyfr);
    return $szyfr;
  }
  function decode($napis){
      // d($napis);
      $klucz = 'TOJESTTAJNESZYFRNIEDOZGADNIECIAHAHAHINICNATONIEPORADZISZ';
      $l=62;
      $tabZnakow = array();
      $tabZnakow = tablica($l);
      $tekst = '';
      $szyfr = '';

      $j=0;
      for ($i=0; $i < strlen($napis); $i++) {
        if ((ord($napis[$i])>47 && ord($napis[$i])<58) || (ord($napis[$i])>64 && ord($napis[$i]) < 91) || (ord($napis[$i])>96 && ord($napis[$i])<123)){
          if (ord($napis[$i])==32){
            $tekst .= $napis[$i];
          }else {
            if($j>=strlen($klucz))
              $j=0;
            $tekst .= $klucz[$j];
            $j++;
          }
        }else {
          if($j>=strlen($klucz))
            $j=0;
          $j++;
          $tekst .= $napis[$i];
        }
      }
      //d($tekst);
      // d($napis,$klucz,$tekst,$szyfr);
      for ($i=0; $i < strlen($napis); $i++) {
        // echo $napis[$i].'/';
        if ((ord($napis[$i])>47 && ord($napis[$i])<58) || (ord($napis[$i])>64 && ord($napis[$i]) < 91) || (ord($napis[$i])>96 && ord($napis[$i])<123)){
          $x = -1;
          $y = -1;
          for ($j=0; $j < $l; $j++) {
            //echo strtoupper($tekst[$i]).'|';
            if($tekst[$i]==$tabZnakow[$j][0]){
              $x=$j;
              // echo $tabZnakow[$j][0];
              for ($k=0; $k < $l; $k++) {
                if(($napis[$i])==$tabZnakow[$j][$k]){
                  $y=$k;
                  // echo $tabZnakow[$j][$k].'<br>';
                  break;
                }
                // echo 'i='.$i.' j='.$j.' k='.$k.'<br>';
                // echo $tabZnakow[$j][0].' | '.$tabZnakow[$j][$k].'<br>';
              }
            }
            // echo 'x='.$x.' y='.$y.'<br>';
            // echo strtoupper($napis[$i]).' '.$tabZnakow[$i][0].'<br>';
            if ($x>=0 && $y>=0 ) {
              //echo strtolower($tabZnakow[0][$y]);
              // if (ctype_lower($napis[$i]))
              //   $szyfr .= strtolower($tabZnakow[0][$y]);
              // else
                $szyfr .= $tabZnakow[0][$y];
              break;
            }
          }
        }else {
          $szyfr .= $napis[$i];
        }
      }
      // d($szyfr);
      return $szyfr;
  }
  function tablica($l){
    $tabZnakow = array();
    $tab = array();

    for($i=48; $i<123; $i++){
      if ($i==58){
        $i+=7;
      }
      if ($i==91){
        $i+=6;
      }
      // echo $i.'/';
      array_push($tab,chr($i));
    }
    //d($tab);
    for ($i=0; $i < $l; $i++) {
      $tabZnakow[$i] = array();
      for ($j=0; $j < $l; $j++) {
        $k=($j+$i)%$l;
        $tabZnakow[$i][$j] = $tab[$k];
        // echo "'".$tab[$k]."',";
      }
      // echo "<br>";
    }
    // d($tabZnakow);
    return $tabZnakow;
  }
 ?>
