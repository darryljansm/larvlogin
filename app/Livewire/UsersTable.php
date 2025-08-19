<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class UsersTable extends PowerGridComponent
{
    public string $tableName = 'users-table-l2ebgg-table';
    // Default sort column and direction
    public string $sortField = 'id';
    public string $sortDirection = 'desc';

    public function setUp(): array
    {
        return [
            PowerGrid::header()->showSearchInput(),
            PowerGrid::footer()->showPerPage()->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return User::query()
            ->select('users.*', 'creator.username as created_by_username')
            ->leftJoin('users as creator', 'creator.id', '=', 'users.created_by');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name', fn(User $user) => trim("{$user->last_name}, {$user->first_name}"))
            ->add('email')
            ->add('username')
            ->add('created_by_username', fn(User $user) => $user->creator?->username ?? '')
            ->add('created_at_formatted', fn(User $user) => Carbon::parse($user->created_at)->format('M d, Y g:iA'));
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Name', 'name')->sortable()->searchable(),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make('Username', 'username')->sortable()->searchable(),
            Column::make('Created by', 'created_by_username')->sortable()->searchable(),
            Column::make('Created at', 'created_at_formatted')->sortable(),
            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datetimepicker('created_at'),
        ];
    }

    public function actions(User $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600')
                ->route('admin.users.edit', ['user' => $row->id]),

            Button::add('delete')
                ->slot('Delete')
                ->class('bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600')
                ->dispatch('showDeleteConfirm', ['id' => $row->id]) // removed ->toBrowser()
        ];
    }

    #[\Livewire\Attributes\On('deleteUser')]
    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();

        $this->dispatch('deleted'); // triggers Livewire event 'deleted'
    }
}
