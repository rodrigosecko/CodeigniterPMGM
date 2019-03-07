
<style type="text/css">
    #izquierda{
        padding-left: 10px;
        float:left;
    }
    
    #derecha{
        padding-left: 10px;
        float:left;
    }
</style>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        ADMINISTRACI&Oacute;N DE LA UBICACI&Oacute;N <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">
                            <div class="col-lg-2 col-md-4">
                                <button type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva Ubicaci&oacute;n</button>
                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                   <table class="table table-bordered table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Descripci&oacute;n</th>
                                                <th>Alias</th>
                                                <th>Coeficiente</th>
                                                <th>Acci&oacute;n</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($ubicacion as $lis){
                                                $datos = $lis->ubicacion_id."||".
                                                         $lis->descripcion."||".
                                                         $lis->alias."||".
                                                         $lis->coeficiente;
                                                

                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $lis->descripcion;?></td>
                                                <td><?php echo $lis->alias;?></td>
                                                <td><?php echo $lis->coeficiente;?></td>
                                                
                                                <td>

                                                    <button type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                            <span class="fas fa-pencil-alt" aria-hidden="true">
                                                            </span>
                                                    </button> 
                                                    <a href="<?= base_url('ubicacion/eliminar/'. $lis->ubicacion_id); ?>" type="button" class="btn btn-danger footable-delete">
                                                        <span class="fas fa-trash-alt" aria-hidden="true">
                                                        </span>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                        <?php 
                                         }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-6">
                        
                    </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

              
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Ubicaci&oacute;n</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>ubicacion/update" method="POST">-->
                        <?php echo form_open('ubicacion/update', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <input type="text" hidden="" id="ubicacion_id" name="ubicacion_id">
                            </div>

                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" id="descripcion" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Alias</label>
                                <input type="text" class="form-control" id="alias" name="alias" id="alias" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Coeficiente</label>
                                <input type="integer" class="form-control" id="coeficiente" name="coeficiente" id="coeficiente" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="Modal_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar Nueva Ubicaci&oacute;n</h4>
                    </div>
                    <?php 
                        $edirol = $this->uri->segment(3);
                    ?>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>ubicacion/insertar" method="POST">-->
                        <?php echo form_open('ubicacion/insertar', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="recipient-name1" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Alias</label>
                                <input type="text" class="form-control" id="recipient-name1" name="alias" value="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Coeficiente</label>
                                <input type="integer" class="form-control" id="recipient-name1" name="coeficiente">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
       


        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/edit/ubicacionscript.js"></script>

    <script>
        function agregarform(datos)
        {
             d=datos.split('||');
              $('#ubicacion_id').val(d[0]);
              $('#descripcion').val(d[1]);
              $('#alias').val(d[2]);
              $('#coeficiente').val(d[3]);
        }

    </script>