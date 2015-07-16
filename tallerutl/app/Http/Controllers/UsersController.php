<?php namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller {

	public function getOrm(){
		//$user = User::first();
		//dd($user->profile->age);

		//Todos los usuarios
		//$users = User::get();
		//dd($users);

		//Trae todos los usuario excepto el admin
		$users = User::select('id','first_name')
		->with('profile')
		->where('first_name','<>','Admin')
		->orderBy('first_name','ASC')
		->get();
		dd($users->toArray());
	}

	public function getIndex(){

		//Obtiene todo valores
		$result = \DB::table('users')->get();

		//Realizar un select a ciertos campos
		$result = \DB::table('users')
		->select(['first_name','last_name'])
		->get();

		//Realizar un select con un where
		// where  (campo,operacion,valor)

		$result = \DB::table('users')
		->select(['first_name','last_name'])
		->where('first_name','<>','Admin')
		->get();

		//Realizar un select con un orderBY ASC
		// order  (campo,tipo)

		$result = \DB::table('users')
		->select(['first_name','last_name'])
		->where('first_name','<>','Admin')
		->orderBy('first_name','ASC')
		->get();

		//Realizar un select con un join 
		//join (tablajoin,tabla1.campo_id,'=',table2.campo_id)
		// Al comentar el select se encuentran diferentes ids

		$result = \DB::table('users')
		//->select(['first_name','last_name'])
		->where('first_name','<>','Admin')
		->orderBy('first_name','ASC')
		->join('user_profiles','users.id','=','user_profiles.user_id')
		->get();

		//Delimitar la consulta con el join para no tener errores de ids

		$result = \DB::table('users')
		->select('users.id','first_name',
				 'last_name','user_profiles.id as profiles_id')
		->where('first_name','<>','Admin')
		->orderBy('first_name','ASC')
		->join('user_profiles','users.id','=','user_profiles.user_id')
		->get();

		//Obetener todos los campos de una table y de otra ciertos campos

		$result = \DB::table('users')
		->select('users.*',
				 'user_profiles.id as profiles_id_table',
				 'user_profiles.user_id as user_relation',
				 'user_profiles.twitter'
				 )
		->where('first_name','<>','Admin')
		->orderBy('first_name','ASC')
		->join('user_profiles','users.id','=','user_profiles.user_id')
		->get();

		//Incluir a los usuarios que no tiene perfil (administrador)
		$result = \DB::table('users')
		->select('users.*',
				 'user_profiles.id as profiles_id_table',
				 'user_profiles.user_id as user_relation',
				 'user_profiles.twitter'
				 )
		->orderBy('first_name','ASC')
		->leftJoin('user_profiles','users.id','=','user_profiles.user_id')
		->get();


		//Muestra contraida la informacion
		dd($result);

		return $result;
	}
}
