<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PickupResource\Pages;
use App\Filament\Admin\Resources\PickupResource\RelationManagers;
use App\Models\Pickup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PickupResource extends Resource
{
    protected static ?string $model = Pickup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Logistics';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPickups::route('/'),
            'create' => Pages\CreatePickup::route('/create'),
            'edit' => Pages\EditPickup::route('/{record}/edit'),
        ];
    }
}
