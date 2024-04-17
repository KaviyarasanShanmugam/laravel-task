<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index () 
    {
        $data['admin'] = Admin::pluck('name', 'id')->toArray();
        $data['customer'] = Customer::pluck('name', 'id')->toArray();
        $data['comments'] = Comment::with('admin', 'customer')->get();
        return view('welcome', $data);
    }

    public function store(Request $request)
    {
        $user_type = $request->user_type == 1 ? 'admin_id' : 'customer_id';
        $data[$user_type] = $request->user;
        $data['description'] = $request->description;
        Comment::create($data);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
