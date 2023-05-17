<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Filament\Resources\EmployeeResource\Widgets\EmployeeStatsOverview;
use App\Models\Employee;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Department;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('country_id')->options(Country::all()->pluck('name', 'id'))->required(),
                        Select::make('state_id')->options(State::all()->pluck('name', 'id'))->required(),
                        Select::make('city_id')->options(City::all()->pluck('name', 'id'))->required(),
                        Select::make('department_id')->options(Department::all()->pluck('name', 'id'))->required(),
                        TextInput::make('name')->required()->string(),
                        TextInput::make('address')->required()->string(),
                        TextInput::make('zipcode')->required()->string(),
                        DateTimePicker::make('birth_date')->displayFormat('Y-m-d H:i:s')->required(),
                        DateTimePicker::make('date_hired')->displayFormat('Y-m-d H:i:s')->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('country_id')->sortable()->searchable(),
                TextColumn::make('state_id')->sortable()->searchable(),
                TextColumn::make('city_id')->sortable()->searchable(),
                TextColumn::make('department_id')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('address')->sortable()->searchable(),
                TextColumn::make('zipcode')->sortable()->searchable(),
                TextColumn::make('birth_date')->sortable()->searchable(),
                TextColumn::make('date_hired')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            EmployeeStatsOverview::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}
