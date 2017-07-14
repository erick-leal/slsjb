<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $curso->id }}">
	{{ Form::open(array('action'=>array('CursosController@destroy',$curso->id),'method'=>'delete')) }}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span ariahidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar Curso</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar el curso:<strong> {{$curso->nombre}}</strong></p>
					<p><i class="btn-xs btn-danger"><span class="fa fa-remove" ></span></i> Si el Curso <strong>{{$curso->nombre}}</strong> registra <strong>Asignaturas</strong>, no podrá ser eliminado.</p>
					<p><strong>Asignaturas Registradas :</strong> {{$curso->asignaturas_count}}</p>
					
				
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					@if(($curso->asignaturas_count) == 0)
					<button type="submit" class="btn btn-primary">Confirmar</button>
					@else
					<button type="submit" disabled class="btn btn-primary">Confirmar</button>
					@endif
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>