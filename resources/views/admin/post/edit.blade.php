@extends('template_backend.home')
@section('sub-judul','Edit Post')
@section('content')

  @if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
	</div>  		
  	@endforeach
  @endif

  @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
  	
  @endif

  <form action="{{ route('post.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">
      <label>Nama Tempat Wisata</label>
      <input type="text" class="form-control" name="nama" value="{{ $post->nama }}">
  </div>
  
  <div class="form-group">
      <label>Sejarah</label>
      <textarea class="form-control" name="sejarah" id="content">{{ $post->sejarah }}</textarea>
  </div>
  <div class="form-group">
      <label>gambar</label>
      <input type="file" name="gambar" class="form-control">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Update Kategori</button>
  </div>

  </form>

<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script >
  CKEDITOR.replace( 'content' );

</script>
@endsection