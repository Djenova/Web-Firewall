<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Beranda</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-exclamation-triangle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $admin->CountLog("attacker") ?></div>
                        <div>Serangan Hari Ini</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <!--<span class="pull-left">Lebih Lanjut</span>-->
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $admin->CountLog("blacklist") ?></div>
                        <div>IP terblokir hari ini</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <!--<span class="pull-left">Lebih Lanjut</span>-->
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $admin->CountLog("blacklistall") ?></div>
                        <div>IP terblokir sepanjang masa</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <!--<span class="pull-left">Lebih Lanjut</span>-->
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-exclamation-circle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $admin->CountLog("attackerall") ?></div>
                        <div>Total Serangan Sepanjang Masa</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <!--<span class="pull-left">Lebih Lanjut</span>-->
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> 10 Serangan Terakhir
                <div class="pull-right">

                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Alamat</th>
                        <th>Jenis Serangan</th>
                        <th>Jam</th>
                        <th>URL</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $admin->LoadDailyTable("a"); ?>
                  </tbody>
              </table>
            </div>
            <!-- /.panel-body -->
        </div>

        <!-- /.panel -->
    </div>
    <!-- /.col-lg-8 -->
    <!-- /.col-lg-4 -->
</div>
