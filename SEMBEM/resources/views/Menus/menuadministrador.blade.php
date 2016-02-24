@extends('Layout.layout')

@section('menu')
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">SEMBEM</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> Nuevo Mensaje
                            <span class="pull-right text-muted small">hace 14 minutos</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> Tiene 3 Nuevos Twiters
                            <span class="pull-right text-muted small">hace 18 minutos</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Mensajes
                            <span class="pull-right text-muted small">hace 10 minutos</span>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesi&oacuten</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{  route('admin.administrador.index') }}"><i class="fa fa-user fa-fw"></i> Personal<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{  route('admin.personal.create') }}"><i class="fa fa-list-alt"></i> Insertar Personal</a>
                        </li>
                        <li>
                            <a href="{{  route('admin.personal.index') }}"><i class="fa fa-th-list"></i> Consultar Personal</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{  route('admin.administrador.index') }}"><i class="fa fa-male fa-fw"></i> Paciente<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{  route('admin.administrador.index') }}"><i class="fa fa-user fa-fw"></i>Paciente Identificado<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{  route('admin.pacienteidentificado.create') }}"><i class="fa fa-list-alt"></i> <font style="font-size:11.5px">Insertar Paciente Identificado</font></a>
                                </li>
                                <li>
                                    <a href="{{  route('admin.pacienteidentificado.edit.cedula') }}"><i class="fa fa-edit"></i> <font style="font-size:11.5px">Modificar Paciente Identificado</font></a>
                                </li>
                                <li>
                                    <a href="{{  route('admin.pacienteidentificado.consultar.cedula') }}"><i class="fa fa-th-list"></i> <font style="font-size:11.5px">Consultar Paciente Identificado</font></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{  route('admin.administrador.index') }}"><i class="fa fa-user fa-fw"></i>Paciente No Identificado<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{  route('admin.pacientenoidentificado.create') }}"><i class="fa fa-list-alt"></i> <font style="font-size:11px">Insertar Paciente No Identificado</font></a>
                                </li>
                                <li>
                                    <a href="{{  route('admin.pacientenoidentificado.index') }}"><i class="fa fa-th-list"></i> <font style="font-size:10.5px">Consultar Paciente No Identificado</font></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="tables.html"><i class="fa fa-table fa-fw"></i>C&oacutedigos de Morbilidad<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="insertCodigos.html">Insertar C&oacutedigos</a>
                        </li>
                        <li>
                            <a href="modifyCodigos.html">Modificar C&oacutedigos</a>
                        </li>
                        <li>
                            <a href="consultCodigos.html">Consultar C&oacutedigos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="tables.html"><i class="fa fa-table fa-fw"></i>Confirmaci&oacuten de Morbilidad<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="pagAceptar.html">Aceptar</a>
                        </li>
                        <li>
                            <a href="pagDeclinar.html">Declinar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="tables.html"><i class="fa fa-table fa-fw"></i>Referido<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="insertReferencia.html">Agregar Referencia</a>
                        </li>
                        <li>
                            <a href="consultReferencia.html">Consultar Referencia</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{  route('admin.administrador.index') }}"><i class="fa fa-user-md fa-fw"></i> Atención Médica<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="blank.html">Consulta M&eacutedica</a>
                        </li>
                        <li>
                            <a href="blank.html">Citas M&eacutedicas</a>
                        </li>
                        <li>
                            <a href="blank.html">Emergencias M&eacutedicas</a>
                        </li>
                        <li>
                            <a href="blank.html">Otras Atenciones</a>
                        </li>

                        <li>
                            <a href="{{  route('admin.administrador.index') }}"><i class="fa fa-file-text-o fa-fw"></i>Exámenes Médicos<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{  route('admin.examenmedico.create') }}"><i class="fa fa-list-alt"></i> <font style="font-size:13px">Insertar Examen Médico</font></a>
                                </li>
                                <li>
                                    <a href="{{  route('admin.examenmedico.pacienteidentificado.edit.cedula') }}"><i class="fa fa-edit"></i> <font style="font-size:13px">Modificar Examen Médico</font></a>
                                </li>
                                <li>
                                    <a href="{{  route('admin.examenmedico.consultar.cedula') }}"><i class="fa fa-th-list"></i> <font style="font-size:13px">Consultar Examen Médico</font></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Gestionar Reportes<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="reportEstadistico.html">Reporte Estad&iacutestico</a>
                        </li>
                        <li>
                            <a href="reportMorbilidad.html">Reporte de Morbilidad</a>
                        </li>
                        <li>
                            <a href="reportReferencia.html">Reporte de Referencia</a>
                        </li>
                        <li>
                            <a href="reportGenerico.html">Reporte Generico</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{  route('admin.administrador.index') }}"><i class="fa fa-gear fa-fw"></i> Gestionar Perfil<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{  route('admin.perfil.edit',53) }}"><i class="fa fa-key"></i> <font style="font-size:12px">Modificar Contraseña</font></a>
                        </li>
                        <li>
                            <a href="{{  route('admin.perfil.edit.pregunta',53) }}"><i class="fa fa-lock"></i> <font style="font-size:12px">Modificar Pregunta de Seguridad</font></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
@stop
