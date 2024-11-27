<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = Manager::all();
        return view('admin.manager.index',compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manager.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Alert::error('عملیات ناموفق');

        $request -> validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email'=>'required|string|email|max:255|unique:managers,email',
            'mobile'=>'required|numeric',
            'password'=>['required','min:6','confirmed'],
            'level'=>['required'],
        ]);

        $manager = new Manager();
        $manager->first_name = $request->first_name;
        $manager->last_name = $request->last_name;
        $manager->email = $request->email;
        $manager->mobile = $request->mobile;
        $manager->password = Hash::make($request->password);
        $manager->level = $request->level;

        $manager->save();

        Alert::success('عملیات موفق.', 'مدیر جدید ثبت شد.');

        return redirect()->route('manager.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $manager = Manager::findOrFail(Auth::guard('admin')->user()->id);
        return view('admin.manager.edit',compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Alert::error('عملیات ناموفق');
        
        $manager = Manager::findOrfail(auth('admin')->id());
        
        $request -> validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'mobile' => ['required','numeric'],
            'email'=>'exclude_if:email,' . auth('admin')->user()->email . '|string|email|max:255|unique:managers,email,' . auth('admin')->id(),
            'password'=>['nullable','min:6','confirmed'],
        ]);

        //saving photo
        if($request->hasFile('profile_photo','name')){

            $manager = Manager::find(auth('admin')->id());
            $existing_photo = $manager->photos()->first();
            if($existing_photo){
                File::delete(public_path($existing_photo->src));
                $existing_photo->forceDelete();
            }
            
            $fileName = time().'_'.$request->profile_photo->getClientOriginalName();
            $filePath = $request->profile_photo->storeAs('managers_photos',$fileName,'public');
            $suffix_photo = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
            $photo = new Photo();
            $photo->name = $fileName;
            $photo->src = 'storage/'.$filePath;
            $photo->suffix = $suffix_photo;
            $photo->save();
 
            $photo->manager()->attach($manager, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }

        $manager->first_name = $request->first_name;
        $manager->last_name = $request->last_name;
        $manager->mobile = $request->mobile;
        $manager->email = $request->email;
        if ($request->filled('password')) {
            $manager->password = Hash::make($request->password);
        }
        $manager->save();

        Alert::success('عملیات موفق.', 'اطلاعات ویرایش شد.');

        return redirect()->route('admin-index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ChangeStatus(string $id)
    {
        $manager = Manager::findOrFail($id);

        switch ($manager->status) {
            case 'active':
                $status = 'banned';
                break;
            case 'inactive':
                $status = 'active';
                break;
            case'banned':
                $status = 'active';
                break;
            default:
                break;
        }

        $manager->status = $status;
        $manager->save();
    }

    public function ChangeLevel(string $id)
    {
        $manager = Manager::findOrFail($id);

        switch ($manager->level) {
            case 'manager':
                $level = 'operator';
                break;
            case 'operator':
                $level = 'manager';
                break;
            default:
                break;
        }

        $manager->level = $level;
        $manager->save();
    }

    public function resetPassword(Request $request, string $id)
    {
        $manager_id = $id;
        return view('admin.password.reset-password',compact('manager_id'));
    }

    public function Password(Request $request, string $id)
    {

        Alert::error('عملیات ناموفق');

        $request -> validate([
            'password'=>['nullable','min:6','confirmed'],
        ]);

        $manager = Manager::findOrfail($id);
        $manager->password = $request->password;

        Alert::success('عملیات موفق.', 'رمز ویرایش شد.');

        return redirect()->back();
    }

}
