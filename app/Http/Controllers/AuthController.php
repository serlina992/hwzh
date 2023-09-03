<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('Admin/Login');
    }

    public function register()
    {
        return view('Admin/Register');
    }

    public function ManageUsers()
    {
        $results = user::all();

        return view('Admin/ManageUsers', compact('results'));
    }

    public function UserProfile($user_id)
    {
        $user = user::where('user_id', $user_id)->first();

        return view('Admin/UserProfile', compact('user'));
    }

    public function NewUser()
    {
        $user = null;

        return view('Admin/UserProfile', compact('user'));
    }

    public function loginAction(Request $request)
    {
        $rules = [
            'userId' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $credentials = [
            'user_id' => $request->userId,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials, true))
        {
            if(Auth::user()->status_code != null && Auth::user()->status_code == '1')
            {
                // session()->put('currentUserSession', Auth::User(), true);


                return redirect('/');
                // return redirect()->back()->with(['success' => 'login Succees']);
            }
            else
            {
                $message = '';

                switch (Auth::user()->status_code){
                    case '0':{$message = "Your account has been blocked";}
                    case 'P':{$message = "Your account hasn't activated, please contact admininstrator";}
                }
                Auth::logout();

                return redirect()->back()->with(['fail' => $message]);
            }
        }
        else
        {
            $message = "Incorrect username or password";

            return redirect()->back()->with(['fail' => $message]);
        }
    }

    public function NewUserAction(Request $request)
    {
        $rules = [
            'userId' => 'required|unique:users,user_id',
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
            'fullName' => 'required',
            'classCode' => 'required|exists:learning_classes,class_code'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = new User();

        $user->user_id = $request->userId;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->full_name = $request->fullName;
        $user->class_code = $request->classCode;
        $user->role_code = 'STD';
        $user->status_code = '1';

        $user->save();

        return redirect()->route('ManageUsers')->with(['success' => 'Successfully Saved']);
    }

    public function EditUserAction(Request $request, $user_id)
    {
        $rules = [
            'email' => 'required|email:rfc,dns',
            'confirmPassword' => 'same:password',
            'fullName' => 'required',
            'classCode' => 'required|exists:learning_classes,class_code'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->password != '' && $request->password != null)
        {
            User::where('user_id', $user_id)
            ->update(['full_name' => $request->fullName, 'email' => $request->email, 'class_code' => $request->classCode , 'password' => bcrypt($request->password)]);
        }
        else{
            User::where('user_id', $user_id)
            ->update(['full_name' => $request->fullName, 'email' => $request->email, 'class_code' => $request->classCode]);
        }

        return redirect()->route('ManageUsers')->with(['success' => 'Successfully Saved']);
    }

    public function logoutAction()
    {
        if(Auth::check())
        {
            Auth::logout();
        }
        return redirect()->route('login');
    }

    public function DeleteUserAction($user_id)
    {
        $result = User::where('user_id', $user_id)->delete();

        if($result > 0)
            return redirect()->to('/manage-users')->with(['success' => 'User Deleted!']);
        else
            return redirect()->to('/manage-users')->with(['fail' => 'Delete User Failed!']);
    }
}
