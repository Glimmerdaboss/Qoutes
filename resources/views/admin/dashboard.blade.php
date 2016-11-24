@extends('layouts.master')

@section('content')
  <ul>
@foreach ($authors as $author)

    <li>{{ $author->name }} ({{ $author->email }})</li>
        
        
@endforeach
</ul>

<h1>ipsumsdafasdfasdfafdasdfasdfasdfsdf</h1>
@stop