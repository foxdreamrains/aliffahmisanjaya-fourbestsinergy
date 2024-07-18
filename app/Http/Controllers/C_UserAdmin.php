<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\User;
use App\Models\File;

use DB;

class C_UserAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $file = File::count();
        $user = User::all();
        return view('useradmin.dashboard', compact('file', 'user'));
    }

    ## User
    public function user()
    {
        $file = File::OrderByDesc('created_at')->get();
        return view('useradmin.user.user', compact('file'));
    }

    public function useradd()
    {
        $user = User::where('status', 'user')->get();
        return view('useradmin.user.user_add', compact('user'));
    }

    public function userstore(request $request)
    {
        $file_zip = $request->file('file_zip');
        $file_zips = time()."_".$file_zip->getClientOriginalName();
        $tujuan_upload = 'img/zip';
        $file_zip->move($tujuan_upload,$file_zips);

        $file_excel = $request->file('file_excel');
        $file_excels = time()."_".$file_excel->getClientOriginalName();
        $tujuan_upload = 'img/excel';
        $file_excel->move($tujuan_upload,$file_excels);

        File::create([
            'file_zip' => $file_zips,
            'file_excel' => $file_excels,
            'users_id' => $request->users_id,
        ]);

        return redirect('/CMS/user');
    }

    public function useredit($id)
    {
        $file = File::where('id_file', $id)->get();
        return view('useradmin.user.user_edit', compact('file'));
    }

    public function userupdate(request $request)
    {
        if($request->file('file_zip') == null){
            $file_zip = $request->file_zips;
        }
        else{
            $file_file_zip = $request->file('file_zip');
            $file_zip = time()."_".$file_file_zip->getClientOriginalName();
            $tujuan_upload = 'img/zip';
            $file_file_zip->move($tujuan_upload,$file_zip);
        }

        if($request->file('file_excel') == null){
            $file_excel = $request->file_excels;
        }
        else{
            $file_file_excel = $request->file('file_excel');
            $file_excel = time()."_".$file_file_excel->getClientOriginalName();
            $tujuan_upload = 'img/excel';
            $file_file_excel->move($tujuan_upload,$file_excel);
        }

        File::where('id_file', $request->id)->update([
            'file_zip' => $file_zip,
            'file_excel' => $file_excel,
            'users_id' => $request->users_id,
        ]);

        return redirect('/CMS/user');
    }

    public function userdelete($id)
    {
        File::where('id_file', $id)->delete();
        return redirect('/CMS/user');
    }
}
