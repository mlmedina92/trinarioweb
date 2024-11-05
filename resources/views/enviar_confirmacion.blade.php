<form id="form_verifica_consulta" method="post">
    {!!csrf_field()!!}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" style="color: #29a22d; font-weight: bold;">Enviar codigo de confirmacion por: </label>
                    <div class="row">
                        <div class="col-md-12" style="padding-top: 8px">
                            <label class="radio radio-inline no-margin">
                            <input type="radio" name="opt_enviar_codigo" id="opt_correo" value="1" class="radiobox style-2" data-bv-field="rating" checked="checked" onclick="charge_fees();">
                            <span><strong>Correo electronico</strong></span> </label>
                            <label class="radio radio-inline no-margin">
                            <input type="radio" name="opt_enviar_codigo" id="opt_sms" value="2" class="radiobox style-2" data-bv-field="rating">
                            <span><strong>SMS</strong></span> </label>
                            <input type="hidden" id="txtOpcionesCuotas" name="txtOpcionesCuotas" class="form-control" id="tags" placeholder="Tags" value="" readonly="readonly" />
                            <br><br>
                            <label id="lblMensaje" style="color: black"></label>
                        </div>
                    </div>
            </div>
        </div>
    </div>
   
    <div class="modal-footer">
        <button type="button" id="btn_enviar_codigo_conf" onclick="send_code_confirm();" class="btn btn-primary" style="background-color: #29a22d">
            Enviar
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelarCompromiso">
            Cancelar
        </button>
    </div>
</form>
