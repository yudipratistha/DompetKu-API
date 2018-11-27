<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class UserController extends Controller {
      public $successStatus = 200;
      
      public function index(){
        return User::all();
    }
      /**
           * login api
           *
           * @return \Illuminate\Http\Response
           */
          public function login(){
              if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
                  $user = Auth::user();
                  $success['token'] =  $user->createToken('MyApp')-> accessToken;
                  return response()->json(['success' => $success, 'status' => true, 'dataPengguna' => $user], $this-> successStatus);
              }
              else{
                  return response()->json(['error'=>'Unauthorised'], 401);
              }
          }
      /**
           * Register api
           *
           * @return \Illuminate\Http\Response
           */
          public function register(Request $request){
              $validator = Validator::make($request->all(), [
                  'name' => 'required',
                  'email' => 'required|email|unique:users',
                  'password' => 'required',
                  'c_password' => 'required|same:password',
              ]);
              if ($validator->fails()) {
                          return response()->json(['error'=>$validator->errors()], 401);
                      }
              $input = $request->all();
                      $input['password'] = bcrypt($input['password']);
                      $user = User::create($input);
                      $success['token'] =  $user->createToken('MyApp')-> accessToken;
                      $success['name'] =  $user->name;
              return response()->json($user);//response()->json(['success'=>$success], $this-> successStatus);
          }

          public function update(request $request, $id){
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $password = $request->password;
            $username = $request->username;
            
            $user = User::find($id);
            $user->name = $name;
            $user->email = $email;
            $user->phone = $phone;
            $user->password = $password;
            $user->username = $username;
            $user->save();
            return "Data berhasil di update";
        }

        public function logout(request $request){
            if(Auth::check()){
                Auth::user()->AauthAccessToken()->delete();
                return "Logout berhasil";
            }
        }

        /**
         * details api
         *
         * @return \Illuminate\Http\Response
         */
          public function details(){
              $user = Auth::user();
              return response()->json(['success' => $user], $this-> successStatus);
          }
}
