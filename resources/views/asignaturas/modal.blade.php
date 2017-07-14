<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $asi->id }}">
	{{ Form::open(array('action'=>array('AsignaturasController@destroy',$asi->id),'method'=>'delete')) }}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span ariahidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar Asignatura.</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar la asignatura:<strong> {{$asi->nombre}}</strong></p>
					<p><i class="btn-xs btn-danger"><span class="fa fa-remove" ></span></i> Si la Asignatura <strong>{{$asi->nombre}}</strong> tiene <strong>Alumnos</strong>, no podrá ser eliminada.</p>
					<p><strong>Alumnos :</strong> {{$asi->matriculas_count}}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					@if(($asi->matriculas_count) == 0 )
					<button type="submit" class="btn btn-primary">Confirmar</button>
					@else
					<button type="submit" disabled class="btn btn-primary">Confirmar</button>
					@endif
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>