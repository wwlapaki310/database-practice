<?php

require_once("blog.php");
$blog=new Blog();

$result=$blog->getById($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Detail</title>
</head>
<body>
    <h2>Blog Detail</h2>
    <h3>title:<?php echo $result["title"] ?></h3>
    <p>date:<?php echo $result["post_at"] ?></p>
    <p>category:<?php echo $blog->setCategoryName($column["category"])?></p>
    <hr>
    <p>content:<?php echo $result["content"] ?></p>
    
</body>
</html>