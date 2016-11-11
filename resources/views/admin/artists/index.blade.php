<!-- Admin template for artists --> 

@extends('admin.layout')

@section('title', 'Artistas')

@section('subtitle', 'Lista de Artistas')

@section('content')
	<!-- List All Artists -->
	<div class="col-xs-12">
		<ul class="list-group">

			@foreach ($allArtists as $artist)
				<li class="list-group-item">
					<!-- Artist name -->
					<div class="col-xs-7 col-sm-3">{{ $artist->name }}</div>
					<!-- .Artist name -->

					<!-- Artist bio -->
					<div class="hidden-xs col-sm-3">{{ $artist->bio }}</div>
					<!-- .Artist bio -->

					<!-- Artist email -->
					<div class="hidden-xs col-sm-3">{{ $artist->email }}</div>
					<!-- .Artist email -->

					<!-- Action Buttons -->
					<div class="col-xs-5 col-sm-3">
						<a href="/admin/artistas/editar/{{ $artist->id }}">
							<button type="button" class="pull-right btn btn-sm btn-danger btn-remove">
								<i class="glyphicon glyphicon-remove"></i>
							</button>
						</a>
						<a href="/admin/artistas/{{ $artist->id }}">
							<button type="button" class="pull-right btn btn-sm btn-warning btn-edit">
								<i class="glyphicon glyphicon-pencil"></i>
							</button>
						</a>
					</div>
					<!-- .Action Buttons -->
				</li>
			@endforeach

		</ul>
	</div>
	<!-- .List All Artists -->
@endsection