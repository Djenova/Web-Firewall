<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">XSS (Reflected)</h1>
    </div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
        Form Umum
    </div>
    <div class="panel-body">
    	<div class="row">
            <div class="col-lg-6">
            	<form role="form" method="POST" action="?p=xss1">
            		<div class="form-group">
                        <label>Siapa nama anda?</label>
                        <input class="form-control" type="text" name="nama">
                        <p class="help-block">Masukan Nama Anda</p>
                    </div>
                    <button type="submit" value="masuk" name="masuk" class="btn btn-default">Masuk</button>
            	</form>
                <?php
                    if (isset($_POST['masuk'])) {
                        echo "Nama = ".$_POST['nama'];
                    }
                ?>
            </div>
        </div>
    </div>
</div>