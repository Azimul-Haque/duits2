<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Blog;
use App\Category;
use App\Adhocmember;
use App\Application;
use App\Notice;

use Carbon\Carbon;
use DB;
use Hash;
use Auth;
use Image;
use File;
use Session;
use Artisan;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('getLogin');
        $this->middleware('auth')->only('getProfile');
    }

    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get()->take(3);
        $alumnis = User::where('payment_status', 1)
                       ->where('role', 'alumni')->count();

        return view('index.index')
                    ->withBlogs($blogs)
                    ->withAlumnis($alumnis);
    }

    public function getJourney()
    {
        return view('index.journey');
    }

    public function getConstitution()
    {
        return view('index.constitution');
    }

    public function getFaq()
    {
        return view('index.faq');
    }

    public function getAdhoc()
    {
        $adhocmembers = Adhocmember::orderBy('id', 'asc')->get();
        return view('index.adhoc')->withAdhocmembers($adhocmembers);
    }

    public function getExecutive()
    {
        return view('index.executive');
    }

    public function getNews()
    {
        return view('index.news');
    }

    public function getEvents()
    {
        return view('index.events');
    }

    public function getGallery()
    {
        return view('index.gallery');
    }

    public function getMembers()
    {
        $members = User::where('role', 'alumni')
                       ->where('payment_status', 1)
                       ->orderBy('degree', 'asc')
                       ->orderBy('batch', 'asc')
                       ->orderBy('roll', 'asc')
                       ->get();
        return view('index.members')->withMembers($members);
    }

    public function getContact()
    {
        return view('index.contact');
    }

    public function storeFormMessage(Request $request)
    {
        // $this->validate($request,array(
        //     'name'                      => 'required|max:255',
        //     'email'                     => 'required|max:255',
        //     'message'                   => 'required',
        //     'contact_sum_result_hidden'   => 'required',
        //     'contact_sum_result'   => 'required'
        // ));

        // if($request->contact_sum_result_hidden == $request->contact_sum_result) {
        //     $message = new Formmessage;
        //     $message->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        //     $message->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
        //     $message->message = htmlspecialchars(preg_replace("/\s+/", " ", $request->message));
        //     $message->save();
            
        //     Session::flash('success', 'আপনার বার্তা আমাদের কাছে পৌঁছেছে। ধন্যবাদ!');
        //     return redirect()->route('index.contact');
        // } else {
        //     return redirect()->route('index.contact')->with('warning', 'যোগফল ভুল হয়েছে! আবার চেষ্টা করুন।')->withInput();
        // }
    }

    public function getLogin()
    {
        return view('index.login');
    }

    public function getProfile($unique_key)
    {
        $blogs = Blog::where('user_id', Auth::user()->id)->get();
        $categories = Category::all();
        $user = User::where('unique_key', $unique_key)->first();
        if(Auth::user()->unique_key == $unique_key) {
            return view('index.profile')
                    ->withUser($user)
                    ->withCategories($categories)
                    ->withBlogs($blogs);
        } else {
            Session::flash('info', 'Redirected to your profile!');
            return redirect()->route('index.profile', Auth::user()->unique_key); 
        }
        
    }

    public function storeApplication(Request $request)
    {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'required|email|unique:users,email',
            'phone'                     => 'required|numeric',
            'dob'                       => 'required|max:255',
            'degree'                    => 'required|max:255',
            'batch'                     => 'required|max:255',
            'roll'                      => 'required|max:255',
            'passing_year'              => 'required|numeric',
            'current_job'               => 'sometimes|max:255',
            'designation'               => 'sometimes|max:255',
            'address'                   => 'required|max:255',
            'fb'                        => 'sometimes|max:255',
            'twitter'                   => 'sometimes|max:255',
            'gplus'                     => 'sometimes|max:255',
            'linkedin'                  => 'sometimes|max:255',
            'image'                     => 'required|image|max:300',
            'password'                  => 'required|min:8|same:password_confirmation'
        ));

        $application = new User();
        $application->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $application->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
        $application->phone = htmlspecialchars(preg_replace("/\s+/", " ", $request->phone));
        $dob = htmlspecialchars(preg_replace("/\s+/", " ", $request->dob));
        $application->dob = new Carbon($dob);
        $application->degree = htmlspecialchars(preg_replace("/\s+/", " ", $request->degree));
        $application->batch = htmlspecialchars(preg_replace("/\s+/", " ", $request->batch));
        $application->roll = htmlspecialchars(preg_replace("/\s+/", " ", $request->roll));
        $application->passing_year = htmlspecialchars(preg_replace("/\s+/", " ", $request->passing_year));
        $application->current_job = htmlspecialchars(preg_replace("/\s+/", " ", $request->current_job));
        $application->designation = htmlspecialchars(preg_replace("/\s+/", " ", $request->designation));
        $application->address = htmlspecialchars(preg_replace("/\s+/", " ", $request->address));
        $application->fb = htmlspecialchars(preg_replace("/\s+/", " ", $request->fb));
        $application->twitter = htmlspecialchars(preg_replace("/\s+/", " ", $request->twitter));
        $application->gplus = htmlspecialchars(preg_replace("/\s+/", " ", $request->gplus));
        $application->linkedin = htmlspecialchars(preg_replace("/\s+/", " ", $request->linkedin));

        // image upload
        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $filename   = str_replace(' ','',$request->name).time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/images/users/'. $filename);
            Image::make($image)->resize(250, 250)->save($location);
            $application->image = $filename;
        }
        $application->password = Hash::make($request->password);

        $application->role = 'alumni';
        $application->payment_status = 0;

        // amount will be set dynamically
        // $application->amount = null;
        // $application->trxid = null;

        // generate unique_key
        $unique_key_length = 100;
        $pool = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $unique_key = substr(str_shuffle(str_repeat($pool, 100)), 0, $unique_key_length);
        // generate unique_key
        $application->unique_key = $unique_key;
        $application->save();
        
        Session::flash('success', 'You have registered Successfully!');
        Auth::login($application);
        return redirect()->route('index.profile', $unique_key);
    }

    public function getApplication()
    {
        return view('index.application.application');
    }

    public function storeITFestApplication(Request $request)
    {
        $this->validate($request,array(
            'event'             => 'required',
            'team'              => 'required|max:255',
            'member1'           => 'sometimes|max:255',
            'member2'           => 'sometimes|max:255',
            'member3'           => 'sometimes|max:255',
            'member4'           => 'sometimes|max:255',
            'institution'       => 'required|max:255',
            'address'           => 'required|max:255',
            'email'            => 'required|email',
            'mobile'            => 'required|numeric',
            'emergencycontact'  => 'required|numeric',
            'image'             => 'required|image|max:300'
        ));
        $application = new Application;
        $event = explode(',', $request->event);
        $application->event_id = $event[0];
        $application->event_name = $event[1];
        
        $application->team = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->team)));
        $application->member1 = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->member1)));
        $application->member2 = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->member2)));
        $application->member3 = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->member3)));
        $application->member4 = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->member4)));
        $application->institution = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->institution)));
        $application->class = 'text';
        $application->address = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->address)));
        $application->email = $request->email;
        $application->mobile = $request->mobile;
        $application->emergencycontact = $request->emergencycontact;
        
        // image upload
        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $nowdatetime = Carbon::now();
            $filename   = str_replace(' ','',$application->team).$nowdatetime->format('YmdHis') .'.' . $image->getClientOriginalExtension();
            $location   = public_path('images/registrations/'. $filename);
            Image::make($image)->resize(200, 200)->save($location);
            $application->image = $filename;
        }
        
        $application->registration_id = $event[0]. random_string(6);
        
        // amounts to register
        $amounts=array("1"=>"1500","2"=>"2000","3"=>"200","4"=>"2000","5"=>"300","6"=>"500","7"=>"2000");
        if($amounts[$event[0]]) {
            $application->amount = $amounts[$event[0]];
        }
        $application->payment_status = 0;
        $application->card_type = '';
        //dd($application);
        $application->save();
        Session::flash('success','Registration is complete!');
        Session::flash('warning','You need to make the payment');
        return redirect(Route('application.payorcheck', $application->registration_id));
    }

    public function getPayorCheck($registration_id)
    {
        $application = Application::where('registration_id', $registration_id)->first();
        
        return view('index.application.payorcheck')->withApplication($application);
    }

    public function getPrintReceipt($registration_id)
    {
        $application = Application::where('registration_id', $registration_id)->first();
        return view('index.application.printreceipt')->withApplication($application);
    }

    public function getNotice()
    {
        $notices = Notice::orderBy('id', 'desc')->paginate(6);
        return view('index.notice')->withNotices($notices);
    }

    // clear configs, routes and serve
    public function clear()
    {
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        echo 'Config and Route Cached. All Cache Cleared';
    }
}
