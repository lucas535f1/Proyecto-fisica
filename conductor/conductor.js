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
    ajax()
});

function ajax() {
    $.ajax({
        type: "post",
        url: "../php/conductor.php",
        data: {
            incognita: document.getElementById('incognita').value,
            cs: $('#cs').val(),
            fuerzaC: $('#fuerzaC').val(),
            fuerzaE: $('#fuerzaE').val(),
            intensidadC: $('#intensidadC').val(),
            intensidadE: $('#intensidadE').val(),
            campoC: $('#campoC').val(),
            campoE: $('#campoE').val(),
            longitudC: $('#longitudC').val(),
            longitudE: $('#longitudE').val(),
            angulo: $('#campoRange').val()
        },
        dataType: 'json',
        success: function (data) {
            $('#fuerzaC').val(data['fuerza']['coeficiente'])
            $('#fuerzaE').val(data['fuerza']['exponente'])
            $('#intensidadC').val(data['intensidad']['coeficiente'])
            $('#intensidadE').val(data['intensidad']['exponente'])
            $('#campoC').val(data['campo']['coeficiente'])
            $('#campoE').val(data['campo']['exponente'])
            $('#longitudC').val(data['longitud']['coeficiente'])
            $('#longitudE').val(data['longitud']['exponente'])
            if (document.getElementById('incognita').value == "angulo") {
                $('#campoAngulo').val(Math.abs(data['angulo']))
                $('#campoRange').val(data['angulo'])
                console.log(data['angulo'])
                if (data['angulo'] < 180) {
                    horario()
                } else {
                    antihorario()
                }
            }

            $.ajax({
                type: "post",
                url: "../php/graficaCond.php",
                data: {
                    valores: data,
                    anguloCampo: $('#campoRange').val(),
                },
                success: function (response) {
                    //console.log(response)
                    $('#grafica').html(response)
                }
            });

        },
        error: function () {
            error()
        }

    });
}
/*
function ajax() {
    $('#form').submit(function (e) {
        e.preventDefault();
        // console.log("1");
        console.log($('#cs').val());
        console.log($('#fuerzaC').val(),);
        console.log($('#fuerzaE').val(),);
        console.log($('#intensidadC').val(),);
        console.log($('#intensidadE').val(),);
        console.log($('#campoC').val(),);
        console.log($('#campoE').val(),);
        console.log($('#longitudC').val(),);
        console.log($('#longitudE').val(),);
        console.log($('#campoAngulo').val());
        $.ajax({
            type: "post",
            url: "./php/conductor.php",
            data: {
                incognita: document.getElementById('incognita').value,
                cs: $('#cs').val(),
                fuerzaC: $('#fuerzaC').val(),
                fuerzaE: $('#fuerzaE').val(),
                intensidadC: $('#intensidadC').val(),
                intensidadE: $('#intensidadE').val(),
                campoC: $('#campoC').val(),
                campoE: $('#campoE').val(),
                longitudC: $('#longitudC').val(),
                longitudE: $('#longitudE').val(),
                angulo: $('#campoAngulo').val()
            },
            success: function (response) {
                console.log(response);
                console.log("si");
                // if (data['error'] !=false ) {
                //     error();
                //     console.log("Error123");
                // } else {
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
                    url: "./php/graficaCond.php",
                    data: { valores: response },
                    success: function (response) {
                        $('#grafica').html(response)
                    }
                });
            },
       
            error: function (response) {
                console.log(response)
                console.log("no")
            }

        });
});
}*/


