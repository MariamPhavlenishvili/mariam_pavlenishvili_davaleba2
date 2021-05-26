<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\BlogsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mainView()
    {

        return view('pages.myBlog',['blogs'=>BlogsModel::where('user_id',auth()->user()->id)->get()
            ]);
    }

    /*public function forAddBlog()
    {
        return view('pages.blogs');
    }*/

    /*public function saveBlog(Request $request)
    {

        BlogsModel::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->post('title'),
            'tag'=>$request->post('tag'),
            'time'=>$request->post('time'),
            'text'=>$request->post('text')
        ]);
        return redirect('/myBlog');

    }*/

    /*public function index()
    {
        return view('pages.myBlog',['blogs'=>BlogsModel::where('user_id',auth()->user()->id)->get()
        ]);
    }*/
    public function create()
    {
        return view('pages.blogs');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'tag' => 'required|max:255',
            'time' => 'required',
            'text' => 'required'
        ]);


        BlogsModel::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->input('title'),
            'tag'=>$request->input('tag'),
            'time'=>$request->input('time'),
            'text'=>$request->input('text')
        ]);

        return redirect('/myBlog');
    }

    public function updateBlog(Request $request){

        if(BlogsModel::where('id',$request->post('id'))->count()==0){

            echo 'Result not found';

        }else{
            BlogsModel::where('id',$request->post('id'))->update([
                'title'=>$request->post('title'),
                'tag'=>$request->post('tag'),
                'time'=>$request->post('time'),
                'text'=>$request->post('text')
            ]);
            return redirect('/myBlog');
        }
    }

    public function editBlog($id){

        return view('pages.blogs', [
            'blogs' => BlogsModel::all(),
            'edit_resource' => BlogsModel::where(['id'=>$id,'user_id' => auth()->user()->id])->first(),
        ]);
    }

    public function deleteBlog($id){

        if(BlogsModel::where(['id'=>$id,'user_id' => auth()->user()->id])->count() == 0){

            echo 'Result not found';

        }else{

            BlogsModel::where(['id'=>$id,'user_id' => auth()->user()->id])->delete();
            return redirect('/myBlog');
        }
    }

}
