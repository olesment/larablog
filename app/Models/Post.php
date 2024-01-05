<?php

namespace App\Models;
//namespace App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Carbon\Carbon;
class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }
    public static function all()
    {
    return cache()->rememberForever('posts.all', function () {
        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parse(file_get_contents($file->getPathname())))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,//Carbon::createFromFormat('Y-m-d', $document->date),
                $document->body(), 
                $document->slug
                
            ))
            //->sortByDesc(fn($post) => $post -> date); 
            ->sortByDesc('date');
            
    });
}
    // public static function all()
    // {
    //     return cache()->rememberForever('posts.all',function(){           
    //         return collect(File::files(resource_path("posts\\")))
    //         ->map(function($file){
    //             $fileContent = file_get_contents($file->getPathname());
    //             return YamlFrontMatter::parse($fileContent);
    //         })

    //         ->map(function ($document) {
    //             return new Post(
    //                 $document->title,
    //                 $document->excerpt,
    //                 $document->date,
    //                 $document->body(),
    //                 $document->slug
    //             );
            
    //         });
    //     });       
    //                // return array_map(function ($file){
    //     //     return $file->getContents(); 
    //     // }, $files);
    // }



    public static function find($slug)
    {
        $posts = static::all();
        return $posts -> firstWhere('slug', $slug);
        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     //return redirect('/');
        //     throw new ModelNotFoundException();
        // }

        // return cache() -> remember("posts.{$slug}",1200, fn() => file_get_contents($path));
        // return view('post',['post => $post']);
    }


}