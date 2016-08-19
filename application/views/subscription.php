<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<title>Подписка</title>
    <link rel="stylesheet" href="<?base_url();?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?base_url();?>css/bootstrap-theme.min.css" />
    <script src="<?base_url();?>js/jquery.js"></script> 
    <script src="<?base_url();?>js/bootstrap.js"></script>
    <script src="<?base_url();?>js/subscription.js"></script>
</head>
<body>

<table class="table table-striped table-bordered">
    <tr>
        <td>ID</td>    
        <td>Название</td>
        <td>Подписаться</td>
    </tr>
    <?foreach($company as $item):?>
    <tr>
        <td><?=$item['id']?></td>    
        <td><?=$item['companyname']?></td>
        <td>
            <a href="#" class="btn btn-primary btn-pd" data-toggle="modal" data-comp="<?=$item['companyname']?>" data-compid="<?=$item['id']?>">
             Подписаться
            </a>
        </td>
    </tr>
<?php endforeach;?>
</table>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                 
                 <hr />
                 <?foreach($subs_t as $item_st):?>
                 <input type="hidden" id="idcom" data-user="<?=$user_log?>" />
                 <input class='checktype' type="checkbox" data-id='<?=$item_st['id']?>' id="ch-<?=$item_st['id']?>" name="ch-<?=$item_st['id']?>" value="<?=$item_st['id']?>" /><?=$item_st['typename']?>
                 <?php endforeach;?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-cl" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary btn-pod" data-user="<?=$user_log?>">Сохранить</button>
                    
                </div>
                </div>
            </div>
            </div>
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                
                <div class="modal-body">
                 <h5 class="modal-title" id="myModalLabel1"></h5>
                </div>
                </div>
            </div>
            </div>
            

    <h4 id="sqs"></h4>
    <input type="search" name="query" id="searq" placeholder="Поиск">
    <button type="submit" class="sbut">Найти</button> 

            
<? if ($company_p != "error") {?>
<table class="table table-striped table-bordered">
<?foreach($company_p as $item):?>
    <tr>
        <td><?=$item['id']?></td>    
        <td><?=$item['companyname']?></td>
        <td>
            <a href="#" class="btn btn-primary btn-pd" data-toggle="modal" data-comp="<?=$item['companyname']?>" data-compid="<?=$item['id']?>">
             Подробнее
            </a>
        </td>
    </tr>
<?php endforeach;?>
</table>
<?}
else {echo "
Нет подписок
";}?>
</body>
</html>