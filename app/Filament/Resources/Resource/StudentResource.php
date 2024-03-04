<?php

namespace App\Filament\Resources\Resource;

use App\Filament\Resources\Resource\StudentResource\Pages;
use App\Filament\Resources\Resource\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Add New Student')
                    ->schema([
                        Forms\Components\TextInput::make('nim')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Forms\Components\TextInput::make('name')
                            ->required(),

                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Forms\Components\TextInput::make('address')
                            ->required(),

                        Forms\Components\DatePicker::make('date_of_birth')
                            ->required(),

                        Forms\Components\TextInput::make('birthplace')
                            ->required(),

                        Forms\Components\TextInput::make('phone_number')
                            ->required(),

                        Forms\Components\Select::make('region')
                            ->options([
                                'Islam' => 'Islam',
                                'Kristen' => 'Kristen',
                                'Budha' => 'Budha',
                                'Katolik' => 'Katolik',
                            ]),

                        Forms\Components\Select::make('program_study')
                            ->options([
                                'Laboratory' => 'Laboratory',
                                'Diagnostic' => 'Diagnostic',
                                'Therapeutic' => 'Therapeutic',
                                'ICT' => 'ICT',
                                'Radiology' => 'Radiology',
                            ]),

                        Forms\Components\Select::make('semester')
                            ->options([
                                'SEM 1' => 'SEM 1',
                                'SEM 2' => 'SEM 2',
                                'SEM 3' => 'SEM 3',
                                'SEM 4' => 'SEM 4',
                                'SEM 5' => 'SEM 5',
                                'SEM 6' => 'SEM 6',
                                'SEM 7' => 'SEM 7',
                            ]),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('semester'),
                Tables\Columns\TextColumn::make('religion'),
                Tables\Columns\TextColumn::make('program_of_study'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
