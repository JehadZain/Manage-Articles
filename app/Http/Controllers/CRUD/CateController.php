<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CateController extends Controller
{
    public function create(){
        return view('category.create');
    }
    public function store(categoryRequest $request){
        //validation and messages in class (categoryRequest)
        Category::create([
            'name' =>$request -> name ,
        ]);
        return redirect()->back()->with(['success'=>'Done']);
    }
    public function getAllCategory(){
        $categorys = Category::select(
            'id',
            'name'
        )->paginate(5);
        return view('category.show',compact('categorys'));
    }
    public function getAllCategoryAdmin(){
        $categorys = Category::select(
            'id',
            'name'
        )->paginate(5);
        return view('category.show',compact('categorys'));
    }
    public function editCategory($category_id){
        $category = Category::find($category_id);
        if(!$category){
            return redirect() -> back() ->with(['error' => 'The Category is not exist']);
        }
        $category = Category::select('id','name')->find($category_id);
        return view('category.edit',compact('category'));
    }
    public function updateCategory(categoryRequest $request,$category_id){
        $category = Category::find($category_id);
        if(!$category){
            return redirect() -> back() ->with(['error' => 'The Category is not exist']);
        }
        $category -> update($request->all());
        return redirect()->back()->with(['success' => 'The Update has Done']);
    }
    public function deleteCategory($category_id)
    {
        //chek if Category exists
        $category = Category::find($category_id);
        if (!$category) {
            return redirect()->back()->with(['error' => 'The Category is not exist']);
        }
        // delete data
        $category->delete();
        return redirect()->back()->with(['success' => 'The Category has been Deleted']);
    }
}
