<?php


function menu (){
	return "<body>
    <!-- Navigation -->
    <nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
        <div class='container'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='#'>
                    <img src='imagenes/e.png' id='logo'>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav'>
                    <li>
                        <a href='#'>Clientes</a>
                    </li>
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Reservas <b class='caret'></b></a>
                        <ul class='dropdown-menu'>
                          <li><a href='#'>Individuales</a></li>
                          <li><a href='#'>Multiples</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href='#'>Calendario</a>
                    </li>
                    <li>
                        <a href='#'>Tarifas y bonos</a>
                    </li>
                    <li>
                        <a href='#'>Configuracion</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12'>

            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src='js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='js/bootstrap.min.js'></script></body>";
}
?>
