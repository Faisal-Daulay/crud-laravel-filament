<?php

namespace App\Filament\Resources\Resource\StudentResource\Pages;

use App\Filament\Resources\Resource\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;
}
