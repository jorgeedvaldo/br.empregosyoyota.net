<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job; // Importe o modelo Job
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str; // Para o slug

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Jobs';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(255)
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->helperText('Used in post URL (eg: my-first-post)'),
                            ]),

                        Forms\Components\TextInput::make('company')
                            ->label('Company')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('location')
                            ->label('Location')
                            ->maxLength(255)
                            ->nullable(),

                        Forms\Components\RichEditor::make('content')
                            ->label('Content')
                            ->columnSpanFull()
                            ->required(),

                        Forms\Components\TextInput::make('apply')
                            ->label('Link para Candidatura')
                            //->url() // Valida como URL
                            ->maxLength(255)
                            ->nullable(),

                        Forms\Components\FileUpload::make('image')
                            ->label('Imagem/Logo da Vaga')
                            ->image()
                            ->directory('jobs/images')
                            ->columnSpanFull(),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Rascunho',
                                'published' => 'Publicado',
                            ])
                            ->required()
                            ->default('published')
                            ->native(false) // Deixa o select mais bonito
                            ->columnSpan(1), // Ocupa 1 coluna (se houver grid)

                        // Campo para relacionar com categorias (Many-to-Many)
                        Forms\Components\Select::make('categories')
                            ->label('Categorias')
                            ->relationship('categories', 'name') // 'categories' é o nome do método no Job model, 'name' é o campo a ser exibido
                            ->multiple() // Permite selecionar múltiplas categorias
                            ->preload() // Carrega todas as opções de categoria antecipadamente
                            ->searchable() // Permite pesquisar categorias
                            ->columnSpan(1),
                    ])->columns(2), // 2 colunas para o Card principal
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('company')
                    ->label('Empresa')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Localização')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('categories.name')
                    ->label('Categorias')
                    ->listWithLineBreaks() // Exibe as categorias em linhas separadas
                    ->toggleable(isToggledHiddenByDefault: true), // Esconde por padrão, mas pode ser ativado

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'info' => 'draft',
                        'success' => 'published',
                        'danger' => 'archived',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i') // Formato de data/hora
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Esconde por padrão

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Esconde por padrão
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Rascunho',
                        'published' => 'Publicado',
                        'archived' => 'Arquivado',
                    ]),
                // Adicione outros filtros aqui, se necessário (ex: por categoria)
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // Adiciona o botão de visualização
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
            // Se você quiser gerenciar as categorias de uma vaga a partir da página da vaga, adicione um RelationManager aqui.
            // Ex: RelationManagers\CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            //'view' => Pages\ViewJob::route('/{record}'), // Adiciona a página de visualização
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'company', 'location']; // Campos que podem ser pesquisados globalmente no Filament
    }

    // Opcional: Para ordenar por um campo diferente de 'id' nas rotas, se você usar slugs.
    // protected static string $recordTitleAttribute = 'slug';
}
