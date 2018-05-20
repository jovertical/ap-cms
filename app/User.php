<?php

namespace App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    use Notifiable;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        $user = auth()->check() ? auth()->user() : null;

        self::creating(function ($model) use ($user) {
            if (Schema::hasColumn($model->getTable(), 'slug')) {
                $model->slug = create_slug();
            }

            if ($user != null) {
                if (Schema::hasColumn($model->getTable(), 'created_by')) {
                    $model->created_by = $user->id;
                }
            }
        });

        self::updating(function($model) use ($user) {
            if ($user != null) {
                if (Schema::hasColumn($model->getTable(), 'updated_by')) {
                    $model->updated_by = $user->id;
                }
            }
        });

        self::deleting(function($model) use ($user) {
            if ($user != null) {
                if (Schema::hasColumn($model->getTable(), 'deleted_by')) {
                    $model->deleted_by = $user->id;
                }
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getEnvironmentAttribute()
    {
        switch (strtolower($this->type)) {
            case 'superuser':
                    $environment = 'root';
                break;

            case 'user':
                    $environment = 'front';
                break;
        }

        return $environment;
    }

    public function getEnvironmentAliasAttribute()
    {
        switch (strtolower($this->environment)) {
            case 'root':
                    $alias = 'staff';
                break;

            case 'front':
                    $alias = 'customer';
                break;
        }

        return ucfirst($alias);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setMiddleNameAttribute($value)
    {
        $this->attributes['middle_name'] = strtolower($value);
    }

    public function getMiddleNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtolower($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getTitledFullNameAttribute()
    {
        return "{$this->title} {$this->first_name} {$this->last_name}";
    }

    public function getTitleAttribute($value)
    {
        if ($this->attributes['gender'] != null) {
            return $this->attributes['gender'] == 'male' ? 'Sir' : "Ma'am";
        }

        return;
    }

    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = strtolower($value);
    }

    public function getGenderAttribute($value)
    {
        return ucfirst($value);
    }
}
