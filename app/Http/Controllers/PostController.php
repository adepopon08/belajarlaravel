<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index', [
            'posts' => Post::with(['category'])->where('user_id', auth()->id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => ['required'],
            'title' => ['required'],
            'image' => ['required', 'image'],
            'body' => ['required', 'min:20'],
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'image' => $request->file('image')->store('post/image'),
            'body' => $request->body,
        ]);

        return redirect()->route('post');
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
    public function edit($id)
    {
        $categories = Category::get();
        return view('post.edit', compact('categories'), [
            'post' => Post::find($id), //untuk mengambil data Post sesui dengan id yang diterima
        ]);
    }

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
            'title' => ['required'],
            'category_id' => ['required'],
            'body' => ['required', 'min:20'],
        ]);

        $post = Post::find($id);
        $image = $post->image; //membuat variabel $image dengan nilai adalah image lama data yang diubah

        if ($request->hasFile('image')) { // mengecek jika request memiliki file pada field image, jika tidak ada file maka operasi didalam ini tidak akan diekseskusi
            Storage::delete($image); // digunakan menghapus file lama karena tidak akan digunakan lagi, memanfaatkan variabel $image yang berisi path file sebelumnya
            $image = $request->file('image')->store('post/image/'); // mengoverride variabel $image dengan file baru yang diupload dan digunakan untuk mengupdate data.
        };

        $post->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'image' => $image,
            'body' => $request->body,
        ]);

        return redirect()->route('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('post');
    }
}
