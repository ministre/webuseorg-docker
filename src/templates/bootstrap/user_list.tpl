<div class="row-fluid">
  <div class="span12">
      <table class="table">
  <caption>Пользователи системы</caption>
  <thead>
    <tr>
      <th>ФИО</th>
      <th>Должность</th>
      <th>Фаза</th>
      <th>Конец фазы</th>
      <th>Пришел</th>
    </tr>
  </thead>          
    <tbody>
	{section name=i loop=$ArrayUsersProfile}
    <tr {if $ArrayUsersProfile[i]["ddd"]=="1"}{if $ArrayUsersProfile[i]["faza"]=="Работает"}class="error"{/if}{/if}>
      <td>	 <i class="icon-user"></i>
         <a target='_blank' href=?content_page=eq_list&usid={$ArrayUsersProfile[i]["id"]}>
             {$ArrayUsersProfile[i]["fio"]}
         </a> 
    </td>
      <td>{$ArrayUsersProfile[i]["post"]}</td>          
      <td>{$ArrayUsersProfile[i]["faza"]}</td>
      <td>{$ArrayUsersProfile[i]["enddate"]}</td>
      <td>{$ArrayUsersProfile[i]["go"]}</td>
    </tr>
        {/section}      
        </tbody>
        </table>
  </div>
</div>    
