<?php
$gpurl= $_POST['gpurl'];
$url = "https://play.google.com/store/apps/details?id=".$gpurl;
$input=@file_get_contents($url);
$regexp="<img\s[^>]*src=(\"??)([^\">]*?)\\1[^>]*>(.*)";
preg_match_all("/$regexp/siU",$input,$matches);
$l=$matches[2];
foreach($l as $link) {
if(substr($link,0,1) == "."){
$link = substr($link,1);
}
break; 
}
$regexp1="<span\s[^>]*data-video-url=(\"??)([^\">]*?)\\1[^?]*?(.*)";
preg_match_all("/$regexp1/siU",$input,$matches1);
$l1=$matches1[2];
foreach($l1 as $link1) {
if(substr($link1,0,1) == "."){
$link1 = substr($link1,1);
}
$pos = strpos($link1, '?');
$vlink=substr($link1, 0, $pos);
break; 
} 
?>

<title>
GP Crawler</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
form fieldset legend {
                           color: #000D19;
text-align :center;
 font-size: 40px;
text-shadow: 2px 2px #E5F2FF;
              
 }
</style>

<form class="form-horizontal" method='POST' action="index.html"  name="myForm" 
>
<fieldset>


<!-- Form Name -->
<legend>Fairket Digital Services - Google Play Store crawler</legend>


<div class="form-group">
  <label class="col-md-4 control-label" for="gpurl"><a href=<?php echo @$url;?>>Application URL</a></label>  
  <div class="col-md-6">
  <input id="gpurl" name="gpurl" value="<?php echo @$url;?>" readonly placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="gpurl"><a href=<?php echo @$link;?>>Application icon URL</a></label>  
  <div class="col-md-6">
  <input id="gpurl" name="gpurl1" value="<?php echo @$link;?>" readonly placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="gpurl"><a href=<?php echo @$vlink;?>>Application demo video URL</a></label>  
  <div class="col-md-6">
  <input id="gpurl" name="gpurl2" value="<?php echo @$vlink;?>" readonly placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-6">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Return Home</button>
  </div>
</div>
</fieldset>
</form>
