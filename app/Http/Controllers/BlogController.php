<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ImageUplouding;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Services\BlogService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class BlogController extends Controller
{

    use ImageUplouding;
    /**
     * Display a listing of the resource.
     */

     protected BlogService $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function index()
    {
        $blog = Blog::get();
        return view('admin.blog', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        // dd($request);
        // DB::beginTransaction();
        try {
            // $this->blogService->create($request->all());
            // Alert::success('Berhasil', 'Berhasil membuat BLOG');
            // return redirect()->back();
            // DB::commit();
            $blog = Blog::create([
                'judul'=>$request->judul,
                'subjudul'=>$request->subjudul,
                'content'=>$request->content,
                // 'judul'=>$request->judul,
            ]);
            // dd($blog);
            if($request->input('image_blog', false)){
                $blog->addMedia(storage_path('tmp/uploads/') . $request->input('image_blog'))->toMediaCollection('image_blog');
            }
            Alert::success('Berhasil', 'Berhasil membuat BLOG');
            return redirect()->back();
        } catch (Exception $E) {
            Alert::warning('Gagal', 'Ada kesalahan saat memasukkan foto');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
