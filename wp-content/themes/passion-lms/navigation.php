<nav id="nav_primary" class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a type="button" class="navbar-toggle toggleable" data-target="#mobile_navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <ul class="navbar-nav nav">
        <li>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand text-label">
            <img src="<?php echo get_template_directory_uri();?>/img/pcc_logo.png">
          </a>
        </li>
        <li>
          <a href="#" id="page_title" class="text-white">connect</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="primary_navigation_collapse">
      <div class="menu-header-menu-container">
        <ul id="menu-header-menu" class="menu nav navbar-nav navbar-right text-label">
          <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
            <a href="#" class="dropdown-toggle">TEAMS&nbsp;&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
            <div class="subnav-wrapper">
              <div class="row">
                <div class="col-sm-12">
                  <ul class="submenu">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        DASHBOARD
                      </a>
                    </li>
                    <?php
                    foreach($_SESSION['team_links'] as $t){
                      $team_name = $t[0];
                      $team_link = $t[1];
                    ?>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="<?php echo $team_link; ?>">
                        <?php echo $team_name; ?>
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div id="mobile_navigation" style="">
  <div class="menu-header-menu-container">
    <ul id="menu-header-menu-1" class="menu nav navbar-nav navbar-right text-label">
      <li class="menu-item menu-item-type-custom menu-item-object-custom">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">DASHBOARD</a>
      </li>
      <?php
      foreach($_SESSION['team_links'] as $t){
        $team_name = $t[0];
        $team_link = $t[1];
      ?>
      <li class="menu-item menu-item-type-custom menu-item-object-custom">
        <a href="<?php echo $team_link; ?>"><?php echo $team_name; ?></a>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>
