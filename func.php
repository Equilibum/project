<?php
    include "connect.php";

    function q(){
        $l = $_POST['loginl'];
        $p = $_POST['password'];

        $query = mysql_query('SELECT * FROM admin WHERE login="'.$l.'"');
        $repass = mysql_fetch_array($query);
        return $repass['password'];
    }

    function menu(){
        echo '
            <div class="upmenuq">
                            <form method="POST" ENCTYPE="multipart/form-data">
                <label>Заголовок:</label>
                <input type="text" name="title" autocomplete="off">
                <label>Текст</label>
                <textarea name="text"></textarea>
 Select the file to upload: <input type="file" name="userfile">
 <input type="submit" name="upload" value="Загрузить">
</form>
            </div>
                       <form method="post">  <div class="downmenu"><input type="submit" name="exit" value="Выход"></div>
    </form>
        ';
        if(isset($_POST['upload'])){
            $uploaddir = 'uploads/'; // Relative path under webroot
            $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
            $title = $_POST['title'];
            $text = $_POST['text'];
            $photourl = $_FILES['userfile']['name'];

            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $query = 'INSERT INTO picture(url,title,text)VALUES("'.$photourl.'","'.$title.'","'.$text.'")';
                $sql = mysql_query($query);
            } else {
                echo "File uploading failed.\n";
            }

        }
    }
