<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CartResource\Pages;
use App\Filament\Resources\CartResource\RelationManagers;
use App\Models\Cart;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CartResource extends Resource
{
    protected static ?string $model = Cart::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?string $navigationLabel = 'Cart';


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_222339')
                    ->label('Kode')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_222339')
                    ->label('Jumlah')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total_222339')
                    ->label('Total')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status_222339')
                    ->label('Status')
                    ->options([
                        'belum' => 'Belum Dibayar',
                        'sudah' => 'Sudah Dibayar',
                        'batal' => 'Dibatalkan',
                        'selesai' => 'Selesai',
                    ])
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggal_222339')
                    ->label('Tanggal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('id_menu_222339')
                    ->relationship('menu', 'nama_222339')
                    ->required()
                    ->maxLength(36),
                Forms\Components\Select::make('id_user_222339')
                    ->relationship('user', 'nama_222339')
                    ->required()
                    ->maxLength(36),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_carts_222339')
                    ->label('ID cart')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_222339')
                    ->label('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_222339')
                    ->label('Jumlah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_222339')
                    ->label('Total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status_222339')
                    ->label('Status')
                    ->options([
                        'belum' => 'Belum Dibayar',
                        'sudah' => 'Sudah Dibayar',
                        'batal' => 'Dibatalkan',
                        'selesai' => 'Selesai',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_222339')
                    ->label('Tanggal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('id_menu_222339')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_user_222339')
                    ->label('ID User')
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
            'index' => Pages\ListCarts::route('/'),
            'create' => Pages\CreateCart::route('/create'),
            'edit' => Pages\EditCart::route('/{record}/edit'),
        ];
    }
}
