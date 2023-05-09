<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>URUNLER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  Urun Ekle
                </button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
    if (isset($_POST['save'])) {
       if ($_POST['save']==1001) {
       print $name=$adminclass->getSecurity($_POST['name']);
        $description=$adminclass->getSecurity($_POST['description']);
        $sql="SELECT * FROM yonetimpaneli.urunler;INSERT INTO `yonetimpaneli`.`urunler`
        (
        `name`,
        `description`)
        VALUES(?,?);";
        $args=[$name,$description];
        $result = $adminclass->getSecurity($args);
       print $adminclass->pdoInsert($sql,$args);
       }
    } 
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
      

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Urunler Listesi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>İsim</th>
                    <th>Aciklama</th>
                    <th>İslem</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php $variable= $adminclass->getAbout(); foreach ($variable as $value) { ?>
                  <tr>
                    <td><?php print $value['id']?></td>
                    <td><?php print $value['name']?></td>
                    <td><?php print $value['description']?></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal1-default<?php print $value['id']?>">sil</button>
                    <div class="modal fade" id="modal1-default<?php print $value['id']?>">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">URUNLER</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Ürün Sil</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST">
                              <input type="hidden" name="dataDelete" value="<?php print $value['id']?>">
                              <p><?php print $value['name']?></p>  
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Vazgeç</button>
                            <button type="submit" class="btn btn-danger">Sil</button>
                            </div>
                            <input type="hidden" name="save" value="1001">
                                </form>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- general form elements disabled -->
                        
                            <!-- /.card -->
                        </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
                  </tr>
                 <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>İsim</th>
                    <th>Aciklama</th>
                    <th>İslem</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Yeni Ürün Ekle</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      
                      <div class="form-group">
                        <label>Urun Ismi</label>
                        <input type="text" class="form-control" name="name">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Aciklama</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                      </div>
                    </div>
                 

                

                  
                      
                    </div>
                  </div>

                  
                    

                
                    
                  </div>
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
              <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
            <input type="hidden" name="save" value="1001">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
           
            <!-- /.card -->
          </div>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      