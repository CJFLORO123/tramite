
<div class="modal fade" id="modal-empresa" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-full">
         <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"> AGREGAR EMPRESA</h4>
            </div>
            <form id="FormularioEmpresaCreate">
                 <div class="modal-body"> 
                      @csrf
                 <div class="form-body">
                     <div class="row" id="alertErrorEmpresa" style="display: none;">
                          <div class="col-12">
                              <div class="alert alert-danger" role="alert">
                                    <ul id="listaErroresEmpresa">
                                    </ul>
                              </div>
                          </div>
                     </div>
                      <div class="row">
                           <div class="col-md-12">
                                <div class="form-group">
                                     <label class="control-label" for="nombre_empresa">Nombre De Empresas</label>
                                     <input type="text" class="form-control inputletritas" id="nombre_empresa" name="nombre_empresa" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
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