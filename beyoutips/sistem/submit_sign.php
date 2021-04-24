<?php
    include '../koneksi.php';
    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $pass= $_POST['password'];
        $insert = mysqli_query($koneksi,"INSERT INTO tb_login VALUES(
                '','".$name."',
                '".$email."',
                '".$pass."')
            ");
            if ($insert) {
                echo '<script>alert("Register Complete")</script>';
                echo '<script>window.location="../index.php"</script>';
            }else{
                echo '<script>alert("error bgst")</script>';
            }
        }
?>