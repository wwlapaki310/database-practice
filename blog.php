<?php
require_once("dbc.php");

Class Blog extends Dbc
{
    protected $table_name="blog";
    //3.display category name
    public static function setCategoryName($category){
        if($category ==="1"){
            return "dairy";
        }else if($category ==="2"){
            return "programming";
        }else{
            return "other";
        }
    }

    public function blogCreate($blogs){
        $sql="INSERT INTO 
            $this->table_name(title, content, category, publish_status)
                VALUES 
                        (:title, :content, :category, :publish_status)";
            $dbh=$this->dbConnect();
            $dbh->beginTransaction();

            try {
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(":title", $blogs["title"], PDO::PARAM_STR);
                $stmt->bindValue(":content", $blogs["content"], PDO::PARAM_STR);
                $stmt->bindValue(":category", $blogs["category"], PDO::PARAM_INT);
                $stmt->bindValue(":publish_status", $blogs["publish_status"], PDO::PARAM_INT);
                $stmt->execute();
                $dbh->commit();
                echo "Post New Blog!";
            } catch (PDOException $e){
                $dbh->rollBack();
                exit($e);
            }
    }

    public function blogUpdate($blogs)
    {
        $sql="UPDATE $this->table_name SET
                title=:title, content=:content, category=:category, publish_status=:publish_status
              WHERE
                id=:id";
            $dbh=$this->dbConnect();
            $dbh->beginTransaction();

            try {
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(":title", $blogs["title"], PDO::PARAM_STR);
                $stmt->bindValue(":content", $blogs["content"], PDO::PARAM_STR);
                $stmt->bindValue(":category", $blogs["category"], PDO::PARAM_INT);
                $stmt->bindValue(":publish_status", $blogs["publish_status"], PDO::PARAM_INT);
                $stmt->bindValue(":id", $blogs["id"], PDO::PARAM_INT);
                $stmt->execute();
                $dbh->commit();
                echo "Update Blog!";
            } catch (PDOException $e){
                $dbh->rollBack();
                exit($e);
            }
    }

    public function blogValidate($blogs)
    {
        if(empty($blogs["title"])){
            exit("Please input title");
        }
        
        if(mb_strlen($blogs["title"]>191)){
            exit("The title should be 191 characters or less");
        }
        
        if(empty($blogs["content"])){
            exit("Please input content");
        }
        
        if(empty($blogs["category"])){
            exit("Please input category");
        }
        
        if(empty($blogs["publish_status"])){
            exit("Please input publish_status");
        }

    }
}

?>