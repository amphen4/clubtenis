@extends('frontend.layout.layout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('templates/frontend1')}}/shortcodes/shortcodes.css">
@endsection
@section('content')

<div class="container recent-posts">
	<div class="row no_padding no-margin">
	  <h3>Inscritos Categoria B</h3>
	  <table class="dc_tables2_11" summary="Personal Movie Rating" style="width:100%;">
	    <thead>
	      <tr>
	        <th scope="col">#</th>
	        <th scope="col">Nombre</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($inscritos_b as $j)
	      <tr>
	        <td>{{$loop->index+1}}</td>
	        <td>{{$j->nombre}}</td>
	      </tr>
	    @endforeach
	    </tbody>
	  </table>
	
	</div>
	<div class="row no_padding no-margin">
	  <h3>Inscritos Categoria A</h3>
	  <table class="dc_tables2_11" summary="Personal Movie Rating" style="width:100%;">
	    <thead>
	      <tr>
	        <th scope="col">#</th>
	        <th scope="col">Nombre</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($inscritos_a as $j)
	      <tr>
	        <td>{{$loop->index+1}}</td>
	        <td>{{$j->nombre}}</td>
	      </tr>
	    @endforeach
	    </tbody>
	  </table>
	
	</div>
	<div class="row no_padding no-margin">
	  <h3>Inscritos Categoria Dobles</h3>
	  <table class="dc_tables2_11" summary="Personal Movie Rating" style="width:100%;">
	    <thead>
	      <tr>
	        <th scope="col">#</th>
	        <th scope="col">Nombre</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($inscritos_dobles as $j)
	      <tr>
	        <td>{{$loop->index+1}}</td>
	        <td>{{$j->nombre}}</td>
	      </tr>
	    @endforeach
	    </tbody>
	  </table>
	
	</div>
</div>
@endsection