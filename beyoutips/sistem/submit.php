<?php 
session_start();
include '../koneksi.php';
						if (isset($_POST['submit'])) {
							$user = $_POST['username'];
							$pass = $_POST['password'];
							//admin
							$cek = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE username  = '".$user."' AND password = '" .$pass."'");
							//user
							$check = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username = '".$user."' AND password = '".$pass."'");
							//admin
							if(mysqli_num_rows($cek) > 0){
								$d = mysqli_fetch_object($cek);
								$_SESSION['status_login'] = true;
								$_SESSION['a_global'] = $d;
								$_SESSION['id'] = $d->id_admin;
								echo '<script>window.location="../admin/admin.php"</script>';
							}
							//user
							else if(mysqli_num_rows($check) > 0) {
								$u = mysqli_fetch_object($check);
								$_SESSION['status_login'] = true;
								$_SESSION['u_global'] = $u;
								$_SESSION['id'] = $u->id_user;
								echo '<script>window.location="../home.php"</script>';
							}
							else{
								echo '<script>alert("username atau password anda salah!")</script>';
								echo '<script>window.location="../index.php"</script>';
							}
						} 
					?>