
<div class="modal fade" id="modal-remitente" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-full">
         <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"> AGREGAR REMITENTE</h4>
            </div>
            <form id="FormularioSolicitanteCreate">
                 <div class="modal-body"> 
                      @csrf
                 <div class="form-body">
                     <div class="row" id="alertError" style="display: none;">
                          <div class="col-12">
                              <div class="alert alert-danger" role="alert">
                                    <ul id="listaErrores">
                                    </ul>
                              </div>
                          </div>
                     </div>
                      <div class="row">
                           <div class="col-md-6">
                                <div class="form-group">
                                     <label class="control-label" for="nom_solicitante">Nombre y Apellidos</label>
                                     <input type="text" class="form-control inputletritas" id="nom_solicitante" name="nom_solicitante" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                     <label class="control-label" for="cargo">Cargo</label>
                                     <input type="text" class="form-control inputletros" id="cargo" name="cargo" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                </div>
                            </div>
                      </div>
                      <div class="row">
                           <div class="col-md-6">
                                <div class="form-group">
                                     <label class="control-label" for="dni_ruc">DNI</label>
                                     <input type="text" class="form-control inputNumero" id="dni_ruc" name="dni_ruc" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                      <label class="control-label" for="cor_solicitante">Correo Electronico</label>
                                      <input type="text" class="form-control" id="cor_solicitante" name="cor_solicitante" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Guardar</button>
                <button type="button" class="btn default" data-dismiss="modal"><i class="fas fa-angle-double-left"></i> Cancelar</button>
            </div>
        </div>
        </form>                                
    </div>                                 
</div>