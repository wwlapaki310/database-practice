<?php
ini_set("display_errors","On");

require_once("blog.php");
$blog=new Blog();

$blog->delete($_GET["id"]);

?>
<p><a href="/">home</a></p>