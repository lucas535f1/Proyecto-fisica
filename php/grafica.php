<?php
$velocidadC = abs(($_POST['valores']['velocidad']['coeficiente']));
$velocidadE = ($_POST['valores']['velocidad']['exponente']);
$campoC = abs(($_POST['valores']['campo']['coeficiente']));
$campoE = ($_POST['valores']['campo']['exponente']);
$anguloVelocidad = $_POST['anguloVelocidad'];
$anguloCampo = $_POST['anguloCampo'];
$carga = $_POST['valores']['carga']['coeficiente'];

if ($velocidadE > $campoE) {
    if ($velocidadC > $campoC) {
        $largoV = $velocidadC * 25;
        $largoC = $campoC * 25;
    } else {
        $largoC = $velocidadC * 25;
        $largoV = $campoC  * 25;
    }
} elseif ($velocidadE < $campoE) {
    if ($velocidadC > $campoC) {
        $largoC = $velocidadC * 25;
        $largoV = $campoC  * 25;
    } else {
        $largoC = $campoC * 25;
        $largoV = $velocidadC  * 25;
    }
} else {
    $largoV = $velocidadC * 25;
    $largoC = $campoC * 25;
}
if ($carga > 0) {
    $saliente = true;
    $color = "red";
    $signo = "+";
} else {
    $saliente = false;
    $color = "blue";
    $signo = "-";
}

if ($_POST['valores']['angulo'] > 0) {
    $saliente = !$saliente;
}
if ($_POST['valores']['fuerza']['coeficiente'] != 0) {
    if ($saliente) {
?>
        <div class="fs-4 mb-3 eos">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-record-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
            </svg>
            <span> Fuerza saliente</span>
        </div>


    <?php } else { ?>
        <div class="fs-4 mb-3 eos">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
            </svg>
            <span> Fuerza entrante</span>
        </div>
<?php }
} ?>
<div class="carga" style="background-color: <?= $color ?>;"><?= $signo ?></div>
<div class="campo" name="campo" style="width: <?= $largoC ?>px; transform: rotate(<?= $anguloCampo ?>deg);">
    <svg class="punta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
        <path class="puntaCampo" d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
    </svg>
</div>
<div class="velocidad" name="velocidad" style=" transform: rotate(<?= $anguloVelocidad ?>deg); width: <?= $largoV ?>px;">
    <svg class="punta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
        <path class="puntaVelocidad" d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
    </svg>
</div>