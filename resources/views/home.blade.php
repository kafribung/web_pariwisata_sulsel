@extends('template_depan.head')

@section('content')
<div >
    <!-- Hero Slides Area -->
    <div class="hero-slides owl-carousel">
        <!-- Single Slide -->
        @foreach($TempatWisatas as $data)
        
        <div class="single-hero-slide bg-img" style="height:270pt">
            <a href="{{ 'detail/'.$data->slug }}"><img src="{{$data->gambar }}"> </a>
           
        </div>
        @endforeach
    </div>
</div>
<!-- ##### Hero Area End ##### -->

<!-- ##### Blog Wrapper Start ##### -->
<div class="blog-wrapper clearfix">
    <div class="container">
        <div class="row align-items-end">
            <!-- Single Blog Area -->
            <div class="col-12 col-lg-4">
                <div class="single-blog-area clearfix mb-100">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <div class="line"></div>
                       
                        <h4><a href="#" class="post-headline">Selamat Datang di Blog Wisata Adat Sulawesi Selatan</a></h4>
                        <p>Blog Ini Menyediakan Informasi Tentang Tempat atau Lokasi Wisata Adat yang terdapat di Provinsi Sulawesi Selatan-Indonesia</p>
                        
                    </div>
                </div>
            </div>
            <!-- Single Blog Area -->
           
            <!-- Single Blog Area -->
            
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                @foreach($TempatWisatas as $data)
                <!-- Single Blog Area  -->
                <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="single-blog-thumbnail">
                                <a href="{{ 'detail/'.$data->slug }}"> <img src="{{$data->gambar }}"></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="line"><a href="#">{{ $data->nama }}</a></div>
                           
                               
                            </div>
                        </div>
                    </div>
                </div>
@endforeach
<?php echo $TempatWisatas->render(); ?>
   

               
            </div>

            <!-- ##### Sidebar Area ##### -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="post-sidebar-area">

         

        
                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title">Latest Posts </h5>
                         <tr>

                        <div class="widget-content">

                            <!-- Single Blog Post -->
                            
                @foreach($lates as $data)
                            <div class="single-blog-post d-flex align-items-center widget-post">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="{{$data->gambar }}">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-tag">{{$data->nama }}</a>
                                    <div class="post-meta">
                                        <p><a href="#">{{$data->created_at }}h</a></p>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
