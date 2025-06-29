<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?string $navigationGroup = 'Menu';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto_222339')
                    ->image()
                    ->label('Foto')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('nama_222339')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('deskripsi_222339')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('harga_222339')
                    ->label('Harga')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('stok_222339')
                    ->label('Stok')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('kategori')
                    ->relationship('kategori', 'kategori_222339')
                    ->native(false)
                    ->label('Kategori')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_222339')
                    ->label('Foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_menu_222339')
                    ->label('ID Menu')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_222339')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi_222339')
                    ->label('Deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_222339')
                    ->label('Harga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stok_222339')
                    ->label('Stok')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kategori.kategori_222339')
                    ->label('Kategori')
                    ->searchable(),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
