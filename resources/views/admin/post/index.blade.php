@extends('template_backend.home')
@section('sub-judul','Post')
@section('content')

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif

	<a href="{{ route('post.create') }}" class="btn btn-info btn-sm">Tambah Post</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Sejarah</th>
			
				<th>Gambar</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($post as $result => $hasil)
			<tr>
				
				<td>{{ $hasil->nama }}</td>
				<td>{!! $hasil->sejarah !!}</td>
				<td><img src="{{ $hasil->gambar }}" class="img-fluid" style="width:100px"></td>
				<td>
					<form action="{{ route('post.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('post.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	{{ $post->links() }}

@endsection