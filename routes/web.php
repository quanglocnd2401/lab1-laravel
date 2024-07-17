<?php

use App\Models\Article;
use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

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

    $image = Image::find(1);
    $video = Video::find(1);
    $article = Article::find(1);

    //Lấy tất cả các bình luận của một bài viết cụ thể theo kiểu chỏ sang relation:  $article->comments
    $commentsAricle = $article->comments;

    //Lấy tất cả các đánh giá của một video cụ thể  theo kiểu chỏ sang relation:
    $ratesVideo = $video->rates;

    // Lấy tất cả các bình luận của một người dùng cụ thể (có thể dùng join or sử dụng relation)
    $userComment = User::with('comment')->find(1);
    $comments = $userComment->comment->toArray();

    //Lấy trung bình đánh giá của một bài viết cụ thể
    $avgRate = $article->rates->avg('rate');

    // Lấy tất cả các bài viết, video, và hình ảnh được bình luận bởi một người dùng cụ thể .
    // Gợi ý: lấy tất cả comment theo user id, sau đó sử dụng filter của collection để lấy dữ liệu theo từng loại bài viết.
    $userComment = User::with('comment')->find(1);
    $comments = $userComment->comment;
    $filted = $comments->filter(function ($item){
        return $item['commentable_type'] == "App\Models\Video";
    });

    dd($filted->toArray());

    //  Lấy danh sách các bài viết, video, và hình ảnh có đánh giá trung bình cao nhất. 





    return view('index', compact('article'));
});
