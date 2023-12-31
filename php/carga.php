<?php
// $_POST['fuerzaC'] = '';
// $_POST['cargaC'] = 234;
// $_POST['campoC'] = 545;
// $_POST['velocidadC'] = 323;
// $_POST['angulo'] = 180;
// $_POST['incognita'] = 'fuerza';
// $_POST['cs'] = 2;

$_POST['cs'] = empty($_POST['cs']) ? 1 : $_POST['cs'];
$_POST['fuerzaE'] = empty($_POST['fuerzaE']) ? 0 : $_POST['fuerzaE'];
$_POST['cargaE'] = empty($_POST['cargaE']) ? 0 : $_POST['cargaE'];
$_POST['campoE'] = empty($_POST['campoE']) ? 0 : $_POST['campoE'];
$_POST['velocidadE'] = empty($_POST['velocidadE']) ? 0 : $_POST['velocidadE'];
//$numero['error'] = false;
// if(isset($_POST['angulo'])){
//     if($_POST['angulo']<0){
//         $_POST['angulo']=$_POST['angulo']*-1;
//     }
// }
define('cs', $_POST['cs']);
switch ($_POST['incognita']) {

    case ('fuerza'):
        $valores['carga'] = $_POST['cargaC'] * pow(10, $_POST['cargaE']);
        $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
        $valores['velocidad'] = $_POST['velocidadC'] * pow(10, $_POST['velocidadE']);
        $valores['angulo'] = $_POST['angulo'] < 0 ? $_POST['angulo'] + 360 : $_POST['angulo'];
        if ($valores['angulo'] == 180 || $valores['angulo'] == -180) {
            $valores['fuerza'] = 0;
        } else {
            $valores['fuerza'] = $valores['carga'] * $valores['campo'] * $valores['velocidad'] * sin(deg2rad((float)$valores['angulo']));
        }
        break;
    case ('carga'):
        $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
        $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
        $valores['velocidad'] = $_POST['velocidadC'] * pow(10, $_POST['velocidadE']);
        $valores['angulo'] = $_POST['angulo'] < 0 ? $_POST['angulo'] + 360 : $_POST['angulo'];
        $valores['carga'] = $valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * sin(deg2rad((float)$valores['angulo'])));
        break;

    case ('campo'):
        $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
        $valores['carga'] = $_POST['cargaC'] * pow(10, $_POST['cargaE']);
        $valores['velocidad'] = $_POST['velocidadC'] * pow(10, $_POST['velocidadE']);
        $valores['angulo'] = $_POST['angulo'] < 0 ? $_POST['angulo'] + 360 : $_POST['angulo'];
        $valores['campo'] = $valores['fuerza'] / ($valores['carga'] * $valores['velocidad'] * sin(deg2rad((float)$valores['angulo'])));
        break;

    case ('velocidad'):
        $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
        $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
        $valores['carga'] = $_POST['cargaC'] * pow(10, $_POST['cargaE']);
        $valores['angulo'] = $_POST['angulo'] < 0 ? $_POST['angulo'] + 360 : $_POST['angulo'];
        $valores['velocidad'] = $valores['fuerza'] / ($valores['campo'] * $valores['carga'] * sin(deg2rad((float)$valores['angulo'])));
        break;

    case ('angulo'):
        $valores['fuerza'] = $_POST['fuerzaC'] * pow(10, $_POST['fuerzaE']);
        $valores['campo'] = $_POST['campoC'] * pow(10, $_POST['campoE']);
        $valores['velocidad'] = $_POST['velocidadC'] * pow(10, $_POST['velocidadE']);
        $valores['carga'] = $_POST['cargaC'] * pow(10, $_POST['cargaE']);
        $asin = floatval(strval($valores['fuerza'] / ($valores['campo'] * $valores['velocidad'] * $valores['carga'])));
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
$numero['velocidad']['coeficiente'] = coeficiente($valores['velocidad']);
$numero['velocidad']['exponente'] = exponente($valores['velocidad']);
$numero['carga']['coeficiente'] = coeficiente($valores['carga']);
$numero['carga']['exponente'] = exponente($valores['carga']);
$numero['angulo'] = round($valores['angulo'], 0, PHP_ROUND_HALF_UP);
$numero['incognita'] = $_POST['incognita'];



// $valores['fuerza'] = $valores['carga'] * $valores['campo'] * $valores['velocidad'] * sin(deg2rad((float)$valores['angulo']));



// echo $valores['angulo'];
// echo "<br>";
// echo (float)$valores['angulo'];
// echo "<br>";
// echo deg2rad((float)$valores['angulo']);
// echo "<br>";
// echo sin(deg2rad(180));
// echo "<br>";
// echo rad2deg(asin(0));
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";

// print_r($numero);

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
