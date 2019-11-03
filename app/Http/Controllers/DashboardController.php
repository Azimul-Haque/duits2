<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Adhocmember;
use App\Committee;
use App\Committeetype;
use App\User;
use App\Notice;

use DB;
use Auth;
use Image;
use File;
use Session;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function getCommittee()
    {
        $committeetypes = Committeetype::all();

        $committees = Committee::orderBy('id', 'desc')->get();
        return view('dashboard.committee')
                        ->withCommitteetypes($committeetypes)
                        ->withCommittees($committees);
    }

    public function storeCommittee(Request $request)
    {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'sometimes|email',
            'phone'                     => 'sometimes|numeric',
            'designation'               => 'required|max:255',
            'fb'                        => 'sometimes|max:255',
            'twitter'                   => 'sometimes|max:255',
            'linkedin'                  => 'sometimes|max:255',
            'committeetype_id'          => 'required',
            'serial'                    => 'required',
            'image'                     => 'sometimes|image|max:400'
        ));

        $committee = new Committee;
        $committee->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
        $committee->phone = htmlspecialchars(preg_replace("/\s+/", " ", $request->phone));
        $committee->designation = htmlspecialchars(preg_replace("/\s+/", " ", $request->designation));
        $committee->fb = htmlspecialchars(preg_replace("/\s+/", " ", $request->fb));
        $committee->twitter = htmlspecialchars(preg_replace("/\s+/", " ", $request->twitter));
        $committee->linkedin = htmlspecialchars(preg_replace("/\s+/", " ", $request->linkedin));

        // image upload
        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $filename   = str_replace(' ','',$request->name).time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/images/committee/'. $filename);
            Image::make($image)->resize(400, 400)->save($location);
            $committee->image = $filename;
        }
        $committee->serial = $request->serial;
        $committee->committeetype_id = $request->committeetype_id;
        $committee->save();
        
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.committee');
    }

    public function updateCommittee(Request $request, $id) {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'sometimes|email',
            'phone'                     => 'sometimes|numeric',
            'designation'               => 'required|max:255',
            'fb'                        => 'sometimes|max:255',
            'twitter'                   => 'sometimes|max:255',
            'linkedin'                  => 'sometimes|max:255',
            'committeetype_id'          => 'required',
            'serial'                    => 'required',
            'image'                     => 'sometimes|image|max:400'
        ));

        $committee = Committee::find($id);
        $committee->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->email = htmlspecialchars(preg_replace("/\s+/", " ", $request->email));
        $committee->phone = htmlspecialchars(preg_replace("/\s+/", " ", $request->phone));
        $committee->designation = htmlspecialchars(preg_replace("/\s+/", " ", $request->designation));
        $committee->fb = htmlspecialchars(preg_replace("/\s+/", " ", $request->fb));
        $committee->twitter = htmlspecialchars(preg_replace("/\s+/", " ", $request->twitter));
        $committee->linkedin = htmlspecialchars(preg_replace("/\s+/", " ", $request->linkedin));

        // image upload
        if($committee->image == null) {
            if($request->hasFile('image')) {
                $image      = $request->file('image');
                $filename   = str_replace(' ','',$request->name).time() .'.' . $image->getClientOriginalExtension();
                $location   = public_path('/images/committee/'. $filename);
                Image::make($image)->resize(400, 400)->save($location);
                $committee->image = $filename;
            }
        } else {
            if($request->hasFile('image')) {
                $image_path = public_path('images/committee/'. $committee->image);
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $image      = $request->file('image');
                $filename   = str_replace(' ','',$request->name).time() .'.' . $image->getClientOriginalExtension();
                $location   = public_path('/images/committee/'. $filename);
                Image::make($image)->resize(400, 400)->save($location);
                $committee->image = $filename;
            }
        }
        $committee->serial = $request->serial;
        $committee->committeetype_id = $request->committeetype_id;
            
        $committee->save();
        
        Session::flash('success', 'Updated Successfully!');
        return redirect()->route('dashboard.committee');
    }

    public function deleteCommittee($id)
    {
        $committee = Committee::find($id);
        $image_path = public_path('images/committee/'. $committee->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $committee->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.committee');
    }

    public function getNews()
    {
        return view('dashboard.index');
    }

    public function getEvents()
    {
        return view('dashboard.index');
    }

    public function getGallery()
    {
        return view('dashboard.index');
    }

    public function getBlogs()
    {
        return view('dashboard.index');
    }

    public function getMembers()
    {
        $members = User::where('payment_status', 1)
                            ->where('role', 'alumni')
                            ->get();
        return view('dashboard.members')->withMembers($members);
    }

    public function deleteMember($id)
    {
        //
    }

    public function getApplications()
    {
        $applications = User::where('payment_status', 0)
                            ->where('role', 'alumni')
                            ->get();
        return view('dashboard.applications')->withApplications($applications);
    }

    public function approveApplication(Request $request, $id)
    {
        $this->validate($request,array(
            'amount'    => 'required',
            'trxid'     => 'sometimes'
        ));

        $application = User::findOrFail($id);
        $application->payment_status = 1;
        $application->amount = $request->amount;
        $application->trxid = $request->trxid;
        $application->save();

        Session::flash('success', 'Approved Successfully!');
        return redirect()->route('dashboard.applications');
    }

    public function deleteApplication($id)
    {
        // $committee = committee::find($id);
        // $image_path = public_path('images/committee/adhoc/'. $committee->image);
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }
        // $committee->delete();

        // Session::flash('success', 'Deleted Successfully!');
        // return redirect()->route('dashboard.committee');
    }

    public function getNotice()
    {
        $notices = Notice::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.notice')->withNotices($notices);
    }

    public function storeNotice(Request $request)
    {
        $this->validate($request,array(
            'name'          =>   'required',
            'attachment'    => 'required|mimes:doc,docx,ppt,pptx,png,jpeg,jpg,pdf,gif,txt|max:10000'
        ));

        $notice = new Notice;
        $notice->name = $request->name;

        if($request->hasFile('attachment')) {
            $newfile = $request->file('attachment');
            $filename   = 'file_'.time() .'.' . $newfile->getClientOriginalExtension();
            $location   = public_path('/files/');
            $newfile->move($location, $filename);
            $notice->attachment = $filename;
        }
        
        $notice->save();
        
        Session::flash('success', 'Created successfully!');
        return redirect()->route('dashboard.notice');
    }

    public function updateNotice(Request $request, $id)
    {
        $this->validate($request,array(
            'name'          =>   'required',
            'attachment'    => 'sometimes|mimes:doc,docx,ppt,pptx,png,jpeg,jpg,pdf,gif,txt|max:10000'
        ));

        $notice = Notice::find($id);
        $notice->name = $request->name;

        if($request->hasFile('attachment')) {
            // delete the previous one
            $file_path = public_path('files/'. $notice->attachment);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
            $newfile = $request->file('attachment');
            $filename   = 'file_'.time() .'.' . $newfile->getClientOriginalExtension();
            $location   = public_path('/files/');
            $newfile->move($location, $filename);
            $notice->attachment = $filename;
        }
        
        $notice->save();
        
        Session::flash('success', 'Updated successfully!');
        return redirect()->route('dashboard.notice');
    }

    public function deleteNotice($id)
    {
        $notice = Notice::find($id);
        $file_path = public_path('files/'. $notice->attachment);
        if(File::exists($file_path)) {
            File::delete($file_path);
        }
        $notice->delete();
        
        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.notice');
    }
}
