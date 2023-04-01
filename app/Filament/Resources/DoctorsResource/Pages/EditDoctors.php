<?php

namespace App\Filament\Resources\DoctorsResource\Pages;

use App\Filament\Resources\DoctorsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDoctors extends EditRecord
{
    protected static string $resource = DoctorsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
