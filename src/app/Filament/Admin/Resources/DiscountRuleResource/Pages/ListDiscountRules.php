<?php

namespace App\Filament\Admin\Resources\DiscountRuleResource\Pages;

use App\Filament\Admin\Resources\DiscountRuleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiscountRules extends ListRecords
{
    protected static string $resource = DiscountRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
