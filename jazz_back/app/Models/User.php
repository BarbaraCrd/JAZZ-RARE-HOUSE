<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
// sanctum
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'pseudo',
        'email',
        'password',
        'uRole',
        'avatar',
        'numero',
        'rue',
        'codepostal',
        'ville'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUsers()
    {

        $users = DB::table('users')
            ->leftjoin('notes', 'users.id', '=', 'notes.user_id')
            ->select(
                'users.id',
                'users.firstName',
                'users.lastName',
                'users.pseudo',
                'users.email',
                'users.password',
                'users.uRole',
                'users.avatar',
                'users.numero',
                'users.rue',
                'users.codepostal',
                'users.ville',
                'notes.user_id',
                'notes.nb_votes',
                'notes.avg_notes',
                'notes.total_notes',
            )
            ->get();

        return $users;
    }

    public static function getUsersById($id)
    {
        $users = DB::table('users')
            ->leftjoin('notes', 'users.id', '=', 'notes.user_id')
            ->select(
                'users.id',
                'users.firstName',
                'users.lastName',
                'users.pseudo',
                'users.email',
                'users.password',
                'users.uRole',
                'users.avatar',
                'users.numero',
                'users.rue',
                'users.codepostal',
                'users.ville',
                'notes.user_id',
                'notes.nb_votes',
                'notes.avg_notes',
                'notes.total_notes',
            )
            ->where('users.id', '=', $id)
            ->get();
        return $users;
    }
}
