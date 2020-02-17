<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin(){

        $users = User::all();
        return view('admin.admin')->withUsers($users) ;
    }
    public function newCategory(Request $request){
        try {
            $category = Category::updateOrCreate(
                ['id' => $request->id],
                $request->all()
            );
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('admin.categories' );

    }

    public function users(){
        $profiles =Profile::all();
        $users = User::all();
        return view('admin.users')->withUsers($users)->withProfiles($profiles);
    }

    public function categories(){

        $categories = Category::all();

        return view('admin.categories')->withCategories($categories) ;
    }

    public function profile($id){
        Auth::user()->id;
        $user = User::find($id);
        $profile = Profile::where('user_id', '=', $user->id)->firstOrFail();
        $categories = Category::all();

        $today = date("Y-m-d");
        $diff = date_diff(date_create($user->bday), date_create($today));
        $profile['age']=$diff->format('%y');

        if($user->id === Auth::user()->id){
            return view('user.profile')->withUser($user)->withProfile($profile)->withCategories($categories);
        }

        else{
             return redirect()->back();
        }

    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
    public function deleteOne($folder = null, $disk = 'public', $filename = null)
    {
        Storage::disk($disk)->delete($folder.$filename);
    }
    public function upload(Request  $request){
     $uploadedFile = $request->file('image');
     $filename = time().$uploadedFile->getClientOriginalName();

     Storage::disk('local')->putFileAs(
       'uploads/',
       $uploadedFile,
       $filename
     );



     return response()->json(['success'=>'You have successfully uploaded a file '.$filename]);

    }

    public function store(Request $request)
    {
        if($request->ajax()) {
            $profileData =$request->all();
            $uploadedFiles = $request->file('image');
            $user =Auth::user();
            $id=$user->id;
            $profile =Profile::findOrFail($id);


            $fileNames=$profile->image;
            foreach ($uploadedFiles as &$uploadedFile) {
                $i=0;

                $fileNameNew=  preg_replace("/[^a-z0-9\_\-\.]/i", '', basename($uploadedFile->getClientOriginalName()));
                $filename = time().$fileNameNew;
                Storage::disk('public')->putFileAs(
                  'profile',
                  $uploadedFile,
                  $filename
                );
               // $route= storage_path($url);
                $usrImage=$filename;
                $fileNames=$fileNames.'--'. $filename;
                $i++;
            }
            $profileData =$request->all();
            unset($profileData['user-id']);

            $today = date("Y-m-d");
            $diff = date_diff(date_create(Auth::user()->bday), date_create($today));

            $profileData['age']=$diff->format('%y');
            $profileData['image']=$fileNames;

            $profile = Profile::updateOrCreate(
                ['id' => $request->id],
                $profileData
            );

            $profile->save();
            $user->foto =$usrImage;
            $user->save();
            return response()->json(['success'=>'You have successfully created a profile']);

        }
    }
    public function edit($id){
        $user = User::find($id);
        if($user){
            return view('user.profile')->withUser($user);
        }
        else{
             return redirect()->back();
        }
    }
    public function update(){

    }
    public function passwordEdit(){
        $user = Auth::user();
        if($user){
            return view('user.profile')->withUser($user);
        }
        else{
             return redirect()->back();
        }
    }
    public function passwordUpdate(){}
}
