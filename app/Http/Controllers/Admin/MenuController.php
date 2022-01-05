<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Dishes;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dishes::orderBy('id','desc')->get();    
        $menu = Menu::orderBy('id','desc')->get();

        return view('admin.menu',['menu'=>$menu,'dishes'=>$dishes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_name'=> ['required','string','max:255'],
        ]);

        $menu = new Menu;
        $menu->menu_name = ucwords($request->menu_name);
        $menu->save();

        return redirect(route('admin.menu.index'));

    }

    public function storeDish(Request $request){
        $request->validate([
            'dish_menu'=> ['required','numeric','max:255'],
            'dish_name'=> ['required','string','max:255'],
            'dish_image'=> ['required','image','max:5000','mimes:jpeg,jpg,png'],
            'dish_price'=> ['required','numeric','max:255'],
            'dish_desc'=> ['required','string','max:255'],
        ]);

        $dish_menu = $request->dish_menu;
        $dish_name = ucwords($request->dish_name);
        $new_image_name = time().'.'.$request->dish_image->extension();
        $dish_price = $request->dish_price;
        $dish_desc = trim($request->dish_desc);

        $dishes = new Dishes;
        $dishes->menu_id = $dish_menu;
        $dishes->dish_name = $dish_name;
        $dishes->image = $new_image_name;
        $dishes->price = $dish_price;
        $dishes->desc = $dish_desc;
        $dishes->save();

        //upload image
        $request->dish_image->storeAs('public/food', $new_image_name);

        return redirect(route('admin.menu.index'));
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
        $request->validate([
            'menu_name'=> ['required','string','max:255'],
        ]);

        
        $menu = Menu::find($id);

        if($menu){
            $menu->menu_name = $request->menu_name;
            $menu->save();
            
            return redirect(route('admin.menu.index'))->with('success', 'Menu Name Updated Successfuly');

        }else{
            return redirect(route('admin.menu.index'))->with('fail', 'Menu Name Updated Failed');
        }
    }

    public function updateDish(Request $request, $id)
    {
        $request->validate([
            'dish_menu'=> ['required','numeric','max:255'],
            'dish_name'=> ['required','string','max:255'],
            'dish_image'=> ['image','max:5000','mimes:jpeg,jpg,png'],
            'dish_price'=> ['required','numeric','max:255'],
            'dish_desc'=> ['required','string','max:255'],
        ]);

        $dish = Dishes::find($id);

        if($dish){
            $dish_menu = $request->dish_menu;
            $dish_name = ucwords($request->dish_name);
            $dish_price = $request->dish_price;
            $dish_desc = trim($request->dish_desc);

            $dish->menu_id = $dish_menu;
            $dish->dish_name = $dish_name;
            $dish->price = $dish_price;
            $dish->desc = $dish_desc;

            //update image if image exist
            if($request->dish_image){
                //delete old image
                $old_image_path = 'public/food/'.$dish->image;
                if(Storage::exists($old_image_path)){
                    Storage::delete($old_image_path);
                }

                $new_image_name = time().'.'.$request->dish_image->extension();
                $dish->image = $new_image_name;
                //upload new image
                $request->dish_image->storeAs('public/food', $new_image_name);
            }

            $dish->save();
            
            return redirect(route('admin.menu.index'))->with('success', 'Dish Updated Successfuly');

        }else{
            return redirect(route('admin.menu.index'))->with('fail', 'Dish Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        if($menu){
            //delete dish image first
            $dishes = Dishes::where('menu_id', $id)->get();
            foreach($dishes as $dish){
                $image_path = 'public/food/'.$dish->image;
                if(Storage::exists($image_path)){
                    Storage::delete($image_path);
                }
            };

            //delete dishes in db
            Dishes::where('menu_id', $id)->delete();
            Menu::find($id)->delete();

            return redirect(route('admin.menu.index'))->with('success', 'Delete Success');

        }else{
            return redirect(route('admin.menu.index'))->with('fail', 'Delete Failed');
        }
    }

    public function destroyDish($id)
    {
        $dish = Dishes::find($id);
        if($dish){
             //delete image
            $image_path = 'public/food/'.$dish->image;
            if(Storage::exists($image_path)){
                Storage::delete($image_path);
            }

            //delete in db
            DB::table('dishes')->delete($id);

            return redirect(route('admin.menu.index'))->with('success', 'Delete Success');

        }else{
            return redirect(route('admin.menu.index'))->with('fail', 'Delete Failed');
        }

       
    }
}
