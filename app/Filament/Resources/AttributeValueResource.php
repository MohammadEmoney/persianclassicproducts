<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttributeValueResource\Pages;
use App\Filament\Resources\AttributeValueResource\RelationManagers;
use App\Models\AttributeValue;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AttributeValueResource extends Resource
{
    protected static ?string $model = AttributeValue::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->label('Name')->unique(ignoreRecord:true)->required()->reactive()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')->unique(ignoreRecord:true)->label('Slug'),
                    TextInput::make('names.fa')->label('Farsi')->required(),
                    TextInput::make('names.it')->label('Italian')->required(),
                    Select::make('attribute_type_id')->relationship('attributeType', 'name')->label('Attribute Type')->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                   ->label('English Name')
                   ->searchable()
                   ->sortable(),
                TextColumn::make('names.fa')
                    ->label(__('Persian Name'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('names->fa', 'like', "%{$search}%");
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query
                            ->orderBy('names->fa', $direction);
                    }),
                TextColumn::make('names.it')
                    ->label(__('Italian Name'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('names->it', 'like', "%{$search}%");
                    })
                    ->sortable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('names->it', 'like', "%{$search}%");
                    }),
                TextColumn::make('attributeType.name')
                    ->label(__('Attribute Type'))
                    ->searchable()
                    ->sortable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttributeValues::route('/'),
            'create' => Pages\CreateAttributeValue::route('/create'),
            'edit' => Pages\EditAttributeValue::route('/{record}/edit'),
        ];
    }
}
