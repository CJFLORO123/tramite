<div class="modal fade" id="modal-usuario" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Registrar Usuario</h4>
                                                    </div>
                                                    <div class="modal-body"> 
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nickname">Nickname</label>
                                                <input type="text" class="form-control inputLetrascre" id="nickname" name="nickname" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="password">Contraseña</label>
                                                <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label class="control-label" for="area_id">Areas</label>
                                            <select name="area_id" id="area_id" class="form-control" required>
                                                <option value="">[ Areas ]</option>
                                                @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label class="control-label" for="area_id">Areas</label>
                                            <select name="area_id" id="area_id" class="form-control" required>
                                                <option value="">[ Areas ]</option>
                                                @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Guardar</button>
                                                        <button type="button" data-dismiss="modal" class="btn default"><i class="fas fa-angle-double-left"></i>Cancelar</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>