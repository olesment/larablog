<?php
use App\Models;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //$files = File::files(resource_path("posts\\"));
    // $posts = Post::all();
    //V3
    // $posts = collect(File::files(resource_path("posts\\")))
    //     ->map(function($file){
    //         $fileContent = file_get_contents($file->getPathname());
    //         return YamlFrontMatter::parse($fileContent);
    //     })
    
    //     ->map(function ($document) {
    //         // $fileContent = file_get_contents($file->getPathname()); 
    //         // $document = YamlFrontMatter::parse($fileContent);

    //         return new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body(),
    //             $document->slug
    //         );
    //     });

    //V2
    // $posts = array_map(function ($file) {
    //     $fileContent = file_get_contents($file->getPathname()); // mingil p]hjusel otse pathi andmine nagu alumises versioonis ei t;;tanud. pidi tegema nii
    //     $document = YamlFrontMatter::parse($fileContent);
    //     return $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);
    
    //V1
    // $posts = []; 
    // foreach ($files as $file) {
    //     $fileContent = file_get_contents($file->getPathname()); // mingil p]hjusel otse pathi andmine nagu alumises versioonis ei t;;tanud. pidi tegema nii
    //     $document = YamlFrontMatter::parse($fileContent);
    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),// Assuming 'body()' is a method that returns the body content.
    //         $document->slug
    //     );
    // }

    return view('posts', [
        'posts'=>Post::all()
    ]);
    
});
// Route::get('/', function () {
//     $files = File::files(resource_path("posts\\"));

//     dump($files);
//     foreach ($files as $file) {
//     $fileContent = file_get_contents($file->getPathname());
//     $document = YamlFrontMatter::parse($fileContent);
//     dump($document);
//     }
//     $posts = [];
//     foreach( $files as $file ) {
//         $document = YamlFrontMatter::parse($file);
//         dump($document);
//         $posts[] = new Post(
//             $document->title,
//             $document->excerpt,
//             $document->date,
//             $document->body()
//         );
        
//     }
//     dump($posts);
//     //return view('posts',['posts'=> Post::all()]);
// });

Route::get('posts/{post}', function (Post $post){
    

    return view('post', [
        'post' => $post//Post::findOrFail($id)
    ]);
   
   //Find a post by its slug and pass it to a view called post
   //post here is a class, ep 11

   
    // $path = __DIR__ . "/../resources/posts/{$slug}.html";
    //     if(! file_exists($path)){
    //         return redirect("/");
    //         //dd('File doesnt exist');
    //     }
    
    // $post = cache()->remember("posts/{$slug}",5, function() use ($path){
    //     //var_dump('file_get_contents');
    //     return file_get_contents($path);
    // });

    // return view('post',[
    //     'post' => $post
    // ]);

});