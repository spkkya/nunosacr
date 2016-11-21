<!-- Admin template for artists --> 

@extends('admin.layout')

@section('title', 'Obras')

@section('subtitle', 'Lista de Obras')

@section('addBtn')
	<a href="{!! URL::action('Admin\WorkController@editCreate') !!}" class="btn btn-primary">
		<i class="glyphicon glyphicon-plus"></i>
		Nova Obra
	</a>
@endsection

@section('content')
	
	@if(session('success_status'))
		<div class="col-xs-12 alert alert-success">
			{{ session('success_status') }}
		</div>
	@endif
	@if(session('danger_status'))
		<div class="col-xs-12 alert alert-danger">
			{{ session('danger_status') }}
		</div>
	@endif

	<!-- List All Artists -->
	<div class="col-xs-12">
		@if($allWorks->isEmpty())
			<div class="col-xs-12">
				<p class="text-center"><strong>Lista de obras vazia</strong></p>
			</div>
		@endif
		<ul class="list-group">

			@foreach ($allWorks as $work)
				<li class="list-group-item {{ $work->featured_to_home ? "destacado-opo" : null }}">
					<!-- Artist name -->
					<div class="col-xs-7 col-sm-2">{{ $work->name }}</div>
					<!-- .Artist name -->

					<!-- Artist bio -->
					<div class="hidden-xs col-sm-4">
						<img src="/upload/works/thumb/{{ $work->img }}" class="img-responsive"/>
					</div>
					<!-- .Artist bio -->

					<!-- Artist email -->
					<div class="hidden-xs col-sm-3">
						<a href="{!! action("Admin\ArtistController@listWorks", $work->artist_slug) !!}">
							{{ $work->artist_name }}
						</a>
					</div>
					<!-- .Artist email -->

					<!-- Action Buttons -->
					<div class="col-xs-5 col-sm-3">
						<!-- Update Button -->
						<div class="col-xs-6"> 
							<a href="/admin/obras/{{ $work->work_slug }}/editar">
								<button type="button" class=" btn btn-sm btn-warning btn-edit">
									<i class="glyphicon glyphicon-pencil"></i>
								</button>
							</a>
						</div>
						<!-- .Update Button -->
						<!-- Delete Form -->
						<div class="col-xs-6"> 
							{!! Form::open(['action' => ["Admin\WorkController@remove", $work->work_slug],  'method' => 'DELETE', 'name' => "deleteForm-" . $work->work_slug ]) !!}
								<button onclick="removeItem(this);" type="button" class="btn btn-sm btn-danger btn-remove">
									<i class="glyphicon glyphicon-remove"></i>
								</button>
							{!! Form::close() !!}
						</div>
						<!-- .Delete Form -->
						@if ($work->opportunity)
							<!-- Opportunity feature -->
							<div class="col-xs-12"> 
								<a href="/admin/obras/{{ $work->work_slug }}/destaque_oportunidade">
									<button type="button" class=" btn btn-sm btn-{{ $work->featured_to_home ? "default" : "primary" }} btn-edit">
										<i class="glyphicon glyphicon-{{ $work->featured_to_home ? "minus" : "plus" }}"></i>
										{{ $work->featured_to_home ? "Tirar destaque" : "Destacar" }}
									</button>
								</a>
							</div>
							<!-- .Opportunity feature -->
						@endif
					</div>
					<!-- .Action Buttons -->

					<!-- .Action Buttons -->
					@if ($work->opportunity)
						<!-- Opportunity badge -->
						<div class="opportunity-badge">
							Oportunidade
						</div>
						<!-- .Opportunity badge -->
					@endif
				</li>
			@endforeach

		</ul>
	</div>
	<!-- .List All Artists -->
@endsection