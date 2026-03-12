<div class="row-fluid">
    <div class="row-fluid">
      <div class="span6">
          <span class="label label-info">Полезная информация</span>
        <div class="well">		
		<p>{$stiker_body}</p>		
	</div>          
          <span class="label label-info">Кого нет</span>
        <div class="well">		
		{section name=i loop=$ArrayUsersProfile}
                    {if $ArrayUsersProfile[i]["faza"]!="Работает"}
                        <a target='_blank' href=?content_page=eq_list&usid={$ArrayUsersProfile[i]["id"]}>
                        <i class="icon-user"></i>{$ArrayUsersProfile[i]["fio"]}</a> в {$ArrayUsersProfile[i]["faza"]} до {$ArrayUsersProfile[i]["enddate"]}<br>
                    {/if}
                {/section}
	</div>                  
      </div>
      <div class="span6">
        <span class="label label-info">Новости,обьявления</span>
        <div class="well" id=newslist name=newslist>
	</div>    
      <ul class="pager">
	<li class="previous"><a href="#" id=newsprev name=newsprev>&larr; Назад</a></li>
	<li class="next"><a href="#" id=newsnext name=newsnext>Вперед &rarr;</a></li>
	</ul>      
      </div>
    </div>
</div>	
<script type="text/javascript" src="controller/client/js/news_main.js"></script>
<div class="row-fluid">
    <div class="span12">               
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        <span class="label label-info">Пользователи системы (Нажмите чтобы развернуть)</span>
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner">
	{section name=i loop=$ArrayUsers}
	 <i class="icon-user"></i><a target='_blank' href=?content_page=eq_list&usid={$ArrayUsers[i]["id"]}>{$ArrayUsers[i]["login"]}</a> 
        {/section}
      </div>
    </div>
  </div>
    </div>        
</div>       
 <script>$(".collapseOne").collapse('hide');</script>