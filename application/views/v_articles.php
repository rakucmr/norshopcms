<? foreach ($articles as  $article):?>
<h2><a href="/articles/article/<?=$article->article_id?>"><?=$article->article_title?></a></h2>
<?=substr($article->article_text,0,255)?> ... <span style="float:right;padding-top:10px;"><a class="f-bu" href="/articles/article/<?=$article->article_id?>">Читать дале</a></span><br/><br/>
<? endforeach?>
<br/>
<?=$pagination?>

