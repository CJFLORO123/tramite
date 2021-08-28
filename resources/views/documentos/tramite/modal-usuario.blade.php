
<div class="modal fade" id="modal-usuario" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-full">
         <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"> AGREGAR USUARIO</h4>
            </div>
            <form id="FormularioUsuarioCreate">
                 <div class="modal-body"> 
                      @csrf
                 <div class="form-body">
                     <div class="row" id="alertErrorUsuario" style="display: none;">
                          <div class="col-12">
                              <div class="alert alert-danger" role="alert">
                                    <ul id="listaErroresUsurio">
                                    </ul>
                              </div>
                          </div>
                     </div>
                     <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nombres">Nombres</label>
                                                <input type="text" class="form-control inputLetras" id="nombres" name="nombres" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();"   required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="apellidos">Apellidos</label>
                                                <input type="text" class="form-control inputValida" id="apellidos" name="apellidos" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="nickname">Nickname</label>
                                                <input type="text" class="form-control inputLetrascre" id="nickname" name="nickname" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="password">Contraseña</label>
                                                <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="area_id">Areas</label>
                                            <select name="area_id" class="form-control" required>
                                                <option value="">[ Areas ]</option>
                                                @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="tipoUsuario_id">Tipo de Usuario</label>
                                            <select name="tipoUsuario_id" id="tipoUsuario_id" class="form-control" required>
                                                <option value="">[ TIPO DE USUARIO ]</option>
                                                @foreach($tiposUsuarios as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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