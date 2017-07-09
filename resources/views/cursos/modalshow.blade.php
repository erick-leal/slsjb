<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-show-{{ $curso->id }}">
	  <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <br>
                            <div class="modal-title" align="center">
                            	<label>Información: </label>
                            </div>
                                <div class="modal-body">
                                    <label>Curso: </label>
                                    <p> {{$curso->nombre}}</p>
                                    <label>Modalidad: </label>
                                    <p>{{$curso->tipo}}</p>
									<label>Profesor Jefe:</label>
									<p> <span class="fa fa-user-md" aria-hidden="true"></span> {{$curso->profesor->nombre." ".$curso->profesor->apellido_paterno." ".$curso->profesor->apellido_materno}}</p>		
                                </div>

                            <div class="modal-footer">
                            	<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>

                           </div><!-- modal content -->
                        </div><!-- modal dialog -->
</div>