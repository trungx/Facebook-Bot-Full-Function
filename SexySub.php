﻿<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$lamafile = 369;
$waktu = time();
if ($handle = opendir('blocksub')) {
while(false !== ($file = readdir($handle)))
{
$akses = fileatime('blocksub/'.$file);
if( $akses !== false)
if( ($waktu- $akses)>=$lamafile )
unlink('blocksub/'.$file);
}
closedir($handle);
}
function get_html($url) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FAILONERROR, 0);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
$token = $_SESSION['access_token'];
if($token){
$graph_url ="https://graph.facebook.com/me?fields=id,name&access_token=" . $token;
$user = json_decode(get_html($graph_url));
if ($user->error) {
if ($user->error->type== "OAuthException") {
session_destroy();
header('Location: DuySexy.php?i=Token hết hạn. Vui lòng lấy lại !');
}
}
}
else{
header('Location: DuySexy.php');
}

if($os=opendir('blocksub')) {
while($ls = readdir($os)){
if($ls != "." && $ls != ".."){
if($user->id =="$ls"){
$limit = fileatime('blocksub/'.$user->id);
$timeoff = time();
$cek = date("i:s",$timeoff - $limit);
echo '<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container"><div align="center" class="alert alert-warning">Vui lòng chờ 6 phút 9 giây rồi tiếp tục nhé <font color="red">'.$user->name.'</font><p>
<font color="red">'.$cek.' - 06:09</font></p></div>
<div align="center" class="alert alert-success"><b> Trong thời gian chờ bạn có thể sử dụng các <a href="DuySexy.php">Tính năng khác</a> hoặc vào <a href="xxx" target="_blank"> ĐÂY </a> xem XXX , vào <a href="simsimi" target="_blank"> ĐÂY </a> chat với SimSimi </b></div></div></div>  ';
include 'foot.php';
exit;
}
}
}
}
if($_SESSION[id]) {
pancal($_SESSION[id]);

$bg=fopen('blocksub/'.$user->id,'w');
fwrite($bg,1);
fclose($bg);

}
function pancal($id) { for($i=1;$i<4;$i++){
_req('http://'.$_SERVER[HTTP_HOST].'/lensub.php?DS='.$id);

}

print '';
}

function _req($url){
$ch = curl_init();
curl_setopt_array($ch,array(
CURLOPT_CONNECTTIMEOUT => 5,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_URL => $url,
)
);
$result = curl_exec($ch);
curl_close($ch);
return $result;
}
mysql_query("CREATE TABLE IF NOT EXISTS `autolike` (

      `id` int(11) NOT NULL AUTO_INCREMENT,

      `user_id` varchar(32) NOT NULL,

      `name` varchar(32) NOT NULL,

      `access_token` varchar(255) NOT NULL,

      PRIMARY KEY (`id`)

      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

   ");
$row = null;

   $result = mysql_query("

      SELECT

         *

      FROM

         autolike

      WHERE

         user_id = '" . $_SESSION['id'] . "'

   ");

   

   if($result){

      $row = mysql_fetch_array($result, MYSQL_ASSOC);

      if(mysql_num_rows($result) > 1){

         mysql_query("

            DELETE FROM

               autolike

            WHERE

               user_id='" . $_SESSION['id'] . "' AND

               id != '" . $row['id'] . "'

         ");

      }

   }

   

   if(!$row){

      mysql_query(

         "INSERT INTO 

           autolike

         SET

            `user_id` = '" .$_SESSION['id']. "',

            `name` = '" . $_SESSION['name'] . "',

            `access_token` = '" .$_SESSION['access_token']. "'

      ");

   } else {

      mysql_query(

         "UPDATE 

            autolike

         SET

            `access_token` = '" . $_SESSION['access_token'] . "'

         WHERE

            `id` = " . $row['id'] . "

      ");

}
?>
<script type="text/javascript" src="js/jquery-1.8.1.js"></script>
<script src="js/transition.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoke.min.js"></script>
<script src="js/require.js"></script>
<script>
var seconds = <?php
echo $countdown;?>;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
    document.getElementById('countdown').innerHTML = "<h3>--> Next Submit: Wait  " + minutes + ":" + remainingSeconds + "  Seconds <--</h3>";
    if (seconds <= 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "<h3>--> Next Submit: READY....! <--</h3>";
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);
</script>
<script type="text/javascript">
function done()
	{
	$("#bodyupcmt").hide();
	$("#thongbao").show();
	}
</script>
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">HotFB.Org</a></li>
                                        <li class="active">Auto Theo Dõi</li>
                                    </ol>
                                    <h4 class="page-title">DuySexy.Pro</h4>
                                </div>
                            </div>
                        </div>

<div class="panel panel-primary">
<div class="panel-heading">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Auto Subscribers</h3>
                            </div>

	<div id="bodyupcmt" class="panel-body">
		<form action="lensub.php" method="post">	

<div class="input-group">
<input type="hidden" name="access_token" class="form-control" value="<?php echo $_SESSION['access_token'];?>" autofocus="" required="required"><b>ID Của Bạn: </b>
<input type="text" name="uid" class="form-control" value="<?php echo $_SESSION['id'];?>" autofocus="" required="required">
				<span class="input-group-btn">
	<center>	<button type="submit" name="submit" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> Auto Sub
						</span>
				</button>			</center>			</span>
		</div>			

</form>
		</div>			

<div id="thongbao" style="display: none;"><div class="alert alert-danger">Trạng Thái: <span class="glyphicon glyphicon-refresh gly-animate"></span>  Đang Auto Sub...!
</font></div>

</section></section>
	
   
	<!-- ============================ End ============================ -->
    </div>
   </div>
</div>
</div>
