
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <a class="navbar-brand" href="#">Ticket System</a>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Buscar Tickets">
            </div>
            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
          </form>

          <ul class="nav navbar-nav navbar-right">
            <li data-toggle="tooltip" data-placement="bottom" title="Aquí encontrarás tus Tickets"><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
            <li data-toggle="tooltip" data-placement="bottom" title="Redacta y envía un nuevo ticket"><a href="ticket.php"><span class="glyphicon glyphicon-plus"></span>  Nuevo ticket</a></li>
            <li class="dropdown" data-toggle="tooltip" data-placement="bottom" title="Consultar datos del perfil o cerrar sesión"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo utf8_decode($_SESSION["usuario"]);?>
            <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a href="#">Ver Perfil</a></li>
                      <li><a href="index.php">Cerrar sesión</a></li>
                      
                  </ul>    
          
        </li>
            <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> Acerca de</a></li>
        </ul>
       
        </div><!--/.navbar-collapse -->
      </div>
    </nav>