function selIncognita() {

    let incognita = document.getElementById('incognita').value;
    switch (incognita) {
        case "fuerza":
            console.log("entra")
            document.getElementById('fuerzaC').setAttribute('disabled', true);
            document.getElementById('fuerzaE').setAttribute('disabled', true);
            // $('#fuerzaC').val('')
            // $('#fuerzaE').val('')

            document.getElementById('intensidadC').removeAttribute('disabled');
            document.getElementById('intensidadE').removeAttribute('disabled');
            document.getElementById('longitudC').removeAttribute('disabled');
            document.getElementById('longitudE').removeAttribute('disabled');
            document.getElementById('campoC').removeAttribute('disabled');
            document.getElementById('campoE').removeAttribute('disabled');
            document.getElementById('campoRange').removeAttribute('disabled');
            document.getElementById('campoAngulo').removeAttribute('disabled');
            document.getElementById('horario').removeAttribute('disabled');
            document.getElementById('antiHorario').removeAttribute('disabled');

            break;

        case "intensidad":
            console.log("entra")
            document.getElementById('intensidadC').setAttribute('disabled', true);
            document.getElementById('intensidadE').setAttribute('disabled', true);
            // $('#intensidadC').val('')
            // $('#intensidadE').val('')

            document.getElementById('fuerzaC').removeAttribute('disabled');
            document.getElementById('fuerzaE').removeAttribute('disabled');
            document.getElementById('longitudC').removeAttribute('disabled');
            document.getElementById('longitudE').removeAttribute('disabled');
            document.getElementById('campoC').removeAttribute('disabled');
            document.getElementById('campoE').removeAttribute('disabled');
            document.getElementById('campoRange').removeAttribute('disabled');
            document.getElementById('campoAngulo').removeAttribute('disabled');
            document.getElementById('horario').removeAttribute('disabled');
            document.getElementById('antiHorario').removeAttribute('disabled');

            break;

        case "longitud":
            console.log("entra")
            document.getElementById('longitudC').setAttribute('disabled', true);
            document.getElementById('longitudE').setAttribute('disabled', true);
            // $('#longitudC').val('')
            // $('#longitudE').val('')

            document.getElementById('fuerzaC').removeAttribute('disabled');
            document.getElementById('fuerzaE').removeAttribute('disabled');
            document.getElementById('intensidadC').removeAttribute('disabled');
            document.getElementById('intensidadE').removeAttribute('disabled');
            document.getElementById('campoC').removeAttribute('disabled');
            document.getElementById('campoE').removeAttribute('disabled');
            document.getElementById('campoRange').removeAttribute('disabled');
            document.getElementById('campoAngulo').removeAttribute('disabled');
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
            document.getElementById('intensidadC').removeAttribute('disabled');
            document.getElementById('intensidadE').removeAttribute('disabled');
            document.getElementById('longitudC').removeAttribute('disabled');
            document.getElementById('longitudE').removeAttribute('disabled');
            document.getElementById('campoRange').removeAttribute('disabled');
            document.getElementById('campoAngulo').removeAttribute('disabled');
            document.getElementById('horario').removeAttribute('disabled');
            document.getElementById('antiHorario').removeAttribute('disabled');

            break;

        case "angulo":
            console.log("entra angulo")
            document.getElementById('campoRange').setAttribute('disabled', true);
            document.getElementById('campoAngulo').setAttribute('disabled', true);
            document.getElementById('horario').setAttribute('disabled', true);
            document.getElementById('antiHorario').setAttribute('disabled', true);
            // $('#angulo').val('')
            // $('#anguloRange').val('')
            // $('#campoRange').val('')
            // $('#campoAngulo').val('')
            // $('#longitudRange').val('')
            // $('#longitudAngulo').val('')

            document.getElementById('fuerzaC').removeAttribute('disabled');
            document.getElementById('fuerzaE').removeAttribute('disabled');
            document.getElementById('intensidadC').removeAttribute('disabled');
            document.getElementById('intensidadE').removeAttribute('disabled');
            document.getElementById('longitudC').removeAttribute('disabled');
            document.getElementById('longitudE').removeAttribute('disabled');
            document.getElementById('campoC').removeAttribute('disabled');
            document.getElementById('campoE').removeAttribute('disabled');

            break;
    }
}

/*function changeCampoAngulo() {
    let angulo = parseInt(document.getElementById('campoAngulo').value)
    console.log(angulo)
    angulo -= parseInt(document.getElementById('velocidadAngulo').value)
    console.log(angulo)
    if (angulo > 360) {
        angulo -= 360
    }
    if (angulo < 0) {
        angulo += 360
    }
    console.log(angulo)
    $('#angulo').val(angulo)
    $('#anguloRange').val(angulo)
}*/

document.getElementById('customRange2').addEventListener("input", () => {
    document.getElementById('cs').value = document.getElementById('customRange2').value

})

document.getElementById('cs').addEventListener("change", () => {
    document.getElementById('customRange2').value = document.getElementById('cs').value
})

document.getElementById('campoRange').addEventListener("input", () => {
    document.getElementById('campoAngulo').value = Math.abs(document.getElementById('campoRange').value)
    if (document.getElementById('campoRange').value < 0) {
        antihorario()
    } else {
        horario()
    }
    vectores()
})

document.getElementById('campoAngulo').addEventListener("change", () => {
    if ($("#horario").is(":checked")) {
        document.getElementById('campoRange').value = document.getElementById('campoAngulo').value
    } else {
        document.getElementById('campoRange').value = document.getElementById('campoAngulo').value * -1
    }
    vectores()
})

function vectores() {
    if (document.getElementById("vectorCampo1") !== null) {
        paloCampo()
    }
    else {
        console.log($('#campoRange').val())
        ajax()
    }
}

function paloCampo() {
    var palo = document.querySelectorAll('.campo')
    let valor = "rotate(" + document.getElementById('campoRange').value + "deg)"
    for (var i = 0; i < palo.length; i++) {
        palo[i].style.transform = valor
    }

}

function setHorario() {
    if (document.getElementById('horario').getAttribute("disabled") != "true") {
        horario()
        document.getElementById('campoRange').value = Math.abs(document.getElementById('campoRange').value)
        vectores()
    }
}
function setAntiHorario() {
    if (document.getElementById('antiHorario').getAttribute("disabled") != "true") {
        antihorario()
        if (document.getElementById('campoRange').value > 0) {
            document.getElementById('campoRange').value = document.getElementById('campoRange').value * -1
        }
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
