<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class post extends Model
{
     protected $fillable = [
        'postdescription', 'user_id',
    ];
     
     
     public function getAllPosts($user_id){
         
         $postArr = [];
         $friends = DB::table('friends')->where('user_id',$user_id)->get();
         foreach($friends as $friend){
            $postArr = DB::table('posts')->where('user_id',$friend->id)->get()->toArray();
         }
         return $postArr;
     }


     
     public function createPost($data,$user_id){
         if(DB::table('posts')->insert(['postdescription'=>$data['post'],'user_id'=>$user_id])){
             
             return TRUE;
         }
     }
}
