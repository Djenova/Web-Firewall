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
            	<form role="form" method="POST" action="?p=command">
            		<div class="form-group">
                        <label>Command</label>
                        <input class="form-control" type="text" name="command">
                        <p class="help-block">Masukan Alamat yang akan di ping</p>
                    </div>

                    <button type="submit" value="masuk" name="masuk" class="btn btn-default">Masuk</button>
            	</form>
              <?php
                if (isset($_POST['command'])) {
                  $cmd = $_POST['command'];
                  echo "<pre>";
                  echo shell_exec("ping ".$cmd);
                  echo "</pre>";
                }
               ?>
            </div>
        </div>
    </div>
</div>
