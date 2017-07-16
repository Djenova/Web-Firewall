<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pengaturan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-cogs fa-fw"></i> Pengaturan Umum
            </div>
            <div class="panel-body">
              <?php
                if (isset($_POST['simpan'])) {
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $maxbrute = $_POST['maxreq'];
                  $allowEkstensi = $_POST['ekstensi'];
                  $admin->SaveSetting($username,$password,$maxbrute,$allowEkstensi);
                  ?>
                  <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Pengaturan berhasil disimpan.
                  </div>
                  <?php
                }
               ?>
              <div class="row">
                <div class="col-lg-6">
                  <form role="form" method="POST" action="?p=pengaturan" >
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input class="form-control" name="username" value="<?php $admin->LoadSetting('username'); ?>">
                        <p class="help-block">Masukan nama pengguna untuk masuk</p>
                    </div>
                    <div class="form-group">
                        <label>Sandi</label>
                        <input class="form-control" name="password" type="password" value="<?php $admin->LoadSetting('password'); ?>">
                        <p class="help-block">Masukan Sandi untuk masuk</p>
                    </div>

                </div>
              </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-cogs fa-fw"></i> Pengaturan Aplikasi
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        <label>Maksimal permintaan halaman</label>
                        <input class="form-control" name="maxreq" value="<?php $admin->LoadSetting('maxbrute'); ?>">
                        <p class="help-block">Banyaknya permintaan halaman per menit</p>
                    </div>
                    <div class="form-group">
                        <label>Ekstensi yang diperbolehkan</label>
                        <input class="form-control" name="ekstensi" value="<?php $admin->LoadSetting('allowEkstensi'); ?>">
                        <p class="help-block">Masukan ekstensi yang diperbolehkan,pisahkan dengan tanda "," Contoh : txt,jpg,Jpeg</p>
                    </div>
                    <button type="submit" class="btn btn-default" name="simpan">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
