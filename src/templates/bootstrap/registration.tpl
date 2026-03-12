<div class="hero-unit">
    <div class="row-fluid">
      <div class="span12">
          <span class="label label-info">Регистрация нового пользователя</span>
          <form class="well" action="?login_step=reg" method="post" name="form1" target="_self">
             <label>Организация:</label>
            <select name=reg_orgid>
                {section name=i loop=$ArrayOrg}
                  <option value={$ArrayOrg[i]["id"]}{if $reg_orgid==$ArrayOrg[i]["id"]} selected{/if}>{$ArrayOrg[i]["name"]}</option>
                {/section}
            </select>
            <div class="row-fluid">
                <div class="span4">
                        <label>Логин:</label>
                        <input name="reg_login" type="text" id="reg_login" value="{$reg_login}">
                </div>
                <div class="span4">
                    <label>Пароль:</label>
                    <input name="reg_pass" type="password" id="reg_pass" value="{$reg_pass}">
                </div>
                <div class="span4">
                    <label>E-mail:</label>
                    <input name="reg_email" type="text" id="reg_email" value="{$reg_email}">
                </div>
            </div>          
            <div align=center><input type="submit"  name="Submit" value="Зарегистироваться"></div>                
          </form>
      </div>        
    </div>    
</div>
</div>