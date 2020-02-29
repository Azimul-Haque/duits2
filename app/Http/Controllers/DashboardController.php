<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Adhocmember;
use App\Committee;
use App\Committeetype;
use App\User;
use App\Notice;
use App\Album;
use App\Albumphoto;
use App\Application;
use App\Blog;
use App\Category;
use App\Member;

use PDF;
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
        parent::__construct();
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
        $committees = Committee::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.committee')->withCommittees($committees);
    }

    public function storeCommittee(Request $request)
    {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'sometimes|email',
            'phone'                     => 'sometimes',
            'designation'               => 'required|max:255',
            'fb'                        => 'sometimes|max:255',
            'twitter'                   => 'sometimes|max:255',
            'linkedin'                  => 'sometimes|max:255',
            'committeetype_id'          => 'required',
            'serial'                    => 'required',
            'institution'               => 'sometimes',
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
            $filename   = random_string(6) .time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/images/committee/'. $filename);
            Image::make($image)->resize(400, 400)->save($location);
            $committee->image = $filename;
        }
        $committee->serial = $request->serial;
        $committee->institution = $request->institution;
        $committee->committeetype_id = $request->committeetype_id;
        $committee->save();
        
        Session::flash('success', 'Saved Successfully!');
        return redirect()->route('dashboard.committee');
    }

    public function updateCommittee(Request $request, $id) {
        $this->validate($request,array(
            'name'                      => 'required|max:255',
            'email'                     => 'sometimes|email',
            'phone'                     => 'sometimes',
            'designation'               => 'required|max:255',
            'fb'                        => 'sometimes|max:255',
            'twitter'                   => 'sometimes|max:255',
            'linkedin'                  => 'sometimes|max:255',
            'committeetype_id'          => 'required',
            'serial'                    => 'required',
            'institution'               => 'sometimes',
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
                $filename   = random_string(6) .time() .'.' . $image->getClientOriginalExtension();
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
        $committee->institution = $request->institution;
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

    public function getMembers()
    {
        $members = User::where('payment_status', 1)
                            ->where('role', 'admin')
                            ->get();
        return view('dashboard.members')->withMembers($members);
    }

    public function deleteMember($id)
    {
        //
    }

    public function getApplications()
    {
        $totalcollection = DB::table('applications')
                             ->select(DB::raw('SUM(amount) as totalamount'))
                             ->where('payment_status', 1)
                             ->first();
        $applications = Application::orderBy('id', 'desc')->paginate(10);

        return view('dashboard.applications')
                    ->withTotalcollection($totalcollection)
                    ->withApplications($applications);
    }

    public function getApplicationsPDF()
    {
        $applications = Application::orderBy('id', 'desc')->get();
        
        $pdf = PDF::loadView('dashboard.pdfapplications', ['applications' => $applications], [] ,['mode' => 'utf-8', 'format' => 'A4-L']);
        $fileName = 'IT_Fest_Participants_List.pdf';
        return $pdf->download($fileName);
    }

    public function approveApplication(Request $request, $id)
    {
        // $this->validate($request,array(
        //     'amount'    => 'required',
        //     'trxid'     => 'sometimes'
        // ));

        // $application = User::findOrFail($id);
        // $application->payment_status = 1;
        // $application->amount = $request->amount;
        // $application->trxid = $request->trxid;
        // $application->save();

        // Session::flash('success', 'Approved Successfully!');
        // return redirect()->route('dashboard.applications');
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

    public function getGallery()
    {
        $albums = Album::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.gallery.index')->withAlbums($albums);
    }

    public function getCreateGallery()
    {
        return view('dashboard.gallery.create');
    }

    public function storeGalleryAlbum(Request $request)
    {
        $this->validate($request,array(
            'name'          =>   'required',
            'description'   =>   'sometimes',
            'thumbnail'     =>   'required|image|max:500',
            'image1'        =>   'sometimes|image|max:500',
            'image2'        =>   'sometimes|image|max:500',
            'image3'        =>   'sometimes|image|max:500',
            'caption1'      =>   'sometimes',
            'caption2'      =>   'sometimes',
            'caption3'      =>   'sometimes'

        ));

        $album = new Album;
        $album->name = $request->name;
        $album->description = $request->description;

        // thumbnail upload
        if($request->hasFile('thumbnail')) {
            $thumbnail      = $request->file('thumbnail');
            $filename   = 'thumbnail_' . time() .'.' . $thumbnail->getClientOriginalExtension();
            $location   = public_path('/images/gallery/'. $filename);
            Image::make($thumbnail)->resize(1000, 625)->save($location);
            $album->thumbnail = $filename;
        }
        
        $album->save();

        // photo (s) upload
        for($i = 1; $i <= 3; $i++) {
            if($request->hasFile('image'.$i)) {
                $image      = $request->file('image'.$i);
                $filename   = 'photo_'. $i . time() .'.' . $image->getClientOriginalExtension();
                $location   = public_path('/images/gallery/'. $filename);
                Image::make($image)->resize(1000, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                        $constraint->upsize();
                                    })->save($location);
                $albumphoto = new Albumphoto;
                $albumphoto->album_id = $album->id;
                $albumphoto->image = $filename;
                $albumphoto->caption = $request->input('caption'.$i);
                $albumphoto->save();
            }
        }
        
        Session::flash('success', 'Album has been created successfully!');
        return redirect()->route('dashboard.gallery');
    }

    public function getEditGalleryAlbum($id) {
        $album = Album::find($id);
        return view('dashboard.gallery.edit')->withAlbum($album);
    }

    public function updateGalleryAlbum(Request $request, $id) {
        $this->validate($request,array(
            'name'          =>   'required',
            'description'   =>   'required',
            'image'         =>   'sometimes|image|max:500',
            'caption'       =>   'sometimes'
        ));

        $album = Album::find($id);
        $album->name =$request->name;
        $album->description =$request->description;
        $album->save();

        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $filename   = 'photo_'. time() .'.' . $image->getClientOriginalExtension();
            $location   = public_path('/images/gallery/'. $filename);
            Image::make($image)->resize(1000, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                })->save($location);
            $albumphoto = new Albumphoto;
            $albumphoto->album_id = $album->id;
            $albumphoto->image = $filename;
            $albumphoto->caption = $request->caption;
            $albumphoto->save();
        }

        Session::flash('success', 'Uploaded successfully!');
        return redirect()->route('dashboard.editgallery', $id);
    }

    public function deleteAlbum($id)
    {
        $album = Album::find($id);
        $thumbnail_path = public_path('images/gallery/'. $album->thumbnail);
        if(File::exists($thumbnail_path)) {
            File::delete($thumbnail_path);
        }
        if($album->albumphotoes->count() > 0) {
            foreach ($album->albumphotoes as $albumphoto) {
                $image_path = public_path('images/gallery/'. $albumphoto->image);
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
        }
        $album->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.gallery');
    }

    public function deleteSinglePhoto($id)
    {
        $albumphoto = Albumphoto::find($id);
        $image_path = public_path('images/gallery/'. $albumphoto->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $albumphoto->delete();
        
        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.editgallery', $albumphoto->album->id);
    }

    public function getRecruitmentApplications()
    {
        $applications = Member::orderBy('id', 'desc')->paginate(10);

        return view('dashboard.recruitment.applications')->withApplications($applications);
    }

    public function getRecruitmentApplicationPDF()
    {
        $applications = Member::orderBy('id', 'desc')->get();
        
        $pdf = PDF::loadView('dashboard.recruitment.pdf.allapplications', ['applications' => $applications], [] ,['mode' => 'utf-8', 'format' => 'A4-L']);
        $fileName = 'DUITS_Members_List.pdf';
        return $pdf->download($fileName);
    }

    public function getRecruitmentApplicationSiglePDF($id)
    {
        // $applications = Application::orderBy('id', 'desc')->get();
        
        // $pdf = PDF::loadView('dashboard.pdfapplications', ['applications' => $applications], [] ,['mode' => 'utf-8', 'format' => 'A4-L']);
        // $fileName = 'IT_Fest_Participants_List.pdf';
        // return $pdf->download($fileName);
    }

    public function approveRecruitmentApplication(Request $request, $id)
    {
        $application = Member::findOrFail($id);
        $application->status = 1;
        $application->save();

        Session::flash('success', 'Approved Successfully!');
        return redirect()->route('dashboard.recruitment.applications');
    }

    public function deleteRecruitmentApplication($id)
    {
        $committee = committee::find($id);
        $image_path = public_path('images/committee/adhoc/'. $committee->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $committee->delete();

        Session::flash('success', 'Deleted Successfully!');
        return redirect()->route('dashboard.committee');
    }

    public function getBlogs()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.blogs.index')->withBlogs($blogs);
    }
}
