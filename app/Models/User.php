<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;
    protected $fillable = ['name','email','password','role'];
    protected $hidden   = ['password','remember_token'];

    // One-to-Many: 1 Petugas mencatat banyak Peminjaman
    public function peminjamans() {
        return $this->hasMany(Peminjaman::class);
    }

    public function isAdmin(): bool {
        return $this->role === 'admin';
    }
}