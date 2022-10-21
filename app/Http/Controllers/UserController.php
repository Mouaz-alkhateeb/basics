<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\ImportUser;
use App\Imports\UsersImport;
use App\Jobs\ActiveUser;
use App\Jobs\SendEmailToUsers;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users_id = User::where('status', 1)->pluck('id');
    //     ActiveUser::dispatch($users_id);
    //     return 'users updated succesfully...!';
    // }
    public function email()
    {
        // $data = [
        //     'mouaz@gmail.com', 'gamal@gmail.com',
        // ];
        $data = User::all();
        SendEmailToUsers::dispatch($data);
        return "email send succesfully";
    }
    public function all()
    {
        $users = User::all();
        //dd($users);
        return view('users.users', compact('users'));
    }
    public function pdf()
    {
        // $users = User::get();
        // $data = ['users' => $users];
        // $pdf = PDF::loadView('users.users', $data);
        // return $pdf->download('users.pdf');
        $users = User::all();
        $pdf = PDF::loadView('users.users2', compact('users'));
        return $pdf->download('users.pdf');
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function import(Request $request)
    {
        Excel::import(
            new ImportUser,
            $request->file('file')->store('files')
        );
        return redirect()->back();
    }
}
