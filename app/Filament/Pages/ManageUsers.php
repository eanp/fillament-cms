<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ManageRecords;

class ManageUsers extends ManageRecords
{
    protected static string $resource = User::class;

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('roles.name')
                ->formatStateUsing(fn ($state) => ucfirst($state))
                ->label('Role'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('role')
                ->options([
                    'admin' => 'Administrator',
                    'writer' => 'Writer',
                    'drafter' => 'Drafter',
                ])
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('role')
                ->options([
                    'admin' => 'Administrator',
                    'writer' => 'Writer',
                    'drafter' => 'Drafter',
                ])
                ->required()
                ->afterStateUpdated(function ($state, $record) {
                    if ($record) {
                        $record->syncRoles([$state]);
                    }
                }),
            Forms\Components\TextInput::make('password')
                ->password()
                ->required(fn ($record) => ! $record)
                ->minLength(8)
                ->same('passwordConfirmation'),
            Forms\Components\TextInput::make('passwordConfirmation')
                ->password()
                ->required(fn ($record) => ! $record)
                ->minLength(8),
        ];
    }
}
