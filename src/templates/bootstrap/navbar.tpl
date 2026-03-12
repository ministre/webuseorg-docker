   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Учет ТМЦ</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Главная <b class="caret"></b></a>
                <ul class="dropdown-menu">                    
                    {section name=i loop=$menu_user}                                 
                       {include file="modules/menu/user/{$menu_user[i]}"}
                    {/section}                    
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Справочники <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    {section name=i loop=$menu_handbook}                            
                       {include file="modules/menu/handbook/{$menu_handbook[i]}"}
                    {/section}                    
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Реестры <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    {section name=i loop=$menu_doc}                       
                       {include file="modules/menu/doc/{$menu_doc[i]}"}
                    {/section}                    
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Администрирование <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    {section name=i loop=$menu_admin}
                       {include file="modules/menu/admin/{$menu_admin[i]}"}
                    {/section}                    
                </ul>
              </li>
            </ul>
            {if $user_randomid eq ''}
            <form class="navbar-form pull-right" action="?login_step=enter" method="post" name="form1" target="_self">
              <input class="span2" type="text" placeholder="Логин" name="enter_user_login" id="enter_user_login" value="{$enter_user_login}">
              <input class="span2" type="password" placeholder="Пароль"  name="enter_user_pass" id="enter_user_pass" value="{$enter_user_pass}">
              <button type="submit" class="btn">Войти</button>
            </form>
            {else}
            <a href=index.php?login_step=logout><button type="submit" class="btn">Выйти</button></a>
            {/if}
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <script type="text/javascript" src="templates/{$theme}/js/bootstrap.min.js"></script>