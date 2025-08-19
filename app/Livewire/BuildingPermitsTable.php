<?php

namespace App\Livewire;

use App\Models\EncodingBuildingPermit;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;


final class BuildingPermitsTable extends PowerGridComponent
{
    public string $tableName = 'building-permits-table';
    public string $sortField = 'id';
    public string $sortDirection = 'desc';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput()
                ->includeViewOnTop('components.export-button'), // your export button partial
            PowerGrid::footer()->showPerPage()->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return EncodingBuildingPermit::query()
            ->select('encoding_building_permit.*');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('application_number')
            ->add('building_permit_number')
            ->add('date_issued_formatted', fn(EncodingBuildingPermit $permit) =>
                $permit->date_issued ? Carbon::parse($permit->date_issued)->format('M d, Y') : ''
            )
            ->add('applicant_name')
            ->add('project_title')
            ->add('estimated_cost')
            ->add('created_at_formatted', fn(EncodingBuildingPermit $permit) =>
                $permit->created_at->format('M d, Y g:i A')
            );
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(true, 'desc'),
            Column::make('Application Number', 'application_number')->sortable()->searchable(),
            Column::make('Permit Number', 'building_permit_number')->sortable()->searchable(),
            Column::make('Date Issued', 'date_issued_formatted', 'date_issued')->sortable(),
            Column::make('Applicant Name', 'applicant_name')->sortable()->searchable(),
            Column::make('Project Title', 'project_title')->sortable()->searchable(),
            Column::make('Estimated Cost', 'estimated_cost')->sortable(),
            Column::make('Created At', 'created_at_formatted', 'created_at')->sortable(),
            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('date_issued'),
        ];
    }

    public function actions(EncodingBuildingPermit $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600')
                ->route('admin.building-permit.edit', ['building_permit' => $row->id]),

            Button::add('delete')
                ->slot('Delete')
                ->class('bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600')
                ->dispatch('showDeleteConfirm', ['id' => $row->id]),
        ];
    }

    #[\Livewire\Attributes\On('deleteBuildingPermit')]
    public function deleteBuildingPermit($id)
    {
        EncodingBuildingPermit::findOrFail($id)->delete();
        $this->dispatch('deleted');
    }


    public function exportToExcel()
    {
        $filters = $this->filters;

        $query = DB::table('encoding_building_permit');

        // Example: filter by date range
        if (!empty($filters['date']['date_issued']['start']) && !empty($filters['date']['date_issued']['end'])) {
            $start = date('Y-m-d H:i:s', strtotime($filters['date']['date_issued']['start']));
            $end   = date('Y-m-d H:i:s', strtotime($filters['date']['date_issued']['end']));
            $query->whereBetween('date_issued', [$start, $end]);
        }

        $rows = $query->get();

        // --- Spreadsheet export ---
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Headers
        $sheet->fromArray(['ID', 'Date Issued'], null, 'A1');

        // Rows
        $sheet->fromArray($rows->map(fn($row) => [
            $row->id,
            $row->date_issued,
        ])->toArray(), null, 'A2');

        $writer = new Xlsx($spreadsheet);
        $fileName = 'building_permits.xlsx';
        $filePath = storage_path($fileName);

        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

}
