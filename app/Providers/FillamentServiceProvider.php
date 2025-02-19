<?php
namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::serving(function () {
            if (auth()->check()) {
                // Content Management Group
                Filament::registerNavigationGroups([
                    NavigationGroup::make()
                        ->label('Content Management')
                        ->icon('heroicon-o-document-text'),
                    NavigationGroup::make()
                        ->label('System')
                        ->icon('heroicon-o-cog'),
                ]);

                // Posts Navigation
                if (auth()->user()->hasAnyRole(['Admin', 'Writer', 'Drafter'])) {
                    Filament::registerNavigationItems([
                        NavigationItem::make('Posts')
                            ->icon('heroicon-o-document-text')
                            ->group('Content Management')
                            ->url(route('filament.resources.posts.index'))
                            ->activeRule('posts*')
                            ->sort(1),
                    ]);
                }

                // Categories Navigation - Admin and Writer only
                if (auth()->user()->hasAnyRole(['Admin', 'Writer'])) {
                    Filament::registerNavigationItems([
                        NavigationItem::make('Categories')
                            ->icon('heroicon-o-collection')
                            ->group('Content Management')
                            ->url(route('filament.resources.categories.index'))
                            ->activeRule('categories*')
                            ->sort(2),
                    ]);
                }

                // Media Navigation
                if (auth()->user()->hasAnyRole(['Admin', 'Writer'])) {
                    Filament::registerNavigationItems([
                        NavigationItem::make('Media')
                            ->icon('heroicon-o-photograph')
                            ->group('Content Management')
                            ->url(route('filament.resources.media.index'))
                            ->activeRule('media*')
                            ->sort(3),
                    ]);
                }

                // Users Navigation - Admin only
                if (auth()->user()->hasRole('Admin')) {
                    Filament::registerNavigationItems([
                        NavigationItem::make('Users')
                            ->icon('heroicon-o-users')
                            ->group('System')
                            ->url(route('filament.resources.users.index'))
                            ->activeRule('users*')
                            ->sort(4),
                    ]);
                }
            }
        });
    }
}
