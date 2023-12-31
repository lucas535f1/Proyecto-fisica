<?php
$anguloCampo = $_POST['anguloCampo'];
$intensidad = $_POST['valores']['intensidad']['coeficiente'];

?>
<div class="campo" id="vectorCampo" name="campo" style="top:calc(25% - 5px / 2); left: calc(25% - 20% / 2); transform: rotate(<?= $anguloCampo ?>deg);">
    <svg class="punta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
        <path class="puntaCampo" d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
    </svg>
</div>
<div class="campo" id="vectorCampo" name="campo" style="top:calc(25% - 5px / 2); left: calc(75% - 20% / 2); transform: rotate(<?= $anguloCampo ?>deg);">
    <svg class="punta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
        <path class="puntaCampo" d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
    </svg>
</div>
<div class="campo" id="vectorCampo" name="campo" style="top:calc(75% - 5px / 2); left: calc(25% - 20% / 2); transform: rotate(<?= $anguloCampo ?>deg);">
    <svg class="punta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
        <path class="puntaCampo" d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
    </svg>
</div>
<div class="campo" id="vectorCampo" name="campo" style="top:calc(75% - 5px / 2); left: calc(75% - 20% / 2); transform: rotate(<?= $anguloCampo ?>deg);">
    <svg class="punta" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
        <path class="puntaCampo" d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
    </svg>
</div>

<?php

if ($intensidad < 0) {
    $flecha = '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="black" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>';
    if ($_POST['valores']['fuerza']['coeficiente'] != 0) {
?>
        <div class="fs-4 mb-3 eos">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-record-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
            </svg>
            <span> Fuerza saliente</span>

        </div>
    <?php
    }
} else {
    $flecha = '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="black" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>';
    if ($_POST['valores']['fuerza']['coeficiente'] != 0) {
    ?>
        <div class="fs-4 mb-3 eos">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" style="max-width: 500px;" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
            </svg>
            <span> Fuerza entrante</span>
        </div>
<?php }
} ?>

<div class="conductor"></div>
<div class="flecha">
    <?= $flecha ?>
</div>