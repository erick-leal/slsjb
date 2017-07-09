<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-show-{{ $noticia->id }}">
	
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					
					
					<h4 class="modal-title" ><center>	<strong>{{$noticia->nombre}}</strong></center></h4>
				</div>
				<div class="modal-body">
				
					<p>{{$noticia->resumen}}</p>
					<p>{{$noticia->descripcion}}</p>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-remove"></span> Cerrar</button>
				</div>
			</div>
		</div>
	
</div>