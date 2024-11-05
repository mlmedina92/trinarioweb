<form id="form_verifica_consulta" method="post">
    <input type="hidden" name="_token" value="L7jde7iDyvbdJ6fO5fjZAdj4We0Di9D9iAkDE9eI">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" style="color: #29a22d; font-weight: bold;">Ingresar el codigo de confirmacion: </label>
                    <div class="row">
                        <div class="col-md-12" style="padding-top: 8px">
                            <!--<label class="radio radio-inline no-margin">
                            <input type="radio" name="opt_tipo_pago" id="opt_cancelatoria" value="1" class="radiobox style-2" data-bv-field="rating" checked="checked" onclick="charge_fees();">
                            <span><strong>Corresso electronico</strong></span> </label>
                            <label class="radio radio-inline no-margin">
                            <input type="radio" name="opt_tipo_pago" id="opt_pago_cuotas" value="2" class="radiobox style-2" data-bv-field="rating" onclick="charge_fees();">
                            <span><strong>SMS</strong></span> </label>
                            <input type="hidden" id="txtOpcionesCuotas" name="txtOpcionesCuotas" class="form-control" placeholder="Tags" value="" readonly="readonly">-->
                            <input id="txtCodigoConfirmacion" name="txtCodigoConfirmacion" type="text" placeholder="Codigo de Confirmación" class="form-control" value="" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57">
                            <br>
                            <label id="lblMensaje" style="color: red"></label>
                        </div>
                    </div>
            </div>
        </div>
    </div>
   
    <div class="modal-footer">
        <button type="button" id="btn_enviar_codigo_conf" onclick="verifica_codigo_confirmacion();" class="btn btn-primary" style="background-color: #29a22d">
            Enviar
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelarConfirmacion">
            Cancelar
        </button>
    </div>
</form>