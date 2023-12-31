<?php
// $_POST['fuerzaC']=7.2;
// $_POST['intensidadC']=10;
// $_POST['campoC']=0.14;
// $_POST['longitudC']=5;
// $_POST['angulo']=180;
// $_POST['cs']=2; 
// $_POST['incognita']="fuerza";

$_POST['cs'] = empty($_POST['cs']) ? 1 : $_POST['cs'];
$_POST['fuerzaE'] = empty($_POST['fuerzaE']) ? 0 : $_POST['fuerzaE'];
$_POST['intensidadE'] = empty($_POST['intensidadE']) ? 0 : $_POST['intensidadE'];
$_POST['campoE'] = empty($_POST['campoE']) ? 0 : $_POST['campoE'];
$_POST['longitudE'] = empty($_POST['longitudE']) ? 0 : $_POST['longitudE'];
//$numero['error'] = false;
// if(isset($_POST['angulo'])){
//     if($_POST['angulo']<0){
//         $_POST['angulo']=$_POST['angulo']*-1;
//     }
// }

define('cs', $_POST['cs']);
switch ($_POST['incognita']) {

    case ('fuerza'):
        $valores['intensidad'] = $_POST['intensidadC'] * pow(10, $_POST['intensidadE']);
        $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
        $valores['longitud'] = $_POST['longitudC'] * pow(10, $_POST['longitudE']);
        $valores['angulo'] = $_POST['angulo'];
        if (abs($valores['angulo']) == 180) {
            $valores['fuerza'] = 0;
        } else {
            $valores['fuerza'] = $valores['intensidad'] * $valores['campo'] * $valores['longitud'] * sin(deg2rad((float)$valores['angulo']));
        }
        break;

    case ('intensidad'):
        $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
        $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
        $valores['longitud'] = $_POST['longitudC'] * pow(10, $_POST['longitudE']);
        $valores['angulo'] = $_POST['angulo'];
        $valores['intensidad'] = $valores['fuerza'] / ($valores['campo'] * $valores['longitud'] * sin(deg2rad((float)$valores['angulo'])));
        break;

    case ('campo'):
        $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
        $valores['intensidad'] = $_POST['intensidadC'] * pow(10, $_POST['intensidadE']);
        $valores['longitud'] = $_POST['longitudC'] * pow(10, $_POST['longitudE']);
        $valores['angulo'] = $_POST['angulo'];
        $valores['campo'] = $valores['fuerza'] / ($valores['intensidad'] * $valores['longitud'] * sin(deg2rad((float)$valores['angulo'])));
        break;

    case ('longitud'):
        $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
        $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
        $valores['intensidad'] = $_POST['intensidadC'] * pow(10, $_POST['intensidadE']);
        $valores['angulo'] = $_POST['angulo'];
        $valores['longitud'] = $valores['fuerza'] / ($valores['campo'] * $valores['intensidad'] * sin(deg2rad((float)$valores['angulo'])));
        break;

    case ('angulo'):
        $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
        $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
        $valores['longitud'] = $_POST['longitudC'] * pow(10, $_POST['longitudE']);
        $valores['intensidad'] = $_POST['intensidadC'] * pow(10, $_POST['intensidadE']);
        $asin = floatval(sn($valores['fuerza'] / ($valores['campo'] * $valores['longitud'] * $valores['intensidad'])));
        $valores['angulo'] = rad2deg(asin($asin));
        break;
}

if ($_POST['incognita'] == 'angulo') {
    if ($valores['angulo'] > 180) {
        $valores['angulo'] -= 360;
    }
} else {
    $valores['angulo'] = $_POST['angulo'];
}

$numero['fuerza']['coeficiente'] = coeficiente($valores['fuerza']);
$numero['fuerza']['exponente'] = exponente($valores['fuerza']);
$numero['campo']['coeficiente'] = coeficiente($valores['campo']);
$numero['campo']['exponente'] = exponente($valores['campo']);
$numero['longitud']['coeficiente'] = coeficiente($valores['longitud']);
$numero['longitud']['exponente'] = exponente($valores['longitud']);
$numero['intensidad']['coeficiente'] = coeficiente($valores['intensidad']);
$numero['intensidad']['exponente'] = exponente($valores['intensidad']);
$numero['angulo'] = round($valores['angulo'], 0, PHP_ROUND_HALF_UP);
$numero['incognita'] = $_POST['incognita'];

echo json_encode($numero, 1);

function sn($number, $case = 'e')
{ //scientific notation
    $precision = cs;
    $precision--;
    $string = str_replace('+', '', sprintf('%.' . $precision . $case, $number)) . " ";
    return $string;
}

function coeficiente($numero)
{
    $sNumero = sn($numero);
    $lengt = $numero < 0 ? cs + 2 : cs + 1;
    $lengt = cs == 1 ? $lengt - 1 : $lengt;
    return substr($sNumero, 0, $lengt);
}

function exponente($numero)
{
    $sNumero = sn($numero);
    $offset = $numero < 0 ? cs + 3 : cs + 2;
    $offset = cs == 1 ? $offset - 1 : $offset;
    return str_replace(" ", "", substr($sNumero, $offset));
}
