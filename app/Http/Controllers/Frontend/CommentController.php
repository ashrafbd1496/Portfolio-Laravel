<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Frontend\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'comment' => 'required|max:500',
            'contact_question'   =>  'required|integer',
            'captcha'   =>  'required|same:contact_question',
        ]);

        // Get All Request
        $input = $request->all();

        // Decrypt
        $page = Crypt::decrypt($input['page']);

        if ($page == 98) {
            $blog_id = Crypt::decrypt($input['blog_id']);

            $blog = Blog::find($blog_id);

            $input['blog_id'] = $blog->id;
            $slug = $blog->slug;
        }

        if ($input['null_value'] != "") {
            return redirect()->route('blog-page.show', $slug)
                ->with('warning', 'frontend.please_try_again');
        }

        // Record to database
        Comment::firstOrCreate([
            'blog_id' => $input['blog_id'],
            'name' => $input['name'],
            'email' => $input['email'],
            'comment' => $input['comment'],
        ]);

        return redirect()->route('blog-page.show', $slug)
            ->with('success', 'frontend.your_comment_is_pending_approval');

    }
}
