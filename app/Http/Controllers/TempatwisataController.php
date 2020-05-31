<?php
namespace App\Http\Controllers;
use Auth;

use App\wisataadat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TempatwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = wisataadat::paginate(10);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'sejarah' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $data = wisataadat::create([
            'nama' => $request->nama,
            'sejarah' =>  $request->sejarah,
            'gambar' => 'public/uploads/TempatWisata/'.$new_gambar,
            'slug' => Str::slug($request->nama),
       
        ]);

     
        $gambar->move('public/uploads/TempatWisata/', $new_gambar);
        return redirect()->back()->with('success','Postingan anda berhasil disimpan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'nama' => 'required',
            'gambar' => 'mimes:png,jpg',
            'sejarah' => 'required'            
         ]);

        

        $post = wisataadat::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/TempatWisata/', $new_gambar);

        $post_data = [
            'nama' => $request->nama,
            'sejarah' =>  $request->sejarah,
            'gambar' => 'public/uploads/TempatWisata/'.$new_gambar,
            'slug' => Str::slug($request->nama)
        ];
        }
        else{
        $post_data = [
            'nama' => $request->nama,
            'sejarah' =>  $request->sejarah,         
            'slug' => Str::slug($request->nama)
        ];
        }
   
        
        $post->update($post_data);

        
        return redirect()->route('tempatwisata')->with('success','Postingan anda berhasil diupdate'); 


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = wisataadat::findorfail($id);
        $post->delete();

        return redirect()->back()->with('success','Post Berhasil Dihapus (Silahkan cek trashed post)');
    }

    public function tampil_hapus(){
        $post = wisataadat::onlyTrashed()->paginate(10);
        return view('admin.post.hapus', compact('post'));
    }
    public function add()
    {
       
        return view('admin.post.create');
    }
    public function edit($id)
    {
        $post = wisataadat::find($id);
        return view('admin.post.edit',['post' => $post]);
    }
}

