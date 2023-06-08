    <!-- Favicons-->
    <link rel="icon" href="#" sizes="32x32">

    <!-- estilo do grafico chart-->
    <link rel="stylesheet" href="css/demo.css">
   
    <!-- materialize CSS-->
    <link href="css//materialize.css" type="text/css" rel="stylesheet">

     <!-- Estilo CSS-->
    <link href="css//style.css" type="text/css" rel="stylesheet">

    <!-- Aparte do scrollbar do sidebar -->
    <link href="css//perfect-scrollbar.css" type="text/css" rel="stylesheet">
  </head>

  <body>
    <!--  Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!--  HEADER -->
    <header id="header" class="page-topbar">
      <!-- header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
          <div class="nav-wrapper">

            <!--LogoTipo-->
            <ul class="left">
              <li>
                  <a href="index.php" class="brand-logo darken-1">
                    <img  src="images/logo/whj.png" alt="materialize logo">
                  </a>
              </li>
            </ul>

            <!--Barra de pesquisa-->
            <div class="header-search-wrapper hide-on-med-and-down">
              <i class="material-icons">search</i>
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Pesquisar" />
            </div>

             <!--Icons do menu -->
            <ul class="right hide-on-med-and-down">

              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="images/avatar/face19.jpg" alt="avatar">
                    <i></i>
                  </span>
                </a>
              </li>

              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                  <i class="material-icons">message
                    <small class="notification-badge pink accent-2">3</small>
                  </i>
                </a>
              </li>
            
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" >
                  <i class="material-icons">notifications_none
                    <small class="notification-badge pink accent-2">3</small>
                  </i>
                </a>
              </li>
              
            </ul>
        

            <!-- Mensagem-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>Mensagens <span class="new badge">3</span> </h6>
              </li>

              <li class="divider"></li>
              
              <li>
                <a href="message.php" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">person</span> Marcio comba</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 horas ago</time>
              </li>

              <li>
                <a href="message.php" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">person</span> Do whi le</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 dias ago</time>
              </li>

            </ul>

        
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="Perfil.php" class="grey-text text-darken-1">
                  <i class="material-icons">account_circle</i> Perfil</a>
              </li>

              <li class="divider"></li>
             
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>

          </div>
        </nav>
      </div>
    </header>