div = document.getElementById("alert")
function error() {
    div.innerHTML = `
    <div>
        <div class="alert alert-warning alert-dismissible">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            Operacion invalida
        </div>
    </div>`
    console.log("Error");
}

$('#form').submit(function (e) {
    e.preventDefault();
    // console.log($('#cs').val());
    // console.log( $('#fuerzaC').val(),);
    // console.log( $('#fuerzaE').val(),);
    // console.log($('#cargaC').val(),);
    // console.log($('#cargaE').val(),);
    // console.log($('#campoC').val(),);
    // console.log($('#campoE').val(),);
    // console.log($('#velocidadC').val(),);
    // console.log($('#velocidadE').val(),);
    // console.log($('#angulo').val());
    ajax()
});


function ajax() {
    if (document.getElementById('incognita').value != "carga " && $('#cargaC').val() == 0) {
        error()
    } else {
        $.ajax({
            type: "post",
            url: "../php/carga.php",
            data: {
                incognita: document.getElementById('incognita').value,
                cs: $('#cs').val(),
                fuerzaC: $('#fuerzaC').val(),
                fuerzaE: $('#fuerzaE').val(),
                cargaC: $('#cargaC').val(),
                cargaE: $('#cargaE').val(),
                campoC: $('#campoC').val(),
                campoE: $('#campoE').val(),
                velocidadC: $('#velocidadC').val(),
                velocidadE: $('#velocidadE').val(),
                angulo: $('#anguloRange').val()
            },
            dataType: 'json',
            success: function (data) {
                console.log(data)
                $('#fuerzaC').val(data['fuerza']['coeficiente'])
                $('#fuerzaE').val(data['fuerza']['exponente'])
                $('#cargaC').val(data['carga']['coeficiente'])
                $('#cargaE').val(data['carga']['exponente'])
                $('#campoC').val(data['campo']['coeficiente'])
                $('#campoE').val(data['campo']['exponente'])
                $('#velocidadC').val(data['velocidad']['coeficiente'])
                $('#velocidadE').val(data['velocidad']['exponente'])
                $('#angulo').val(Math.abs(data['angulo']))
                $('#anguloRange').val(data['angulo'])
                if (data['angulo'] < 0) {
                    antihorario()
                } else {
                    horario()
                }
                if (data['incognita'] == angulo) {
                    velAngulo = $('campoAngulo').val() + data['angulo']
                    if (velAngulo == 360) {
                        velAngulo = 0
                    }
                    $('#velocidadAngulo').val(velAngulo)
                    $('#velocidadRange').val(velAngulo)
                    //changeAngulo()
                }
                else {
                    changeAngulo()
                }

                $.ajax({
                    type: "post",
                    url: "../php/grafica.php",
                    data: {
                        valores: data,
                        anguloCampo: $('#campoAngulo').val(),
                        anguloVelocidad: $('#velocidadAngulo').val(),
                    },
                    success: function (response) {
                        //console.log(response)
                        $('#grafica').html(response)
                    }
                });

            },
            error: function () {
                error()
                console.log("successnt")
            }

        });
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////
/*$('#form').submit(function (e) {
    e.preventDefault();
    console.log("1");
    console.log($('#cs').val());
    console.log($('#fuerzaC').val(),);
    console.log($('#fuerzaE').val(),);
    console.log($('#cargaC').val(),);
    console.log($('#cargaE').val(),);
    console.log($('#campoC').val(),);
    console.log($('#campoE').val(),);
    console.log($('#velocidadC').val(),);
    console.log($('#velocidadE').val(),);
    console.log($('#angulo').val());
    $.ajax({
        type: "post",
        url: "./php/carga.php",
        data: {
            cs: $('#cs').val(),
            fuerzaC: $('#fuerzaC').val(),
            fuerzaE: $('#fuerzaE').val(),
            cargaC: $('#cargaC').val(),
            cargaE: $('#cargaE').val(),
            campoC: $('#campoC').val(),
            campoE: $('#campoE').val(),
            velocidadC: $('#velocidadC').val(),
            velocidadE: $('#velocidadE').val(),
            angulo: $('#angulo').val()
        },
        success: function (response) {
            console.log(response);
            console.log("si");
            if (data['error'] !=false ) {
                error();
                console.log("Error123");
            } else {
// $('#fuerzaC').val(data['fuerza']['coeficiente'])
// $('#fuerzaE').val(data['fuerza']['exponente'])
// $('#cargaC').val(data['carga']['coeficiente'])
// $('#cargaE').val(data['carga']['exponente'])
// $('#campoC').val(data['campo']['coeficiente'])
// $('#campoE').val(data['campo']['exponente'])
// $('#velocidadC').val(data['velocidad']['coeficiente'])
// $('#velocidadE').val(data['velocidad']['exponente'])
// $('#angulo').val(data['angulo'])
console.log("funca");
$.ajax({
    type: "post",
    url: "./php/grafica.php",
    data: {valores: data},
    success: function (response) {
        $('#grafica').html(response)
    }
});
}
},
error: function (response) {
console.log(response)
console.log("no")
}

});
});
*/


function selIncognita() {

    let incognita = document.getElementById('incognita').value;
    switch (incognita) {
        case "fuerza":
            console.log("entra")
            document.getElementById('fuerzaC').setAttribute('disabled', true);
            document.getElementById('fuerzaE').setAttribute('disabled', true);
            // $('#fuerzaC').val('')
            // $('#fuerzaE').val('')

            document.getElementById('cargaC').removeAttribute('disabled');
            document.getElementById('cargaE').removeAttribute('disabled');
            document.getElementById('velocidadC').removeAttribute('disabled');
            document.getElementById('velocidadE').removeAttribute('disabled');
            document.getElementById('campoC').removeAttribute('disabled');
            document.getElementById('campoE').removeAttribute('disabled');
            document.getElementById('anguloRange').removeAttribute('disabled');
            document.getElementById('angulo').removeAttribute('disabled');
            document.getElementById('campoRange').removeAttribute('disabled');
            document.getElementById('campoAngulo').removeAttribute('disabled');
            document.getElementById('velocidadRange').removeAttribute('disabled');
            document.getElementById('velocidadAngulo').removeAttribute('disabled');
            document.getElementById('horario').removeAttribute('disabled');
            document.getElementById('antiHorario').removeAttribute('disabled');

            break;

        case "carga":
            console.log("entra")
            document.getElementById('cargaC').setAttribute('disabled', true);
            document.getElementById('cargaE').setAttribute('disabled', true);
            // $('#cargaC').val('')
            // $('#cargaE').val('')

            document.getElementById('fuerzaC').removeAttribute('disabled');
            document.getElementById('fuerzaE').removeAttribute('disabled');
            document.getElementById('velocidadC').removeAttribute('disabled');
            document.getElementById('velocidadE').removeAttribute('disabled');
            document.getElementById('campoC').removeAttribute('disabled');
            document.getElementById('campoE').removeAttribute('disabled');
            document.getElementById('anguloRange').removeAttribute('disabled');
            document.getElementById('angulo').removeAttribute('disabled');
            document.getElementById('campoRange').removeAttribute('disabled');
            document.getElementById('campoAngulo').removeAttribute('disabled');
            document.getElementById('velocidadRange').removeAttribute('disabled');
            document.getElementById('velocidadAngulo').removeAttribute('disabled');
            document.getElementById('horario').removeAttribute('disabled');
            document.getElementById('antiHorario').removeAttribute('disabled');

            break;

        case "velocidad":
            console.log("entra")
            document.getElementById('velocidadC').setAttribute('disabled', true);
            document.getElementById('velocidadE').setAttribute('disabled', true);
            // $('#velocidadC').val('')
            // $('#velocidadE').val('')

            document.getElementById('fuerzaC').removeAttribute('disabled');
            document.getElementById('fuerzaE').removeAttribute('disabled');
            document.getElementById('cargaC').removeAttribute('disabled');
            document.getElementById('cargaE').removeAttribute('disabled');
            document.getElementById('campoC').removeAttribute('disabled');
            document.getElementById('campoE').removeAttribute('disabled');
            document.getElementById('anguloRange').removeAttribute('disabled');
            document.getElementById('angulo').removeAttribute('disabled');
            document.getElementById('campoRange').removeAttribute('disabled');
            document.getElementById('campoAngulo').removeAttribute('disabled');
            document.getElementById('velocidadRange').removeAttribute('disabled');
            document.getElementById('velocidadAngulo').removeAttribute('disabled');
            document.getElementById('horario').removeAttribute('disabled');
            document.getElementById('antiHorario').removeAttribute('disabled');

            break;

        case "campo":
            console.log("entra")
            document.getElementById('campoC').setAttribute('disabled', true);
            document.getElementById('campoE').setAttribute('disabled', true);
            // $('#campoC').val('')
            // $('#campoE').val('')

            document.getElementById('fuerzaC').removeAttribute('disabled');
            document.getElementById('fuerzaE').removeAttribute('disabled');
            document.getElementById('cargaC').removeAttribute('disabled');
            document.getElementById('cargaE').removeAttribute('disabled');
            document.getElementById('velocidadC').removeAttribute('disabled');
            document.getElementById('velocidadE').removeAttribute('disabled');
            document.getElementById('anguloRange').removeAttribute('disabled');
            document.getElementById('angulo').removeAttribute('disabled');
            document.getElementById('campoRange').removeAttribute('disabled');
            document.getElementById('campoAngulo').removeAttribute('disabled');
            document.getElementById('velocidadRange').removeAttribute('disabled');
            document.getElementById('velocidadAngulo').removeAttribute('disabled');
            document.getElementById('horario').removeAttribute('disabled');
            document.getElementById('antiHorario').removeAttribute('disabled');


            break;

        case "angulo":
            console.log("entra angulo")
            document.getElementById('anguloRange').setAttribute('disabled', true);
            document.getElementById('angulo').setAttribute('disabled', true);
            document.getElementById('velocidadRange').setAttribute('disabled', true);
            document.getElementById('velocidadAngulo').setAttribute('disabled', true);
            document.getElementById('horario').setAttribute('disabled', true);
            document.getElementById('antiHorario').setAttribute('disabled', true);


            document.getElementById('fuerzaC').removeAttribute('disabled');
            document.getElementById('fuerzaE').removeAttribute('disabled');
            document.getElementById('cargaC').removeAttribute('disabled');
            document.getElementById('cargaE').removeAttribute('disabled');
            document.getElementById('velocidadC').removeAttribute('disabled');
            document.getElementById('velocidadE').removeAttribute('disabled');
            document.getElementById('campoC').removeAttribute('disabled');
            document.getElementById('campoE').removeAttribute('disabled');
            break;
    }
}



function changeAngulo() {
    let angulo = parseInt(document.getElementById('anguloRange').value)
    //console.log(angulo)
    angulo += parseInt(document.getElementById('campoAngulo').value)
    //console.log(angulo)
    if (angulo < 0) {
        angulo += 360
    }
    //console.log(angulo)
    if (angulo >= 360) {
        angulo -= 360
    }
    //console.log(angulo)
    $('#velocidadAngulo').val(angulo)
    $('#velocidadRange').val(angulo)
}

function changeCampoAngulo() {
    let angulo = parseInt(document.getElementById('campoAngulo').value)
    //console.log(angulo)
    angulo -= parseInt(document.getElementById('velocidadAngulo').value)
    //console.log(angulo)
    if (angulo < 0) {
        angulo += 360
    }
    if (angulo >= 360) {
        angulo -= 360
    }
    if (angulo > 180) {
        angulo -= 360
    }
    $('#angulo').val(Math.abs(angulo))
    $('#anguloRange').val(angulo)
    if (angulo < 0) {
        antihorario()
    } else {
        horario()
    }
}

function changeVelocidadAngulo() {
    let angulo = parseInt(document.getElementById('velocidadAngulo').value)
    //console.log(angulo)
    angulo -= parseInt(document.getElementById('campoAngulo').value)
    //console.log(angulo)
    if (angulo < 180) {
        angulo += 360
    }
    if (angulo > 180) {
        angulo -= 360
    }
    $('#angulo').val(Math.abs(angulo))
    $('#anguloRange').val(angulo)
    if (angulo < 0) {
        antihorario()
    } else {
        horario()
    }
}


function vectores() {
    if (document.getElementById("paloCampo") !== null) {
        paloCampo()
        paloVelocidad()
    }
    else {
        console.log($('#anguloRange').val())
        ajax()
    }
}

function paloCampo() {
    let palo = document.getElementById('paloCampo')
    let valor = "rotate(" + document.getElementById('campoAngulo').value + "deg)"
    //console.log(valor)
    palo.style.transform = valor
}
function paloVelocidad() {
    let palo = document.getElementById('paloVelocidad')
    palo.style.transform = "rotate(" + document.getElementById('velocidadAngulo').value + "deg)"
}

document.getElementById('customRange2').addEventListener("input", () => {
    document.getElementById('cs').value = document.getElementById('customRange2').value
})

document.getElementById('cs').addEventListener("change", () => {
    document.getElementById('customRange2').value = document.getElementById('cs').value
})

document.getElementById('campoRange').addEventListener("input", () => {
    document.getElementById('campoAngulo').value = document.getElementById('campoRange').value
    vectores()
    if (document.getElementById("paloCampo") !== null) {
        changeCampoAngulo()
    }
})

document.getElementById('campoAngulo').addEventListener("change", () => {
    document.getElementById('campoRange').value = document.getElementById('campoAngulo').value
    vectores()
    if (document.getElementById("paloCampo") !== null) {
        changeCampoAngulo()
    }


})

document.getElementById('velocidadRange').addEventListener("input", () => {
    document.getElementById('velocidadAngulo').value = document.getElementById('velocidadRange').value
    changeVelocidadAngulo()
    vectores()
})



document.getElementById('velocidadAngulo').addEventListener("change", () => {
    document.getElementById('velocidadRange').value = document.getElementById('velocidadAngulo').value
    changeVelocidadAngulo()
    vectores()
})

document.getElementById('anguloRange').addEventListener("input", () => {
    document.getElementById('angulo').value = Math.abs(document.getElementById('anguloRange').value)
    if (document.getElementById('anguloRange').value < 0) {
        antihorario()
    } else {
        horario()
    }
    changeAngulo()
    vectores()
})

document.getElementById('angulo').addEventListener("change", () => {
    if ($("#horario").is(":checked")) {
        document.getElementById('anguloRange').value = document.getElementById('angulo').value
    } else {
        document.getElementById('anguloRange').value = document.getElementById('angulo').value * -1
    }
    changeAngulo()
    vectores()
})

function setHorario() {
    if (document.getElementById('horario').getAttribute("disabled") != "true") {
        horario()
        document.getElementById('anguloRange').value = Math.abs(document.getElementById('anguloRange').value)
        changeAngulo()
        vectores()
    }
}
function setAntiHorario() {
    if (document.getElementById('antiHorario').getAttribute("disabled") != "true") {
        antihorario()
        if (document.getElementById('anguloRange').value > 0) {
            document.getElementById('anguloRange').value = document.getElementById('anguloRange').value * -1
        }
        changeAngulo()
        vectores()
    }
}
function antihorario() {
    var remove = document.querySelectorAll('.horario')
    for (var i = 0; i < remove.length; i++) {
        remove[i].removeAttribute('checked');
    }
    var add = document.querySelectorAll('.antiHorario')
    for (var i = 0; i < add.length; i++) {
        add[i].setAttribute('checked', true)
    }
}


function horario() {
    if (document.getElementById('horario').getAttribute("disabled") != "true") {
        var remove = document.querySelectorAll('.antiHorario')
        for (var i = 0; i < remove.length; i++) {
            remove[i].removeAttribute('checked');
        }
        var add = document.querySelectorAll('.horario')
        for (var i = 0; i < add.length; i++) {
            add[i].setAttribute('checked', true)
        }
    }
}

function proton() {
    $('#cargaC').val(1.602176)
    $('#cargaE').val(-19)
}
function electron() {
    $('#cargaC').val(-1.602176)
    $('#cargaE').val(-19)
    console.log("entra")
}

