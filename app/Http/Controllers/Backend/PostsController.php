<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FileController extends Controller

{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('backend.editor');
    }

    /**
     *
     *
     */

    public function thepost($id)
    {
        $post = \App\Posts::find($id);
        return view('backend.thepost', ['post' => $post]);
    }

    /**
     *
     *
     */

    public function allposts()
    {
        $posts = \App\Posts::all();
        return view('backend.allposts', ['posts' => $posts]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function post(Request $request)
    {
        $data = $request->validate([
            'post_content' => 'required',
        ]);

        $post = new \App\Posts;
        $post->post_content = $data['post_content'];

        $post->save();

        //$dom->loadHtml($new_post, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        /* $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        } */

        return redirect('/admin/post');
    }

    public function delete($id)
    {
      $post = \App\Posts::find($id);
      $post->delete();
      return redirect('/admin/allposts');
    }

}