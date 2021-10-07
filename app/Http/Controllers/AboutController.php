<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Auth;

class AboutController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function About()
    {

        $home_about = HomeAbout::latest()->get();

        return view('admin.about.index', compact('home_about'));
    }

    public function New_About()
    {

        return view('admin.about.add_about');
    }

    public function AddAbout(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|min:4',
                'short_description' => 'required|min:10',
                'long_description' => 'required|min:10',

            ],
        );

        HomeAbout::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success', 'About Created Successfully');
    }

    public function EditAbout($id)
    {

        $home_about = HomeAbout::find($id);

        return view('admin.about.edit_about', compact('home_about'));
    }

    public function UpdateAbout(Request $request, $id)
    {

        $validated = $request->validate(
            [
                'title' => 'required|min:4',
                'short_description' => 'required|min:10',
                'long_description' => 'required|min:10',
            ]
        );


            $update = HomeAbout::find($id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('home.about')->with('success', 'About Updated Successfully');
        }

    public function DeleteAbout($id)
    {

        $delete = HomeAbout::find($id)->delete();

        return Redirect()->back()->with('success', 'About Deleted Successfully');
    }

    public function Portfolio() {

        $images = Multipic::all();

        return view('layouts.pages.portfolio', compact('images'));
    }


    // About Full Page

    public function AboutPage()
    {
        $about = DB::table('home_abouts')->first();
        $about_brand = DB::table('brands')->get();

        return view('layouts.pages.about', compact('about', 'about_brand'));
    }

}
