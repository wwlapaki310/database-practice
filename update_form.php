<?php

require_once("blog.php");
$blog=new Blog();

$result=$blog->getById($_GET["id"]);

$id=$result["id"];
$title=$result["title"];
$content=$result["content"];
$category=(int)$result["category"];
$publish_status=(int)$result["publish_status"];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>PHP form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h2>Update form</h2>
    <form action="blog_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <p>Blog title:</p>
        <input type="text" name="title" value="<?php echo $title ?>">
        <p>Content:</p>
        <textarea name="content" id="content" cols="30" rows="10"><?php echo $content ?>"</textarea>
        <br>
        <p>category: </p>
        <select name="category">
            <option value="1"<?php if($category ===1)echo "selected"?>>diary</option>
            <option value="2"<?php if($category ===2)echo "selected"?>>programming</option>
        </select>
        <br>
        <input type="radio" name="publish_status" value="1" <?php if($publish_status === 1) echo "checked"?>>>publish
        <input type="radio" name="publish_status" value="2" <?php if($publish_status === 2) echo "checked"?>>unpublish
        <br>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>