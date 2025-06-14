<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser; // Impor ini (jika menggunakan Filament)
use Filament\Panel; // Impor ini (jika menggunakan Filament)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Pastikan baris ini ada

class User extends Authenticatable implements FilamentUser // Implementasikan FilamentUser (jika menggunakan Filament)
{
    use HasFactory, Notifiable, HasApiTokens; // Pastikan 'HasApiTokens' ada di sini

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Memungkinkan atau melarang akses ke panel admin Filament.
     * Metode ini diperlukan jika Anda mengimplementasikan FilamentUser.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true; // Untuk pengembangan, izinkan semua user terautentikasi
    }
}
