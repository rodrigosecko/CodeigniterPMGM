<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
        
        <!-- CTA -->
        <div class="container text-center space-2 space-3--lg">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 mx-md-auto mb-7">
                <h2>Segumiento de tramite</h2>
                <p class="mb-0">Ingrese el codigo de registro del tramite que realizo</p>
            </div>
            <!-- End Title -->

            <!-- Form -->
            <form class="js-validate form-row justify-content-md-center mb-4" action="<?php echo base_url(); ?>/Oficina_virtual/buscar_tramite">
                <div class="col-7 col-md-6 col-lg-4">
                <!-- Input -->
                <div class="js-form-message">
                    <div class="js-focus-state input-group form">
                        <div class="input-group-prepend form__prepend">
                            <span class="input-group-text form__text">
                            <span class="fa fa-folder-open form__text-inner"></span>
                            </span>
                        </div>
                        <input type="text" class="form-control form__input" name="codigo_tramite" required
                                placeholder="Codigo de tramite"
                                aria-label="tramite"
                                data-msg="Debe ingresar el codigo de tramite.">
                    </div>
                </div>
                <!-- End Input -->
                </div>

                <div class="col-5 col-md-3 col-lg-2">
                <button type="submit" class="btn btn-block btn-primary">Buscar</button>
                </div>
            </form>
            <!-- End Form -->

        </div>
        <!-- End CTA -->

        <!-- formalities Section -->
        <div class="container">
            <div class="row justify-content-lg-between align-items-md-center">
                <div class="col-md-6 order-md-2 mb-9 mb-md-0">
                <div class="mb-4">
                    <span class="u-label u-label--sm u-label--purple mb-3">Why do you need it?</span>
                    <h2 class="h3">All the information you need at your fingertips</h2>
                    <p>Choose what information is displayed on your Summary page. Create templates that work for you and your practice. You can even customize and update them on the fly! Edit and manage Case.one to truly fit your needs as your practice grows.</p>
                </div>
                </div>

                <div class="col-md-5 order-md-1">
                <img class="w-100" src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/information-icon.svg" alt="Image Description">
                </div>
            </div>
        </div>
        <br />
        <br />
        <!-- End formalities Section -->
    </main>
<!-- ========== END MAIN CONTENT ========== -->












