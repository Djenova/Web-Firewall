<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Log Manajemen</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
          <?php
            if (isset($_GET['hapus'])) {
                $file = $_GET['hapus'];
                if ($_GET['j']=='b') {
                  $path = __DIR__.'/../logs/blacklist/'.$file;
                }elseif ($_GET['j']=='a') {
                  $path = __DIR__.'/../logs/attacker/'.$file;
                } else {
                  echo "errors";
                }
                if (!@unlink($path)){
                  echo ("Error deleting $file");
                }else {
                  echo ("Deleted $file");
                }
            } elseif (isset($_GET['unduh'])) {
                $file = $_GET['unduh'];

            }
           ?>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Log Penyerangan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $admin->LoadLog("a"); ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Log Penyerangan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $admin->LoadLog("b"); ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
