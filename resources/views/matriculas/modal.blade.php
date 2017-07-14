<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $m->id }}">
	{{ Form::open(array('action'=>array('MatriculasController@destroy',$m->id),'method'=>'delete')) }}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span ariahidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar Matricula</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar la matricula del alumno:<strong> {{$m->alumno->rut}}</strong></p>
					<p><i class="btn-xs btn-danger"><span class="fa fa-remove" ></span></i> Si el Matriculado <strong>{{$m->alumno->rut}}</strong> está inscrito en una <strong>Asignatura</strong>, no podrá ser eliminado.</p>
					<p><strong>Asignaturas Inscritas :</strong> {{$m->asignaturas_count}}</p>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					@if(($m->asignaturas_count) == 0 )
					<button type="submit" class="btn btn-primary">Confirmar</button>
					@else
					<button type="submit" disabled class="btn btn-primary">Confirmar</button>
					@endif
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>