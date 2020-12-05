<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nik',
        'domisili',
        'nomor_hp',
        'jenis_kelamin',
        'riwayat_pendidikan',
        'quotes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Search query in multiple whereOr
     */
    public static function search($query)
    {
        return empty($query) ? static::query()->whereRole(1)
            : static::whereRole(1)->where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%');
            });

//            :static::where([
//                ['status', '=', '1'],
//                ['subscribed', '<>', '1'],
//            ])->get();
//        DB::table('users')->where([
//            ['role', '=', '4']
//        ])->get();
//        dd($cari);
    }

    public static function searchHrd($query)
    {
        return empty($query) ? static::query()->whereRole(2)
            : static::whereRole(2)->where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%');
            });

    }

    public static function searchRegular($query)
    {
        return empty($query) ? static::query()->whereRole(4)
            : static::whereRole(4)->where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%');
            });

    }

    public static function searchPremium($query)
    {
        return empty($query) ? static::query()->whereRole(3)
            : static::whereRole(3)->where(function ($q) use ($query) {
                $q->where('name', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%');
            });

    }
    public function tester()
    {
        return $this->hasOne('App\Models\Tester');
    }
}
