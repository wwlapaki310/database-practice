<?php
require_once("blog.php");
ini_set("display_errors","On");

$blog=new Blog();
$blogData= $blog->getAll();
function h($s){
    return htmlspecialchars($s,ENT_QUOTES,"UTF-8");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL Blog</title>
</head>
<body>
    <h2>All Blog</h2>
    <p><a href="/form.html">new blog</a></p>
    <table>
        <tr>
            <th>title</th>
            <th>category</th>
            <th>date</th>
        </tr>
        <?php foreach($blogData as $column): ?>
            <tr>
                <td><?php echo h($column["title"]) ?></td>
                <td><?php echo h($blog->setCategoryName($column["category"])) ?></td>
                <td><?php echo h($column["post_at"]) ?></td>
                <td><a href="/detail.php?id=<?php echo $column["id"] ?>">detail</a></td>
                <td><a href="/update_form.php?id=<?php echo $column["id"] ?>">Edit</a></td>
                <td><a href="/blog_delete.php?id=<?php echo $column["id"] ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>    
</body>
</html>