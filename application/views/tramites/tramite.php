
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.9/dist/vue.js"></script> -->
<!-- sample modal content -->
<!-- /.modal -->
<!-- ============================================================== -->
<!-- Start Page Content 
   <select class="custom-select form-control" id="tipo_predio" name="tipo_predio_id" required />
        <option value="">Seleccione tipo</option>
        <?php foreach ($dc_tipos_predio as $d): ?>
            <option value="<?php echo $d->tipo_predio_id; ?>"><?php echo $d->descripcion; ?></option>
        <?php endforeach; ?>
    </select>  
-->
<!-- ============================================================== -->

<!-- estilos personalizados de tramite -->
<link href="<?php echo base_url(); ?>public/css/estilos_tramite.css" rel="stylesheet">

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">
                            Registro de Predio
                            <button type="button" class="btn waves-effect waves-light btn-success" id="btn_sel_predio">Seleccionar predio</button>
                        </h4> -->
                        <!-- <h6 class="card-subtitle">Ingrese los datos del predio </h6> -->
                        <!-- <form action="#" class="validation-wizard wizard-circle"> -->
                        <?php // echo form_open('predios/guarda', array('method'=>'POST', 'enctype'=>"multipart/form-data")); ?>
                        <?php echo form_open_multipart('Tipo_tramite/do_upload', array('method'=>'POST', 'name'=>'informacion')); ?>
                            <h4 class="card-title">Registro de Tramite</h4>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">Tipo de Tramite</label>
                                    <!-- CONSULTA POR LA TABLA TIPO DE DOCUMENTO -->
                                    <?php $lista2 = $this->db->query("SELECT * FROM tramite.tipo_tramite  WHERE activo = '1' ORDER BY tipo_tramite_id ASC")->result();
                                    ?> 
                                    <div class="input-group">
                                        <select class="custom-select form-control" id="tipo_tramite_id" name="tipo_tramite_id" onchange="CargarProductos(this.value);" required />
                                            <option value="" class="placeholderselect" disabled selected>Seleccione un tramite</option>
                                            <?php foreach ($lista2 as $tc): ?>
                                                <option value="<?php echo $tc->tipo_tramite_id; ?>"><?php echo $tc->tramite; ?></option>
                                            <?php endforeach; ?>
                                        </select>  
                                    </div>
                                </div>
                                <div class="col-md-12 form-group" id="listas"> 
                                </div>
                                <div class="form-row col-md-12">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="tipo_solicitante1" name="tipo_solicitante" class="custom-control-input" value="Propietario">
                                            <label class="custom-control-label" for="tipo_solicitante1">Solicitante propietario</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="tipo_solicitante2" name="tipo_solicitante" class="custom-control-input" value="Juridico">
                                            <label class="custom-control-label" for="tipo_solicitante2">Solicitante Juridico</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label> Cedula de identidad del solicitante <span class="text-danger">*</span> </label>
                                        <input type="integer" class="form-control" id="cedula" name="cedula" required pattern="[0-9]{1,40}">
                                    </div>
                                </div>
                                 <div class="col-md-12 form-group">
                                    <div class="form-group">
                                        <label> Nombre del solicitante<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="remitente" name="remitente"  required >
                                        <input type="hidden" name="solicitante_id" id="solicitante_id">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <?php 
                                    $año = date("Y");
                                    $cite = $this->db->query("SELECT * FROM tramite.numero_tramite WHERE gestion='$año' AND activo = '1'")->row();
                                    $numero = $cite->correlativo + 1 ;
                                    $numeroConCeros = str_pad($numero, 5, "0", STR_PAD_LEFT);
                                ?> 
                                <div>
                                    <input hidden type="integer" name="cite_sin" value="<?php echo $cite->tipo ?><?php echo $cite->gestion ?>-<?php echo $numeroConCeros ?>" >
                                </div>
                                <div>
                                    <input hidden type="integer" name="gestion" value="<?php echo $año; ?>" >
                                </div>
                                <div>
                                    <input hidden type="integer" name="correlativo" value="<?php echo $numero; ?>" >
                                </div>
                                <div>
                                    <input hidden type="text" name="cite" value="<?php echo $cite->tipo ?>/<?php echo $cite->gestion ?>-<?php echo $numeroConCeros ?>" >
                                </div>
                                <div>
                                    <input hidden type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                                </div>                                                                         
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-form-group">
                                    <label >Observaciones<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="observaciones" name="observaciones">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <div class="card">
                                            <label for="recipient-name" class="control-label">Adjuntar</label>
                                            <label for="input-file-now">
                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                    <i class="fas fa-exclamation"></i>
                                                </button>
                                                OJO Solo archivos pdf
                                            </label>
                                            <input type="file" id="input-file-now" accept=".pdf" class="dropify" name="adjunto" data-allowed-file-extensions="pdf" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group"> 
                                     <label >Derivar a </label>
                                    <!-- <select class="custom-select form-control" id="destino" name="destino" />
                                        <option value=""></option>
                                        <?php //foreach ($personas as $key => $p): ?>
                                            <option value="<?php //echo $p['id'] ?>"><?php ////echo $p['nombre']; ?> - <?php //echo $p['cargo']; ?> (<?php //echo $p['unidad']; ?>)</option>
                                        <?php //endforeach ?>
                                    </select>   -->
                                    <div id="lbl_persona_derivacion"></div>
                                    
                                    
                                        <select class="custom-select form-control" id="destino" name="destino" />
                                            
                                        </select>
                                    
                                </div>
                            </div>
                            <div class="row" id="bloque_botones">
                                <div class="col-md-6">
                                    <button type="submit" name="boton" value="generar" id="enviar" class="btn waves-effect waves-light btn-block btn-info">Generar</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="boton" value="derivar" class="btn waves-effect waves-light btn-block btn-success">Generar y derivar</button>
                                </div>
                            </div>
                        </form>
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function(form) {
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Registrar datos del nuevo solicitante</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!--<form action="<?php //echo base_url();?>persona/insertar" method="POST">-->
                <!-- <?php //echo form_open('persona/insertar', array('method' => 'GET')); ?> -->
                <!--<input type="hidden" id="<?php //echo $this->security->get_csrf_token_name(); ?>" name="<?php //echo $this->security->get_csrf_token_name(); ?>" value="<?php //echo $this->security->get_csrf_hash(); ?>" />-->
                <?php echo form_open_multipart('Persona/guardar_solicitante', array('method'=>'POST')); ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="ci"> Cedula de identidad : <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="ci1" name="ci1" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Nombres : <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nombres1" name="nombres1"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Paterno : <span class="text-danger">*</span></label>
                                    <input type="text" name="paterno1" id="paterno1" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Materno : <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="materno1" id="materno1"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fecha de nacimiento : <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control  date-inputmask" name="fec_nacimiento1" id="fec_nacimiento1" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Direccion : <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="direccion1" id="direccion1" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email : <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="email1" id="email1" />
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefono fijo </label>
                                    <input type="text" name="telefono_fijo1" id="telefono_fijo1" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefono celular : <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="telefono_celular1" id="telefono_celular1"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn waves-effect waves-light btn-info" type="button" onclick="confirmar()"> <i class="fa fa-check"></i>Guardar</button>
                        <button class="btn btn-danger" type="button"  data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<script>
    function CargarProductos(val)
    {   
        $.ajax({
            type: "GET",
            url: '<?php echo base_url(); ?>Tipo_tramite/ajax_verifica1/',
            data: 'param1='+val,
            success: function(resp){
                //alert(resp)
                //alert(resp[resp.length]);
                respuesta_requsitos = JSON.parse(resp);
                asistente = respuesta_requsitos.persona
                $('.borrar').remove();
                for (var i = 0; i < asistente.length; i++) {
                    //alert(asistente[i]['requisito_id']);
                     $('#listas').append('<div class="borrar"> <input type="checkbox" id="requisitos['+i+']" name="requisitos['+i+']" value="'+asistente[i]['requisito_id']+'"> '+asistente[i]['descripcion']+' </div>');
                //     //console.log(asistente[i]['descripcion']);
                 }
                 derivado = respuesta_requsitos.derivacion
                 //alert(derivado);
                //$('.borrar').remove();
                $('.borrar1').remove();
                for (var j = 0; j < derivado.length; j++) {
                   // alert(derivado.length);
                    //alert(derivado[i]['nombre']);
                     //$('#destino').html('<option value="'+$derivado[i]['organigrama_persona_id']+'">'+$derivado[i]['nombre']+'-'+$derivado[i]['unidad']+'('+$derivado[i]['descripcion']+')</option>');
                     
                     $('#destino').append('<option class="borrar" value="'+derivado[j]['organigrama_persona_id']+'">'+derivado[j]['nombre']+' ('+derivado[j]['unidad']+' - '+derivado[j]['descripcion']+')</option>'); 
                //     //console.log(asistente[i]['descripcion']);
                 }

                // if(respuesta_requsitos.persona_derivacion){
                //     $('#lbl_persona_derivacion').html('<h2>'+respuesta_requsitos.persona_derivacion[0]['nombres']+' '+respuesta_requsitos.persona_derivacion[0]['paterno']+' '+respuesta_requsitos.persona_derivacion[0]['materno']+' '+'<b>'+respuesta_requsitos.persona_derivacion[0]['descripcion']+'</b></h2>');
                //     $('#destino').val(respuesta_requsitos.persona_derivacion[0]['organigrama_persona_id']);
                //     $('#bloque_botones').show();
                // }else{
                //     $('#lbl_persona_derivacion').html('No tiene las configuraciones');
                //     $('#bloque_botones').hide();
                // }

                // console.log(respuesta_requsitos.persona_derivacion[0]['nombres']);
            }
        });
    }
</script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script type="text/javascript">
    $("#cedula").focusout(function(){
        var ci = $("#cedula").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        $.ajax({
            url: '<?php echo base_url(); ?>Persona/ajax_verifica_cedula/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                //alert("Se envio bien");
                // csrfName = data.csrfName;
                // csrfHash = data.csrfHash;
                //alert(data.message);
                if(data.estado=='si'){
                    $('#remitente').val(data.nombres+' '+data.paterno+' '+data.materno);
                    $('#solicitante_id').val(data.solicitante_id);
                }else{
                    $('#remitente').val('');
                    $('#solicitante_id').val('');
                    //$('#remitente').prop('disabled', true);
                    if (data.estado == 'segip') {
                        $("#ci1").val(data.ci);
                        $("#msg_sucess_catastral").html('Esta registrado en el segip la persona con cedula de identidad Numero: '+data.ci);
                        $('#nombres1').val(data.nombres);
                        $('#paterno1').val(data.paterno);
                        $('#materno1').val(data.materno);
                        $('#fec_nacimiento1').val(data.fec_nacimiento);
                        $("#direccion1").val('');
                        $("#email1").val('');
                        $("#telefono_fijo1").val('');
                        $("#telefono_celular1").val('');
                    }else{
                        $("#ci1").val(data.ci);
                        $("#msg_error_catastral").html('La persona no existe ni en la base de datos ni en el segip: '+data.ci);
                        $('#nombres1').val('');
                        $('#paterno1').val('');
                        $('#materno1').val('');
                        $('#fec_nacimiento1').val('');
                        $("#direccion1").val('');
                        $("#email1").val('');
                        $("#telefono_fijo1").val('');
                        $("#telefono_celular1").val('');
                    }
                    $('#exampleModal').modal('toggle');
                    //$('#exampleModal').modal('show');
                    //$('#exampleModal').modal('hide');
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    });
</script>
<script type="text/javascript">
    function confirmar(){
        var ci = $('#ci1').val();
        var nombres = $('#nombres1').val();
        var paterno = $('#paterno1').val();
        var materno = $('#materno1').val();
        var fec_nacimiento = $('#fec_nacimiento1').val();
        var direccion = $('#direccion1').val();
        var email = $('#email1').val();
        var telefono_fijo = $('#telefono_fijo1').val();
        var telefono_celular = $('#telefono_celular1').val();
        //var csrf_test_name = $('#csrf_test_name').val();
        //var lqs=document.cookie.split('=');
        //var tok = lqs[1];
        $.ajax({
            type:'POST',
            url:"<?php echo base_url();?>Persona/guardar_solicitante/",
            dataType: 'json',
            data:{ci:ci,nombres:nombres,paterno:paterno,materno:materno,fec_nacimiento:fec_nacimiento, '<?php echo $this->security->get_csrf_token_name(); ?>': '<?PHP echo $this->security->get_csrf_hash(); ?>', direccion:direccion, email:email, telefono_fijo:telefono_fijo, telefono_celular:telefono_celular},
            success: function (data, textStatus, jqXHR){ 
                if (data.estado == 'datos_invalidos') {
                    $("#ci1").val(data.ci);
                    $('#nombres1').val(data.nombres);
                    $('#paterno1').val(data.paterno);
                    $('#materno1').val(data.materno);
                    $('#fec_nacimiento1').val(data.fec_nacimiento);
                }else if(data.estado == 'guardado'){
                    //alert('guardado');
                    $('#exampleModal').modal('hide');
                    $('#remitente').val(data.nombres+' '+data.paterno+' '+data.materno);
                    $('#solicitante_id').val(data.solicitante_id);
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    }
</script>
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>

  <!-- validacion de campos de entrada -->
  <script src="<?php echo base_url(); ?>public/js/validacion_formulario.js"></script>