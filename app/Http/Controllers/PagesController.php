<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Career;
use App\News;
use App\Banner;
use App\HomeBanner;
use App\HomeBg;
use App\Nationality;
use App\Service;
use App\MainCategory;
use App\SubCategory;
use App\MainProject;
use App\SubProject;
use App\HomeQuote;
use App\HomeAdvertisement;
use App\Certificate;
use App\About;
use App\HomeAbout;
use App\Team;
use App\Office;

class PagesController extends Controller
{
    public function index(){
        $projects = SubProject::where('featured', true) -> take(5) -> get();
        $bg = HomeBg::first();
        $services = Service::where('featured', true) -> get();
        $advertisements = HomeAdvertisement::all();
        $banners = HomeBanner::all();
        $about = HomeAbout::first();
        $quote = HomeQuote::first();
    	return view('front_end.index') -> with('projects', $projects) -> with('services', $services) -> with('bg', $bg) -> with('advertisements', $advertisements) -> with('quote', $quote) -> with('about', $about) -> with('banners', $banners);
    }

    public function aboutUs(){
        $banner = Banner::where('type', 'about') -> first();
        $abouts = About::all();
        $teams = Team::all();
        $about_first_tab = About::first();
        $certificates = Certificate::all();
    	return view('front_end.about-us') -> with('about_first_tab', $about_first_tab) -> with('teams', $teams) -> with('certificates', $certificates) -> with('abouts', $abouts) -> with('banner' , $banner);
    }

    public function aboutTab($id){
        $banner = Banner::where('type', 'about') -> first();
        $abouts = About::all();
        $teams = Team::all();
        $certificates = Certificate::all();
        $about_tab = About::findOrFail($id);
        return view('front_end.about-us-tabs') -> with('about_tab', $about_tab) -> with('teams', $teams) -> with('certificates', $certificates) -> with('abouts', $abouts) -> with('banner' , $banner);
    }

    public function jobApply($id){
        $banner = Banner::where('type', 'careers') -> first();
        $career = Career::findOrFail($id);
        $nationalities = Nationality::all();
    	return view('front_end.apply') -> with('nationalities', $nationalities) -> with('banner' , $banner) -> with('career', $career);
    }

    public function career(){
        $banner = Banner::where('type', 'careers') -> first();
        $careers = Career::orderBy('id', 'DESC') ->  get();
    	return view('front_end.career') -> with('banner' , $banner) -> with('careers', $careers);
    }

    public function certificates(){
        $abouts = About::all();
        $banner = Banner::where('type', 'certificates') -> first();
        $certificates = Certificate::all();
    	return view('front_end.certificates') -> with('abouts', $abouts) -> with('certificates', $certificates) -> with('banner' , $banner);
    }

    public function clients(){
        $banner = Banner::where('type', 'clients') -> first();
    	return view('front_end.clients') -> with('banner' , $banner);
    }

    public function contactUs(){
        $offices = Office::all();
        $banner = Banner::where('type', 'contact') -> first();
    	return view('front_end.contact-us') -> with('offices', $offices) -> with('banner' , $banner);
    }

    public function inquiry(){
        $nationalities = Nationality::all();
        $banner = Banner::where('type', 'inquiry') -> first();
    	return view('front_end.inquiry') -> with('nationalities', $nationalities) -> with('banner' , $banner);
    }

    public function news(){
        $banner = Banner::where('type', 'news') -> first();
        $news = News::orderBy('id', 'DESC') -> get();
    	return view('front_end.news') -> with('banner' , $banner) -> with('news', $news);
    }

    public function ourTeam(){
        $abouts = About::all();
        $teams = Team::all();
        $banner = Banner::where('type', 'teams') -> first();
    	return view('front_end.our-team') -> with('abouts', $abouts) -> with('teams', $teams) -> with('banner' , $banner);
    }

    public function projects(){
        $mainCategories = MainCategory::all();
        $projects = SubProject::where('visibility', true) -> paginate(9);
        $banner = Banner::where('type', 'projects') -> first();
    	return view('front_end.projects') -> with('projects', $projects) -> with('mainCategories', $mainCategories) -> with('banner' , $banner);
    }

    public function projectLarge($id){
        $project = SubProject::findOrFail($id);
        $relatedProjects = SubProject::where('sub_category_id', $project -> sub_category_id) -> where('id','!=', $project -> id) -> where('visibility', true) -> get();
        $banner = Banner::where('type', 'projects') -> first();
    	return view('front_end.project-large') -> with('banner' , $banner)  -> with('relatedProjects', $relatedProjects) -> with('project', $project);
    }

    public function projectMainLarge($id){
        $project = MainProject::findOrFail($id);
        $relatedProjects = MainProject::where('main_category_id', $project -> main_category_id) -> where('id','!=', $project -> id) -> where('visibility', true) -> get();
        $banner = Banner::where('type', 'projects') -> first();
        return view('front_end.project-large') -> with('banner' , $banner)  -> with('relatedProjects', $relatedProjects) -> with('project', $project);
    }

    public function subProjects($id){
        $mainCategories = MainCategory::all();
        $projects = SubProject::where('sub_category_id', $id) -> where('visibility', true) -> paginate(9);
        $banner = Banner::where('type', 'projects') -> first();
        return view('front_end.projects') -> with('projects', $projects) -> with('mainCategories', $mainCategories) -> with('banner' , $banner);
    }

    public function mainProjects($id){
        $mainCategories = MainCategory::all();
        $projects = MainProject::where('main_category_id', $id) -> where('visibility', true) -> paginate(9);
        $banner = Banner::where('type', 'projects') -> first();
        return view('front_end.projects') -> with('projects', $projects) -> with('mainCategories', $mainCategories) -> with('banner' , $banner);
    }

    public function services(){
        $services = Service::all();
        $banner = Banner::where('type', 'services') -> first();
    	return view('front_end.services') -> with('services', $services) -> with('banner' , $banner);
    }

    public function serviceLarge($id){
        $service = Service::findOrFail($id);
        $banner = Banner::where('type', 'services') -> first();
    	return view('front_end.services-large') -> with('service', $service) -> with('banner' , $banner);
    }
}
