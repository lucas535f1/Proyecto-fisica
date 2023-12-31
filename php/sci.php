<?php
// $_POST['fuerzaC'] = 3.9;
// $_POST['fuerzaE'] = 0;
// $_POST['cargaC'] = 5;
// $_POST['cargaE'] = -6;
// $_POST['campoC'] = 0.26;
// $_POST['campoE'] = 0;
// $_POST['velocidadC'] = 3;
// $_POST['velocidadE'] = 6;
// $_POST['angulo'] = "";


// $_POST['cs'] = 10;
// if (!empty($_POST)) {

//     $_POST['cs'] = empty($_POST['cs']) ? 1 : $_POST['cs'];
//     $_POST['fuerzaE'] = empty($_POST['fuerzaE']) ? 0 : $_POST['fuerzaE'];
//     $_POST['cargaE'] = empty($_POST['cargaE']) ? 0 : $_POST['cargaE'];
//     $_POST['campoE'] = empty($_POST['campoE']) ? 0 : $_POST['campoE'];
//     $_POST['velocidadE'] = empty($_POST['velocidadE']) ? 0 : $_POST['velocidadE'];
//     $numero['error'] = false;

//     define('cs', $_POST['cs']);

//     if (empty($_POST['fuerzaC'])) {
//         $valores['carga'] = $_POST['cargaC'] * pow(10, $_POST['cargaE']);
//         $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
//         $valores['velocidad'] = $_POST['velocidadC'] * pow(10, $_POST['velocidadE']);
//         $valores['angulo'] = $_POST['angulo'];
//         $valores['fuerza'] = $valores['carga'] * $valores['campo'] * $valores['velocidad'] * sin(deg2rad((float)$valores['angulo']));
//         echo "1";
//     } else if (empty($_POST['cargaC'])) {
//         $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
//         $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
//         $valores['velocidad'] = $_POST['velocidadC'] * pow(10, $_POST['velocidadE']);
//         $valores['angulo'] = $_POST['angulo'];
//         $valores['carga'] = $valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * sin(deg2rad((float)$valores['angulo'])));
//         echo "2";
//     } else if (empty($_POST['campoC'])) {
//         $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
//         $valores['carga'] = $_POST['cargaC'] * pow(10, $_POST['cargaE']);
//         $valores['velocidad'] = $_POST['velocidadC'] * pow(10, $_POST['velocidadE']);
//         $valores['angulo'] = $_POST['angulo'];
//         $valores['campo'] = $valores['fuerza'] / ($valores['carga'] * $valores['velocidad'] * sin(deg2rad((float)$valores['angulo'])));
//         echo "3";
//     } else if (empty($_POST['velocidadC'])) {
//         $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
//         $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
//         $valores['carga'] = $_POST['cargaC'] * pow(10, $_POST['cargaE']);
//         $valores['angulo'] = $_POST['angulo'];
//         $valores['velocidad'] = $valores['fuerza'] / ($valores['campo'] * $valores['carga'] * sin(deg2rad((float)$valores['angulo'])));
//         echo "4";
//     } else if (empty($_POST['angulo'])) {
//         $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
//         $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
//         $valores['velocidad'] = $_POST['velocidadC'] * pow(10, $_POST['velocidadE']);
//         $valores['carga'] = $_POST['cargaC'] * pow(10, $_POST['cargaE']);
//         $asin = floatval(strval($valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * $valores['carga'])));
//         $valores['angulo'] = rad2deg(asin($asin));
//     } else {
//         echo "6";
//         $numero['error'] = true;
//     }

//     $numero['fuerza']['coeficiente'] = coeficiente($valores['fuerza']);
//     $numero['fuerza']['exponente'] = exponente($valores['fuerza']);
//     $numero['campo']['coeficiente'] = coeficiente($valores['campo']);
//     $numero['campo']['exponente'] = exponente($valores['campo']);
//     $numero['velocidad']['coeficiente'] = coeficiente($valores['velocidad']);
//     $numero['velocidad']['exponente'] = exponente($valores['velocidad']);
//     $numero['carga']['coeficiente'] = coeficiente($valores['carga']);
//     $numero['carga']['exponente'] = exponente($valores['carga']);
//     $numero['angulo'] = round($valores['angulo'], 0, PHP_ROUND_HALF_UP);

//     print_r($valores);
//     // echo $valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * $valores['carga']);
//     // echo "<br>";
//     // if ($valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * $valores['carga']) == 1) {
//     //     echo "es igual a uno";
//     // } else {
//     //     echo "es distinto de uno";
//     // }
//     // $mul = $valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * $valores['carga']);
//     // echo "<br>";
//     // echo asin($mul);
//     // echo "<br>";
//     // echo asin(1);
//     // echo "<br>";
//     // echo $mul;
//     //     print_r($valores);
//     //     echo "<br>";
//     //     echo $valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * $valores['carga']);
//     //     $mul = $valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * $valores['carga']);
//     //     if($valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * $valores['carga'])==1){
//     //         echo "es igual a uno";
//     //     } else {
//     //         echo "es distinto de uno";
//     //     }
//     //     echo "------------------------"."<br>";
//     //     $mull = round($mul, 0, PHP_ROUND_HALF_UP);
//     //     echo "<br>";
//     //     echo $mul;
//     //     echo "<br>";
//     //     echo asin($mul);
//     //     echo "<br>";
//     //     echo asin(1);
//     //     echo "<br>";
//     //     $lareconchadelalora = 1;
//     //     echo asin($lareconchadelalora);
// }

// function sn($number, $case = 'e')
// { //scientific notation
//     $precision = cs;
//     $precision--;
//     $string = str_replace('+', '', sprintf('%.' . $precision . $case, $number)) . " ";
//     return $string;
// }

// function coeficiente($numero)
// {
//     $sNumero = sn($numero);
//     $lengt = $numero < 0 ? cs + 2 : cs + 1;
//     $lengt = cs == 1 ? $lengt - 1 : $lengt;
//     return substr($sNumero, 0, $lengt);
// }

// function exponente($numero)
// {
//     $sNumero = sn($numero);
//     $offset = $numero < 0 ? cs + 3 : cs + 2;
//     $offset = cs == 1 ? $offset - 1 : $offset;
//     return str_replace(" ", "", substr($sNumero, $offset));
// }
echo sin(deg2rad(180));
echo "<br>";
echo deg2rad(180);
die();