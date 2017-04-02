<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Command Injection</h1>
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
                        <label>Ping</label>
                        <input class="form-control" type="text" name="nama">
                        <p class="help-block">Masukan Alamat IP</p>
                    </div>

                    <button type="submit" value="masuk" name="masuk" class="btn btn-default">Masuk</button>
            	</form>
            </div>
        </div>
    </div>
</div>