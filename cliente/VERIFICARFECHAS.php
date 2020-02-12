<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <script>
//            document.getElementById("fechaInicio").value = "2019-05-03"
//            document.getElementById("fechaFin").value = "2019-05-02"

            function ConvertirStringToDate(fechaString)
            {
                var fechas = fechaString.split('/');
                if (fechas.length != 3)
                    fechas = fechaString.split('-');
                var tipoDate = new Date(parseInt(fechas[0]), parseInt(fechas[1]) - 1, parseInt(fechas[2]));
                return tipoDate;
            }

            function ValidarFiltroDeFechas() {
                let stringFechaDesde = document.getElementById("fechaInicio").value;
                let stringFechaHasta = document.getElementById("fechaFin").value;
                Validador = {Estado: true, Mensaje: ''};
                if (stringFechaDesde === "" && stringFechaHasta === "") {
                    return alert("Fechas Vacías!");
                }
                if (stringFechaDesde === "") {
                    return alert("Por favor ingresar fecha de Inicio");
                }
                if (stringFechaHasta === "") {
                    return alert("Por favor ingresar fecha de Fin");
                }
                var dateDesde = ConvertirStringToDate(stringFechaDesde);
                var dateHasta = ConvertirStringToDate(stringFechaHasta);
                if (dateDesde > dateHasta) {
                    return alert("Fecha Incio no puede ser mayor a Fecha Final" + dateDesde + dateHasta);
                } else {

                    alert(dateDesde + dateHasta + "DATOS CORRECTOS!!!!!!!!!!!!!!")
                }
            }
        </script>
        <b>Fecha Despegue:</b><input type="date"  class="form-control-static" name="txtfechadespegue" id="fechaInicio"   required>
        <b>Fecha Arribo:</b><input type="date"   class="form-control-static" name="txtfechaarribo" id="fechaFin" required>
        <button onClick="ValidarFiltroDeFechas()">validar</button>
    </body>

</html>
