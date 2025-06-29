<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananResource\Pages;
use App\Filament\Resources\PesananResource\RelationManagers;
use App\Models\Pesanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PesananResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';
    protected static ?string $navigationGroup = 'Transaksi';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto_konfirmasi_222339')
                    ->label('Foto Konfirmasi')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('konfirmasi_pelanggan_222339')
                    ->label('Konfirmasi Pelanggan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('konfirmasi_driver_222339')
                    ->label('Konfirmasi Driver')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status_222339')
                    ->options([
                        'belum' => 'Belum Dibayar',
                        'sudah' => 'Sudah Dibayar',
                        'batal' => 'Dibatalkan',
                        'selesai' => 'Selesai',
                    ])
                    ->native(false)
                    ->label('Status')
                    ->required(),

                Forms\Components\Select::make('id_driver_222339')
                    ->relationship('driver', 'nama_222339')
                    ->label('Driver')
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('id_user_222339')
                    ->relationship('pelanggan', 'nama_222339')
                    ->label('User')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('kode_222339')
                    ->required()
                    ->maxLength(36),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_pesanan_222339')
                    ->label('ID Pesanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('konfirmasi_pelanggan_222339')
                    ->label('Konfirmasi Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('konfirmasi_driver_222339')
                    ->label('Konfirmasi Driver')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('status_222339')
                    ->options([
                        'belum' => 'Belum Dibayar',
                        'sudah' => 'Sudah Dibayar',
                        'batal' => 'Dibatalkan',
                        'selesai' => 'Selesai',
                    ])
                    ->label('Status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('id_driver_222339')
                    ->label('Id Driver')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_user_222339')
                    ->label('Id User')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_222339')
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
            'index' => Pages\ListPesanans::route('/'),
            'create' => Pages\CreatePesanan::route('/create'),
            'edit' => Pages\EditPesanan::route('/{record}/edit'),
        ];
    }
}
