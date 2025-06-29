<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Lainnya';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto_222339')
                    ->label('Foto')
                    ->avatar(),
                Forms\Components\TextInput::make('nama_222339')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat_222339')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('hp_222339')
                    ->label('Hp')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('role_222339')
                    ->options([
                        'driver' => 'Driver',
                        'user' => 'User',
                    ])
                    ->native(false)
                    ->label('Role')
                    ->required(),
                Forms\Components\TextInput::make('username_222339')
                    ->label('Username')
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_222339')
                    ->circular()
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('id_user_222339')
                    ->label('ID User')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_222339')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_222339')
                    ->label('Alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hp_222339')
                    ->label('Hp')
                    ->searchable(),

                Tables\Columns\SelectColumn::make('role_222339')
                    ->options([
                        'driver' => 'Driver',
                        'user' => 'User',
                    ])
                    // ->native(false)
                    ->label('Role')
                    ->searchable(),
                Tables\Columns\TextColumn::make('username_222339')
                    ->label('Username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
