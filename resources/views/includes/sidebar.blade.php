<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> 
                        <span class="block m-t-xs"> 
                            <strong class="font-bold">
                                @if(auth()->check())
                                    {{ auth()->user()->name }}
                                @endif
                            </strong>
                        </span> 
                        <!--<span class="text-muted text-xs block">Art Director <b class="caret"></b></span>--> 
                    </span> 
                </a>
                <!--<ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="mailbox.html">Mailbox</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>-->
            </div>
            <div class="logo-element">
                CEAN
            </div>
        </li>
        <li>
            <a href="{{ route('login') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Dashboard</span></a>
        </li>
        <li>
            <a href="javascript:vois(0)"><i class="fa fa-th-large"></i> <span class="nav-label">Alumnos</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="active"><a href="{{ route('alumnos.index') }}">Alumnos</a></li>
                <li><a href="{{ url('asistencias') }}">Asistencias</a></li>
                <li><a href="{{ url('pagos') }}">Pagos</a></li>
                <li><a href="{{ url('documentos') }}">Documentos</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:vois(0)"><i class="fa fa-th-large"></i> <span class="nav-label">Maestros</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="{{ activeMenu('maestros.index') }}"><a href="{{ route('maestros.index') }}">Maestros</a></li>
                <li><a href="{{ url('maestros/pagos') }}">Pagos</a></li>
                <li><a href="{{ url('maestros/calendario') }}">Calendario</a></li>
                <li><a href="{{ url('tareas') }}">Tareas</a></li>
                <li><a href="{{ url('asistencias') }}">Asistencias</a></li>
                <li><a href="{{ url('grupos') }}">Grupos</a></li>
                <li><a href="{{ url('materias') }}">Materias</a></li>
                <li><a href="{{ url('documentos') }}">Documentos</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:vois(0)"><i class="fa fa-th-large"></i> <span class="nav-label">Institución</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="{{ activeMenu('grupos.index') }}"><a href="{{ route('grupos.index') }}">Grupos</a></li>
                <li class="{{ activeMenu('periodos.index') }}"><a href="{{ route('periodos.index') }}">Periodo</a></li>
                <li class="{{ activeMenu('materias.index') }}"><a href="{{ route('materias.index') }}">Materias</a></li>
                <li><a href="{{ url('calendario') }}">Calendario</a></li>
                <li><a href="{{ url('calificaciones') }}">Calificaciones</a></li>
                <li><a href="{{ url('documentos') }}">Documentos</a></li>
            </ul>
        </li>
    </ul>

</div>

<?php 
    function activeMenu($url){
        if(Route::currentRouteName() == $url){
            return 'active';
        }else{
            return '';
        }
    }
?>