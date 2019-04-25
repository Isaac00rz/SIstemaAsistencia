<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel = "stylesheet" href = "{{ asset('css/menu.css') }}"/>
        <script src="{{ asset('js/jquery-1.3.2.js') }}"></script>
    </head>
    <body>
        <div class="header"></div>
        <div class="scroll"></div>
        <ul id="navigation">
            <li class="home"><a href="{{ url('/home') }}" title="Home"></a></li>
            <li class="about"><a href="{{ url('/Admin/Usuarios') }}" title="Usuarios"></a></li>
            <li class="search"><a href="{{ url('/Admin/Alumnos')}}" title="Alumnos"></a></li>
            <li class="rssfeed"><a href="{{ url('Admin/Semestre') }}" title="Semestre"></a></li>
            <li class="podcasts"><a href="{{ url('/Admin/Reportes')}}" title="Reportes"></a></li>
            <li class="contact"><a href="{{ route('logout') }}" title="Salir"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 
             </a></li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <script type="text/javascript">
            $(function() {
                $('#navigation a').stop().animate({'marginLeft':'-85px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-85px'},200);
                    }
                );
            });
        </script>
