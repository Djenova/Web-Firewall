<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Brute Force Test</h1>
    </div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
        Login Form
    </div>
    <div class="panel-body">
    	<div class="row">
            <div class="col-lg-6">
            	<form role="form" method="POST" action="?p=bruteforce">
            		<div class="form-group">
                        <label>Nama Pengguna</label>
                        <input class="form-control" type="text" name="nama">
                        <p class="help-block">Masukan Nama Pengguna</p>
                    </div>
                    <div class="form-group">
                        <label>Sandi</label>
                        <input class="form-control" type="password" name="password">
                        <p class="help-block">Masukan Sandi</p>
                    </div>
                    <button type="submit" value="masuk" name="masuk" class="btn btn-default">Masuk</button>
            	</form>
            	<?php
            		if (isset($_POST['masuk'])) {

                  if (($_POST['nama'] == "admin") && ($_POST['password'] = "123abc")) {
                    echo "Berhasil Login";
                  } else {
                    echo "Username / Password Salah";
                  }
            		}
            	?>
            </div>
        </div>
    </div>
</div>
