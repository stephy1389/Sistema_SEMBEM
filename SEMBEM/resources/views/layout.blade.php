<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SEMBEM | Servicio de Emergencias Médicas Bomberos del Estado Miranda</title>

    <!--Llamada del css para el calendario-->
    <link href="{{ asset('jquery/datetimepicker-master/jquery.datetimepicker.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Estilos propios -->
    <link href="{{ asset('css/bower_components/bootstrap/dist/css/style.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset ('css/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset ('css/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset ('css/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!--Llamada del css para los selects-->
    <link href="{{ asset('jquery/select2-4.0.1/dist/css/select2.min.css') }}" rel="stylesheet" />

    <!--Llamada del css para el switch de bootstrap-->
    <link href="{{ asset ('css/bootstrap-switch-master/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    @yield('menu')

    @yield('contenido');

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Derechos de Autor</strong></h4>
                    <p>3Estudiantes Del IUT</p>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-phone fa-fw"></i> (416) 421-3639
                            <i class="fa fa-phone fa-fw"></i> (426) 421-3639
                            <i class="fa fa-phone fa-fw"></i> (416) 421-3639
                        <li>
                            <i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">ponceclarisbel@gmail.com</a>
                            <i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">evemendez.1702@gmail.com</a>
                            <i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">tephy.sweetest@gmail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; 20016</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- /#wrapper -->

<!--Llamadas de los .js para el calendario-->
<script src="{{ asset('jquery/datetimepicker-master/jquery.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset ('css/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('css/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('css/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('css/dist/js/sb-admin-2.js') }}"></script>

<!-- Select Multiple -->
<script src="{{ asset('jquery/select2-4.0.1/dist/js/select2.min.js') }}"></script>

<script src="{{ asset('jquery/datetimepicker-master/jquery.datetimepicker2.js') }}" type="text/javascript"></script>
<script src="{{ asset('jquery/datetimepicker-master/jquery.datetimepicker.js') }}" type="text/javascript"></script>

<!-- Switch Bootstrap -->
<script src="{{ asset ('css/bootstrap-switch-master/dist/js/bootstrap-switch.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $("#selectbuscador1, #selectbuscador2, #selectbuscador3, #p_sexo, #p_edo_civil, #p_nacionalidad,"+
          "#per_id_especialidad, #per_seccion, #per_id_jerarquia, #u_permisologia_acc,"+
          "#u_permisologia_morb, #u_status, #p_tipo, #pni_color_ojos, #pni_color_piel, #pni_color_cabello, #pni_contextura, #selectbuscador4")
          .select2();
    });

    <!-- Select Multiple Cargo -->
    $(document).ready(function(){
        $("#pc_id_cargo, #pc_id_cargo_mod").select2({placeholder:"Seleccione un Cargo"});
    });

    <!-- Select Multiple Examen Médico -->
    $(document).ready(function(){
        $("#pie_id_examen_medico").select2({placeholder:"Seleccione un Examen Médico"});
    });

    <!-- Fecha de Nacimiento -->
    $(document).ready(function(){
        $("#p_fecha_nacimiento, #fechabuscadorpni, #fechabuscadorpiexapc, #fechabuscadorpiexrtro").datetimepicker({
            format:	'd/m/Y',
            timepicker:false,
            mask:false,
            validateOnBlur:true,
            allowBlank:true
        });
    });

    <!-- Fecha y Hora de Ingreso de Paciente No Identificado y Fecha y Hora de Aplicación de Examen Médico -->
    $(document).ready(function(){
        $("#pni_fecha_ing, #pie_fecha_aplicacion, #pie_fecha_retiro").datetimepicker({
            format:'d/m/Y g:i a',
            formatTime:'g:i a',
            mask:false,
            validateOnBlur:true,
            allowBlank:true
        });
    });

    <!-- Para ordenar alfabéticamente los Cargos en el Formulario de Modificar Personal -->
    function ordenarSelect(id_componente)
    {
        var selectToSort = jQuery('#' + id_componente);
        var optionActual = selectToSort.val();
        selectToSort.html(selectToSort.children('option').sort(function (a, b) {
            return a.text === b.text ? 0 : a.text < b.text ? -1 : 1;
        })).val(optionActual);
    }

    $(document).ready(function () {
        ordenarSelect('pc_id_cargo_mod');
    });

    $("[name='resetpassword'], [id='_pie_status_entrega'], [id='_pie_status_realizar']").bootstrapSwitch();

</script>


</body>

</html>
