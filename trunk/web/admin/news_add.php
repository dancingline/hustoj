<?php require_once ("admin-header.php");
require_once("../include/check_post_key.php");
if (!(isset($_SESSION['administrator']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
?>
<?php require_once ("../include/db_info.inc.php");
?>

<?php // contest_id


$title = $_POST ['title'];
$content = $_POST ['content'];
$user_id=$_SESSION['user_id'];
if (get_magic_quotes_gpc ()) {
	$title = stripslashes ( $title);
	$content = stripslashes ( $content );
}
$title=mysqli_real_escape_string($mysqli,$title);
$content=mysqli_real_escape_string($mysqli,$content);
$user_id=mysqli_real_escape_string($mysqli,$user_id);
$sql="insert into news(`user_id`,`title`,`content`,`time`) values('$user_id','$title','$content',now())";
mysqli_query($mysqli,$sql);
echo "<script>window.location.href=\"news_list.php\";</script>";
?>

