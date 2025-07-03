<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;

use Illuminate\Http\Request;

class PostController extends AdminController
{
    //
    // public function view() {
    //     return view('admin.posts.view');
    // }

    public function addPost() {
        return view('admin.posts.add');
    }
}
