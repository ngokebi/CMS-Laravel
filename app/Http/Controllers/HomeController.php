<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Image;
use Auth;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function Slider() {

        $sliders = Slider::latest()->paginate(5);

        return view('admin.slider.index', compact('sliders'));
    }

    public function NewSlider() {

        return view('admin.slider.add_slider');
    }

    public function AddSlider(Request $request) {

        $validated = $request->validate(
            [
                'title' => 'required|unique:sliders|min:4',
                'description' => 'required|unique:sliders|min:10',
                'image' => 'required|mimes:jpg,jpeg,png',

            ],
            // [
            //     'title.required' => 'Please Input Slider Title',
            //     'title.min' => 'Slider Title Must have at Least 4 Characters',

            // ]
        );

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1088)->save('image/slider/' . $name_gen);

        $last_img = 'image/slider/' . $name_gen;


        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.slider')->with('success', 'Slider Created Successfully');
    }

    public function EditSlider($id)
    {
        //Eloquent
        $sliders = Slider::find($id);

        // Query
        // $categories = DB::table('categories')->where('id', $id)->first();

        return view('admin.slider.edit_slider', compact('sliders'));
    }

    public function UpdateSlider(Request $request, $id)
    {

        $validated = $request->validate(
            [
                'title' => 'required|min:4',
                'description' => 'required|min:10',
            ]
        );

        $old_image = $request->old_image;

        $slider_image = $request->file('image');

        if ($slider_image) {

            $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(1920, 1088)->save('image/slider/' . $name_gen);

            $last_img = 'image/slider/' . $name_gen;

            unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
        }
    }

    public function DeleteSlider($id)
    {

        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);


        Slider::find($id)->delete();

        return Redirect()->back()->with('success', 'Slider Deleted Successfully');
    }

    // Team

    public function Team() {

        return view('layouts.pages.team');

    }

    // Testimonials

    public function Testimonies() {

        return view('layouts.pages.testimonials');

    }

    // Servies

    public function Service() {

        return view('layouts.pages.services');

    }
}
