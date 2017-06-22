<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-show-{{ $e->id }}">
	  <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <br>
                            <div class="modal-title" align="center">
                            	<label>Información: </label>
                            </div>
                                <div class="modal-body">
                                    <label>Contenidos: </label>
                                    <p><span class="fa  fa-paperclip" aria-hidden="true"></span> {{$e->descripcion}}</p>
											
                                </div>

                            <div class="modal-footer">
                            	<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>

                           </div><!-- modal content -->
                        </div><!-- modal dialog -->
</div>