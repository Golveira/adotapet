<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class PetTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public $userId;

    public bool $deferLoading = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        return [
            Header::make()
                ->showSearchInput(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Pet>
     */
    public function datasource(): Builder
    {

        return Pet::query()
            ->join('states', 'pets.state_id', '=', 'states.id')
            ->join('cities', 'pets.city_id', '=', 'cities.id')
            ->when($this->userId, function ($query) {
                return $query->where('user_id', $this->userId);
            })
            ->select([
                'pets.id',
                'pets.name',
                'pets.specie',
                'pets.sex',
                'pets.age',
                'pets.size',
                'pets.is_adopted',
                'pets.is_visible',
                'pets.created_at',
                'states.letter as state_letter',
                'cities.title as city_title',
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('specie', fn (Pet $model) => __($model->specie))
            ->addColumn('sex', fn (Pet $model) => __($model->sex))
            ->addColumn('age', fn (Pet $model) => __($model->age))
            ->addColumn('size', fn (Pet $model) => __($model->size))
            ->addColumn('state_letter')
            ->addColumn('city_title')
            ->addColumn('is_adopted')
            ->addColumn('is_visible')
            ->addColumn('created_at_formatted', fn (Pet $model) => Carbon::parse($model->created_at)->format('d/m/Y'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            Column::make(__('Name'), 'name')
                ->sortable()
                ->searchable(),

            Column::make(__('Specie'), 'specie')
                ->sortable()
                ->searchable(),

            Column::make(__('Sex'), 'sex')
                ->sortable()
                ->searchable(),

            Column::make(__('Age'), 'age')
                ->sortable()
                ->searchable(),

            Column::make(__('Size'), 'size')
                ->sortable()
                ->searchable(),

            Column::make(__('City'), 'city_title')
                ->sortable()
                ->searchable(),

            Column::make(__('State'), 'state_letter')
                ->sortable()
                ->searchable(),

            Column::make(__('Adopted'), 'is_adopted')
                ->toggleable(),

            Column::make(__('Visible'), 'is_visible')
                ->toggleable(),

            Column::make(__('Created at'), 'created_at_formatted', 'created_at')
                ->sortable(),
        ];
    }


    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),

            Filter::inputText('city_title', 'cities.title')
                ->operators(['contains']),

            Filter::inputText('state_letter', 'states.letter')
                ->operators(['contains']),

            Filter::select('specie', 'specie')
                ->dataSource(collect([
                    ['id' => 'dog', 'name' => __('Dog')],
                    ['id' => 'cat', 'name' => __('Cat')],
                ]))
                ->optionValue('id')
                ->optionLabel('name'),


            Filter::select('sex', 'sex')
                ->dataSource(collect([
                    ['id' => 'male', 'name' => __('Male')],
                    ['id' => 'female', 'name' => __('Female')],
                ]))
                ->optionValue('id')
                ->optionLabel('name'),

            Filter::select('age', 'age')
                ->dataSource(collect([
                    ['id' => 'puppy', 'name' => __('Puppy')],
                    ['id' => 'adult', 'name' => __('Adult')],
                    ['id' => 'senior', 'name' => __('Senior')],
                ]))
                ->optionValue('id')
                ->optionLabel('name'),

            Filter::select('size', 'size')
                ->dataSource(collect([
                    ['id' => 'small', 'name' => __('Small')],
                    ['id' => 'medium', 'name' => __('Medium')],
                    ['id' => 'large', 'name' => __('Large')],
                ]))
                ->optionValue('id')
                ->optionLabel('name'),


            Filter::boolean('is_adopted')->label(__('yes'), __('no')),
            Filter::boolean('is_visible')->label(__('yes'), __('no')),
            Filter::datetimepicker('created_at'),
        ];
    }

    public function header(): array
    {
        return [];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Pet Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::add('actions')
                ->bladeComponent('pets.actions', ['petId' => 'id']),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Pet Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($pet) => $pet->id === 1)
                ->hide(),
        ];
    }
    */

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        if ($field === 'is_adopted') {
            Pet::find($id)->update(['is_adopted' => $value]);

            return;
        }

        if ($field === 'is_visible') {
            Pet::find($id)->update(['is_visible' => $value]);

            return;
        }
    }
}
