<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cross Site Request Forgery(CSRF)</h1>
    </div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
        Ganti Sandi Admin
    </div>
    <div class="panel-body">
    	<div class="row">
            <div class="col-lg-6">
            	<form role="form" method="POST" action="?p=bruteforce">
            		<div class="form-group">
                        <label>Sandi Baru</label>
                        <input class="form-control" type="passwrod" name="sandi1">
                        <p class="help-block">Masukan Sandi Baru</p>
                    </div>
                    <div class="form-group">
                        <label>konfirmasi Sandi Baru</label>
                        <input class="form-control" type="password" name="sandi2">
                        <p class="help-block">Masukan Sandi baru</p>
                    </div>
                    <button type="submit" value="masuk" name="masuk" class="btn btn-default">Masuk</button>
            	</form>
            </div>
        </div>
    </div>
</div>