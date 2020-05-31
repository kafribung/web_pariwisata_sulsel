@extends('template_depan.head')

@section('content')
<div class="single-blog-wrapper section-padding-0-100">
    @foreach($Data as $data)
    <!-- Single Blog Area  -->
    <div class="single-blog-area blog-style-2 mb-50">
        <div class="single-blog-thumbnail">
            <img src="{{'../'.$data->gambar }}"> 
            <div class="post-tag-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                           
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- ##### Post Content Area ##### -->
            <div class="col-12 col-lg-9">
                <!-- Single Blog Area  -->
                <div class="single-blog-area blog-style-2 mb-50">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <div class="line"></div>
                   
                        <h4>{{$data->nama }}</h4>
                       
                        {!! $data->sejarah !!}
                    </div>
                </div>

      
        
            </div>

        @endforeach
        </div>
    </div>
</div>
@endsection