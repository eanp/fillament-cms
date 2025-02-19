<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms;
use Filament\Pages\Auth\Login as BaseLogin;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;

class Login extends BaseLogin
{
    use WithRateLimiting;

    protected function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->schema([
                    Forms\Components\TextInput::make('email')
                        ->label('Email address')
                        ->email()
                        ->required(),
                    Forms\Components\TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->required(),
                    Forms\Components\Checkbox::make('remember')
                        ->label('Remember me'),
                ])
                ->statePath('data'),
        ];
    }
}
