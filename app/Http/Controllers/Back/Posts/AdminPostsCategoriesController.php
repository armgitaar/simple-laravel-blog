<?php

namespace App\Http\Controllers\Back\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\CategoriesRepository;

class AdminPostsCategoriesController extends Controller
{

    protected $categories;

    protected $users;

    public function __construct(UserRepository $users,CategoriesRepository $categories)
    {
        $this->middleware('auth');
        $this->categories = $categories;
        $this->users = $users;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list = $this->categories->paginate(50);


        return view('back.categories.list',compact('list'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.categories.create');
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
            'name' => 'required',
            'active' => 'required',
        ]);
        $inputs = $request->all();
        $status = $this->categories->create($inputs);
        ($status)? $request->session()->flash('success', 'New Category created Successfully!'): $request->session()->flash('fail', 'Failed!');

        return redirect("admin/posts-categories");

        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
