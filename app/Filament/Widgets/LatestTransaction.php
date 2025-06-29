<?php

namespace App\Filament\Widgets;

use App\Models\Cart;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestTransaction extends BaseWidget
{
    protected int|string|array $columnSpan = 2;

    protected static ?string $pollingInterval = '10s';


    public function table(Table $table): Table
    {
        return $table
            ->query(
                // ...
                Cart::query()->latest()
            )
            ->columns([
                // ...
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
            ]);
    }
}
