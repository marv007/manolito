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
            <li><a href="vista-tickets.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
            <li><a href="ticket.php"><span class="glyphicon glyphicon-list-alt"></span>  Nuevo ticket</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["usuario"];?></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> Acerca de</a></li>
        </ul>
       
        </div><!--/.navbar-collapse -->
      </div>
    </nav>