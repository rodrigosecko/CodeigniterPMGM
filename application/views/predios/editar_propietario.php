<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">

<!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Mapa de ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style="font-">
                <div id="map" style="width: 100%; height: 650px;"></div>
                <div id="carga_ajax_mapa"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                 <h4 class="card-title">Registro de los datos del propietario</h4>
                            <h6 class="card-subtitle">Ingrese los datos del propietario </h6>
                            </div>
                            <div class="col-md-6 col-4 align-self-center">
                                <button class="btn float-right hidden-sm-down btn-success">Cod. Catastral: <?php echo $codcatas; ?>
                                </button>
                            </div>
                        </div>
                             <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-info" type="button"><span class="btn-label">1</span> REGISTRO DEL PREDIO</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-info" type="button"><span class="btn-label">2</span> REGISTRO DE BLOQUES</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-info" type="button"><span class="btn-label">3</span> REGISTRO DE PROPIETARIO</button>
                                </div>
                            </div>
                            <p></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;height:15px;" role="progressbar"> 100% </div>
                            </div>
                            <p></p>
                            <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                            <!-- <?php // echo form_open('predios/guarda', array('method'=>'POST', 'enctype'=>"multipart/form-data")); ?> -->
                            <?php echo form_open_multipart('ddrr/modificar', array('method'=>'POST')); ?>
                            <!-- <?php //echo form_open('ddrr/guardar', array('method' => 'POST')); ?> -->
                                <div class="row">
                                    <div class="col-md-6" style="background-color: #f7f9ff;">
                                        <h6>Datos propietario</h6>
                                        <div  id="registro" style="padding-top: 30px;">
                                            <div class="button-box">
                                                <button class="btn btn-success waves-effect waves-light " type="button"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Propietario</button><span class="text-danger ">*</span> 
                                            </div>
                                        </div>
                                        <!-- <?php //echo form_open('path/to/controller/update/method'); ?> -->
                                        <div class="portlet-body" style="padding-top: 30px;">
                                          <!-- <form action="SendMatCivController/actualizar_carrito" method="post"> -->
                                            <!-- <?php //echo form_open('persona/insertar', array('method' => 'POST')); ?> -->
                                            <table cellpadding="6" cellspacing="1" class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2" border="1">
                                                <tr>
                                                    <th style="display:none;">RowId</th>
                                                    <th>N°</th>
                                                    <th>Nombre</th>
                                                    <th >Carnet de identidad</th>
                                                    <th >Porcentaje de participacion</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                                <?php
                                                    $i = 1;
                                                    $count = 1;
                                                ?>
                                                <?php foreach ($this->cart->contents() as $items): ?>
                                                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                                    <tr>
                                                        <td><?php echo $count;?></td>
                                                        <td style="display: none"><?php echo $items['id']; ?></td>
                                                        <td><?php echo $items['name']; ?></td>
                                                        <td><?php echo $items['price']; ?></td>
                                                        <td><?php echo $items['qty']; ?></td>

                                                        <td><a href="<?php echo site_url('persona/remove_edicion/'. $items['rowid'].'/' . $items['id']).'/'.$codcatas; ?>" class="btn btn-danger btn-xs" title="Borrar"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $i++;
                                                        $count++;
                                                    ?>
                                                <?php endforeach; ?>
                                                <?php if ($count == 1): ?> 
                                                    <tr><td colspan="5" style="text-align: center;">No existe propietarios</td></tr>
                                                <?php endif; ?>
                                                <tr>
                                                    <td colspan="2"> </td>
                                                    <td class="right"><strong>Total</strong></td>
                                                    <td id="total" class="right"><?php echo $this->cart->total_items(); ?> %</td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>  
                                    </div>

                                    <?php 
                                        $fecha_folio = date("d/m/Y", strtotime($fecha_folio));
                                        $fecha_testimonio = date("d/m/Y", strtotime($fecha_testimonio));
                                        $fecha_reg_libro = date("d/m/Y", strtotime($fecha_reg_libro));
                                    ?>
                                    <div class="col-md-6">
                                        <div class="row" style="background-color: #f6f6f6;">
                                            <div class="col-md-0">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="cod_catastral" name="cod_catastral" value="<?php echo $codcatas ?>" required />
                                                    <input type="hidden" class="form-control" id="ddrr_id" name="ddrr_id" value="<?php echo $ddrr_id ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Numero de matricula folio : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="nro_matricula_folio" value="<?php echo $nro_matricula_folio ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Numero de folio : <span class="text-danger">*</span> </label>
                                                    <input type="text" id="nro_folio" class="form-control" name="nro_folio" value="<?php echo $nro_folio ?>" placeholder="_.__._.__._______" title="Introducir numero de folio" input-mask="_.__._.__._______">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fecha de folio : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control date-inputmask" name="fecha_folio" value="<?php echo $fecha_folio?>" required />
                                                    <!-- <input placeholder="dd/mm/yyyy hh:mm" data-slots="dmyh"> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row "  style="background-color: #fffef7;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="participants1">Superficie legal : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control required" name="superficie_legal" value="<?php echo $superficie_legal ?>" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row "  style="background-color: #fffef7;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="participants1">Nombre del notario : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control required" name="nom_notario" value="<?php echo $nom_notario ?>" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background-color: #f6f6f6;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Numero de testimonio : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="nro_testimonio" value="<?php echo $nro_testimonio ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fecha de testimonio : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control date-inputmask" name="fecha_testimonio" value="<?php echo $fecha_testimonio ?>" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background-color: #fffef7;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Partida : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="partida" value="<?php echo $partida ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Partida computarizada : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="partida_computarizada" value="<?php echo $partida_computarizada ?>" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row "  style="background-color: #f6f6f6;">
                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label for="participants1">Foja : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control required" name="foja" value="<?php echo $foja ?>" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background-color: #fffef7;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Libro : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" name="libro" value="<?php echo $libro ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fecha de registro de libro : <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control date-inputmask" name="fecha_reg_libro" value="<?php echo $fecha_reg_libro ?>" required />

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions col-md-12 offset-md-11">
                                        <button type="submit" class="btn waves-effect waves-light btn-info">Finalizar registro</button>
                                    </div>
                                </div>
                            
                            <?php echo form_close(); ?>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel1">Registrar datos del propietario</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <!--<form action="<?php //echo base_url();?>persona/insertar" method="POST">-->
                                            <?php echo form_open('persona/insertar', array('method' => 'GET')); ?>
                                            <!--<input type="hidden" id="<?php// echo $this->security->get_csrf_token_name(); ?>" name="<?php// echo $this->security->get_csrf_token_name(); ?>" value="<?php //echo $this->security->get_csrf_hash(); ?>" />-->
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">
                                                                <label for="ci"> Carnet : <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" id="ci1" name="ci1" required />
                                                                <small id="msg_error_catastral" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                                                <small id="msg_sucess_catastral" class="form-control-feedback" style="display: none; color: #31B404"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">
                                                                <label>Nombres : <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="nombres1" name="nombres1" required />
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Paterno : <span class="text-danger">*</span></label>
                                                                <input type="text" name="paterno1" id="paterno1" class="form-control" required />
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Materno : <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="materno1" id="materno1" required />
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label>Fecha de nacimiento : <span class="text-danger">*</span></label>
                                                                    <input type="date" class="form-control  date-inputmask" name="fec_nacimiento1" id="fec_nacimiento1" required />
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <?php $i= 100 - $this->cart->total_items(); ?>
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">
                                                                <label>Porcentaje : <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" id="porcen_parti1" name="porcen_parti1" value="<?php echo $i; ?>" max="<?php $i; ?>" required />
                                                                <small id="msg_alerta_catastral" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                                                <small id="alerta-porcentaje" class="form-control-feedback" style="display: none; color: #ff0000"></small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-actions">
                                                    <button class="btn waves-effect waves-light btn-info" type="button" onclick="confirma()"> <i class="fa fa-check"></i>Guardar</button>
                                                    <button class="btn btn-danger" type="button"  data-dismiss="modal">Cerrar</button>
                                                </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script> 
   
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap" async defer></script> -->

    <script type="text/javascript">
        $("#ci1").focusout(function(){
            var ci = $("#ci1").val();
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

            $.ajax({
                url: '<?php echo base_url(); ?>persona/ajax_verifica/',
                type: 'GET',
                dataType: 'json',
                data: {csrfName: csrfHash, param1: ci},
                // data: {param1: cod_catastral},
                success:function(data, textStatus, jqXHR) {
                    //alert("Se envio bien");
                    // csrfName = data.csrfName;
                    // csrfHash = data.csrfHash;
                    // alert(data.message);
                    if (data.estado == 'si') {
                        // console.log('Si se esta');
                        $("#msg_error_catastral").hide();    
                        $("#msg_sucess_catastral").show();
                        $("#msg_alerta_catastral").show();
                        $("#ci").val("");    
                        $("#msg_sucess_catastral").html('La persona existe: '+data.ci);
                        $('#nombres1').val(data.nombres);
                        $('#paterno1').val(data.paterno);
                        $('#materno1').val(data.materno);
                        $('#fec_nacimiento1').val(data.fec_nacimiento);
                        $("#msg_alerta_catastral").html('Podria cambiar el porcentaje de participacion del propietario que sea menor o igual a lo indicado');
                             
                    } else {
                        $("#msg_sucess_catastral").hide();
                         $("#msg_error_catastral").show();
                         $("#msg_alerta_catastral").hide();
                        $("#msg_error_catastral").html('La persona no existe: '+data.ci);
                        $('#nombres1').val('');
                        $('#paterno1').val('');
                        $('#materno1').val('');
                        $('#fec_nacimiento1').val('');
                    }
                },
                error:function(jqXHR, textStatus, errorThrown) {
                    // alert("error");
                }
            });
        });

    function confirma(){ 
        var ci = $('#ci1').val();
        var nombres = $('#nombres1').val();
        var paterno = $('#paterno1').val();
        var materno = $('#materno1').val();
        var fec_nacimiento = $('#fec_nacimiento1').val();
        var porcen_parti = $('#porcen_parti1').val();
        var csrf_test_name = $('#csrf_test_name').val();
        var lqs=document.cookie.split('=');
        var tok = lqs[1];
        var cod_catastral = $('#cod_catastral').val();
        var ddrr_id = $('#ddrr_id').val();

        $.ajax({
            type:'POST',
            url:"<?php echo base_url();?>persona/insertar_editar",
            dataType: 'json',
            data:{ci:ci,nombres:nombres,paterno:paterno,materno:materno,fec_nacimiento:fec_nacimiento,porcen_parti:porcen_parti,'<?php echo $this->security->get_csrf_token_name(); ?>' : tok, cod_catastral:cod_catastral, ddrr_id:ddrr_id},
            success: function (data, textStatus, jqXHR){
                if (data.estado == 'no') {
                    //swal("¡BIEN!", "Se adiciono con exito a la persona", "success");                  
                }else{
                    //swal("¡MAL!", "Porcentaje sobrepaso el 100%", "error");
                }
               window.location.reload();
            },
                error:function(jqXHR, textStatus, errorThrown) {
                    // alert("error");
                }
        });
    }
    </script>

    <script type="text/javascript">
        function validate_int(myEvento) {
          if ((myEvento.charCode >= 48 && myEvento.charCode <= 57) || myEvento.keyCode == 9 || myEvento.keyCode == 10 || myEvento.keyCode == 13 || myEvento.keyCode == 8 || myEvento.keyCode == 116 || myEvento.keyCode == 46 || (myEvento.keyCode <= 40 && myEvento.keyCode >= 37)) {
            dato = true;
          } else {
            dato = false;
          }
          return dato;
        }
        function folio_mask() {
          var myMask = "_.__._.__._______";
          var myCaja = document.getElementById("nro_folio");
          var myText = "";
          var myNumbers = [];
          var myOutPut = ""
          var theLastPos = 1;
          myText = myCaja.value;
          //get numbers
          for (var i = 0; i < myText.length; i++) {
            if (!isNaN(myText.charAt(i)) && myText.charAt(i) != " ") {
              myNumbers.push(myText.charAt(i));
            }
          }
          //write over mask
          for (var j = 0; j < myMask.length; j++) {
            if (myMask.charAt(j) == "_") { //replace "_" by a number 
              if (myNumbers.length == 0)
                myOutPut = myOutPut + myMask.charAt(j);
              else {
                myOutPut = myOutPut + myNumbers.shift();
                theLastPos = j + 1; //set caret position
              }
            } else {
              myOutPut = myOutPut + myMask.charAt(j);
            }
          }
          document.getElementById("nro_folio").value = myOutPut;
          document.getElementById("nro_folio").setSelectionRange(theLastPos, theLastPos);
        }
        document.getElementById("nro_folio").onkeypress = validate_int;
        document.getElementById("nro_folio").onkeyup = folio_mask;
    </script>

        
