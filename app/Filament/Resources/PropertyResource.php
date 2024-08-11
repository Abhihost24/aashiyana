<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('thumb')
                    ->label('Property Front Images')
                    ->image()
                    ->required(),
                
                TextInput::make('title')->required(),
                Select::make('purpose')
                ->options([
                    'sell'=>'Sell',
                    'rented'=>'Rent',
                    'lease'=>'Lease',

                ])->required(),
                Select::make('property_type')
                ->options([
                    'building'=>'Independent Building',
                    'flat'=>'Flat',
                    'villa'=>'Villa',
                    'other'=>'Others',

                ])->required(),
                TextInput::make('residential')->required(),
                Select::make('bhk_type')->label('Bhk')
                ->options([
                    '1'=>'1 Bhk',
                    '2'=>'2 Bhk',
                    '3'=>'3 Bhk',
                    '4'=>'4 Bhk',
                    '4+'=>'4 Bhk +',

                ])->required(),
                TextInput::make('plot_area')->numeric()->required(),
                TextInput::make('built_up_area')->numeric()->required(),
                TextInput::make('facing')->nullable(),
                TextInput::make('total_floor')->numeric()->required(),
                TextInput::make('sprice')->numeric()->required(),
                TextInput::make('cprice')->numeric()->required(),
                TextInput::make('fprice')->numeric()->required(),
                Select::make('furniture_type')
                ->options([
                    'unfurnished'=>'Unfurnished',
                    'semifurnished'=>'Semi Furnished',
                    'fullyfurnished'=>'Fully Furnished',
                    'other'=>'Other',
                

                ])->required(),
                Select::make('parking')
                    ->options([
                        '1' => 'Yes',
                        '0' => 'No',
                    ])->required(),
                TextInput::make('bathroom')->numeric()->required(),
                TextInput::make('balcony')->numeric()->required(),
                Select::make('gated_security')
                    ->options([
                        '1' => 'Yes',
                        '0' => 'No',
                    ])->required(),
                Select::make('water_supply')
                    ->options([
                        '1' => 'Yes',
                        '0' => 'No',
                    ])->required(),
                Select::make('power_backup')
                    ->options([
                        '1' => 'Yes',
                        '0' => 'No',
                    ])->required(),
                Select::make('amenities')
                    ->options([
                        'electricity' => 'Electricity',
                        'drainage' => 'Drainage',
                        'sewage' => 'Sewage',
                        'security' => '24/7 Security',
                        'waterconnection' => 'Water Connection',
                        'cctvcamera' => 'CCTV Camera',
                        'clubhouse' => 'Club House',
                        'swimmingpool' => 'Swimming Pool',
                        'park' => 'Park',
                        'childrenplayarea' => 'Children Play Area',
                        'atm' => 'ATM',
                        'wideroads' => 'Wide Roads',
                        'gym' => 'Gym',
                    ])
                    ->multiple()
                    ->required(),
                TextInput::make('locality')->required(),
                TextInput::make('landmark')->nullable(),
                TextInput::make('city')->required(),
                Forms\Components\Toggle::make('is_featuredproperty')
                    ->label(' Featured Property')
                    ->required(),
                Forms\Components\Toggle::make('is_premiumtag')
                    ->label('Premium Tag')
                    ->required(),
                Forms\Components\Toggle::make('is_Sold')
                    ->label('Sold')
                    ->required(),
                Forms\Components\Toggle::make('is_Active')
                    ->label('Publish')
                    ->required(),
                Repeater::make('photos')
                    ->label('Property Images')
                    ->schema([
                        FileUpload::make('photo')
                            ->label('Uplod Multiple Images')
                            ->directory('admin/properties/imgs')
                            ->image()
                            ->required(),
                    ])
                    ->columnSpan('full')
                    ->required(),
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
