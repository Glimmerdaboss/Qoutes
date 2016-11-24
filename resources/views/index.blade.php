@extends('layouts.master')

@section('title')
Trending quotes
@stop

@section('styles')
	<script src="https://use.fontawesome.com/c2c8233ffa.js"></script>
@stop

@section('content')
	<!-- **********************
	 Filter bar
	********************** -->
	@if (!empty(Request::segment(1)))
		<section class="filter-bar">
			A filter has been set! <a href="{{ route('index') }}">Show all quotes</a>
		</section>
	@endif
	<!-- **********************
	 Error message
	********************** -->
	@if (count($errors) > 0)
		<section class="info-box fail">
			@foreach ($errors->all() as $error)
				{{ $error }}
			@endforeach
			
		</section>
	@endif
	<!-- **********************
	 Success message 
	 ********************** -->
	@if (Session::has('success'))
		<section class="info-box success">
			{{ Session::get('success') }}
		</section>
	@endif

	<!-- **********************
	Quotes 
	********************** --> 
	<section class="quotes">
		<h1 class="">Latest Quotes</h1>

		<!-- Output Quotes to views -->
		@for($i = 0; $i < count($quotes); $i++) <!-- for loop that outputs our quotes  -->

			<article class="quote">
				<div class="delete"><a href="{{ route('delete',['quote_id' => $quotes[$i]->id]) }}">x</a></div>
					{{ $quotes[$i]->quote }} <!-- Outputs the quotes to the view to the user from db. -->

				<div class="info">Created by <a href="{{ route('index' , ['author'=>$quotes[$i]->author->name]) }}">{{ $quotes[$i]->author->name }} </a> on {{$quotes[$i]->created_at }}</div>
			</article>
		@endfor

	<!-- **********************
		Page navigation 
	********************** -->
		<article>
			<div class="pagination">
				@if ($quotes->currentPage() !==1)
					<a href="{{ $quotes->previousPageUrl() }}"><span class="fa fa-caret-left"></span></a>
				@endif

				@if ($quotes->currentPage() !== $quotes->lastPage() && $quotes->hasPages())
					<a href="{{ $quotes->nextPageUrl() }}"><span class="fa fa-caret-right"></span></a>
				@endif
			</div>	
		</article>
		
						
	</section>

	<section class="edit-quote">
	<!-- **********************
		Add a quote form
	********************** -->
		
		<h1>Add a quote</h1>
		
		<form method="post" action="{{ route('create') }}">
				
				<!-- Author -->
			<div class="input-group"> 
				<label for="author">Your name</label>
				<input type="text" name="author" id="author" value="" placeholder="Your name">
			</div>

			<!-- Ëmail -->
			<div class="input-group"> 
				<label for="email">Your E-mail</label>
				<input type="text" name="email" id="email" value="" placeholder="Your email">
			</div>

				<!-- Quote -->
			<div class="input-group"> 
				<label for="quote">Your quote</label>
				<textarea name="quote" id="quote" rows="5" placeholder="Quote"></textarea>
			</div>

			<button type="submit" class="btn">Submit Quote</button>

			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
	</section>
@stop