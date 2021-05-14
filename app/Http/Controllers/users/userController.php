<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use App\User;
use DB;
use App\Notifications\Notifys;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $users = User::where('status',1)->get();
        $roles = Role::get();
        return view('users.index',compact('users','roles'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'roles' => ['required'],
        ]);
            
        $user=User::create($request->all());

        $user->update([
            'state' => 1,
            'password' => bcrypt($request->password),
            'token' => Str::random(15)
        ]);

        $user->assignRole($request->roles);

        $users = User::where('status',1)->get();
        foreach ($users as $use) {
            if ($use->hasPermissionTo('Ver lista de usuarios')) {
                $use->notify(new Notifys($user->id,'Nuevo usuario '.$user->id,'users'));
            }
        }

        return redirect()->route('users')->with('success','El usuario ha sido creado correctamente');
    }
    public function update(Request $request, User $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id->id],
            'roles' => ['required'],
        ]);

        if ($request->email != $id->email) {
            $id->update([ 'email_verified_at' => null ]);
        }

        $id->update($request->all());

        // Notification
        DB::table('model_has_roles')->where('model_id',$id->id)->delete();

        $id->assignRole($request->roles);

        return redirect()->route('users')->with('success','El usuario ha sido editado correctamente');
        
    }

    public function delete(Request $request,User $id)
    {
        $id->update(['status' => 0]);
        return redirect()->route('users')->with('success','El usuario ha sido eliminado correctamente');
    }

    public function search(Request $request){
        $roles = Role::get();
        if ($request->name == 'delete_users') {
            $users= User::where('status',0)->orderBy('id')->get();
        }else {
            $users= User::orwhere('users.name','like','%'.$request->name.'%')
                ->orWhere('users.email','like','%'.$request->name.'%')
                ->get();
        }
        if (empty($request->name)){
            $users = User::where('status',1)->orderBy('id')->latest()->paginate(5);
        }
        return view('users.includes.table',compact('users','roles'));
    }
}
