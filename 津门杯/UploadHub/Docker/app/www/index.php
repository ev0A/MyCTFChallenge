<html>
<head>
<title>生而为人，我很抱歉</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
    <body>  
        <h1>电影太仁慈，总能让错过的人重新相遇；生活不一样，有的人说过再见就再也不见了 -网易云</h1>

        <form action="" method="post"
enctype="multipart/form-data">
            <label for="file">filename:</label>
            <input type="file" name="file" id="file" /> 
            <input type="submit" name="submit" value="submit" />
        </form> 


<?php
    error_reporting(0);
    session_start();
    include('config.php');

    $upload = 'upload/'.md5("shuyu".$_SERVER['REMOTE_ADDR']);
    @mkdir($upload);
    file_put_contents($upload.'/index.html', '');
    
    if(isset($_POST['submit'])){
        $allow_type=array("jpg","gif","png","bmp","tar","zip");
        $fileext = substr(strrchr($_FILES['file']['name'], '.'), 1);
        if ($_FILES["file"]["error"] > 0 && !in_array($fileext,$type) && $_FILES["file"]["size"] > 204800){
            die('upload error');
        }else{
        
            $filename=addslashes($_FILES['file']['name']);
            $sql="insert into img (filename) values ('$filename')";
            $conn->query($sql);

            $sql="select id from img where filename='$filename'";
            $result=$conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id=$row["id"];
                }

            move_uploaded_file($_FILES["file"]["tmp_name"],$upload.'/'.$filename);
            header("Location: index.php?id=$id");
            }
        }
    }

    elseif (isset($_GET['id'])){
        $id=intval($_GET['id']);
        $sql="select filename from img where id=$id";
        $result=$conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $filename=$row["filename"];
            }
        $img=$upload.'/'.$filename;
        echo "<img src='$img'/>";
        }
    }


?>
<style>
      body{
   background:url(./back.jpg)  no-repeat right -160px  ;
   background-size:90%;
   background-attachment:fixed;
  background-color: rgba(255, 255, 255, 0.8);
}
      </style>
    </body>
</html>