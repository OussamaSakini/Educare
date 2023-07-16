<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
//use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class UserController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // code to store a new user
    }
}
  /*public function add(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:users',
            'email'=>'required',
            'password'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()],409);
        }
        $p=new User();
        $p->name=$request->name;
        $p->email=$request->email;
        $p->password=$request->password;
        $p->save();
        return response()->json(['message'=>"User Successfully Added"]);

    }

    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()],409);
        }

        $user=User::where('email',$request->email)->get()->first();
        $password=$user->password;
        if($user && $password==$request->password){
            return response()->json(['user'=>$user]);
        }else{
            return response()->json(['error'=>'oops'],409);
        }
    }


    public function update(Request $request){
        $validator=Validator::make($request->all(),[
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()],409);
        }
        $p=User::find($request->id);
        $p->name=$request->name;
        $p->email=$request->email;
        $p->password=$request->password;
        $p->save();
        return response()->json(['message'=>"User Successfully Updated"]);
    }


    public function delete(Request $request){
        $validator=Validator::make($request->all(),[
            'id'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()],409);
        }
        $p=User::find($request->id)->delete();
        return response()->json(['message'=>"User Successfully Deleted"]);
    }

    public function show(Request $request){
        session(['keys'=>$request->keys]);
        $users=User::where(function ($q){
            $q->where('users.id','LIKE','%'.session('keys').'%')
            ->orwhere('users.name','LIKE','%'.session('keys').'%')
            ->orwhere('users.email','LIKE','%'.session('keys').'%')
            ->orwhere('users.password','LIKE','%'.session('keys').'%');
        })->select('users.*')->get();
        return response()->json(['users'=>$users]);
    }*/
