<?php

namespace App\DataTables;

use App\Models\User;
use Form;
use Yajra\Datatables\Services\DataTable;

class UserDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'users.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = User::query();

        return $this->applyScopes($users);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'create',
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ]
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'name' => ['name' => 'name', 'data' => 'name'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'password' => ['name' => 'password', 'data' => 'password'],
            'mobile' => ['name' => 'mobile', 'data' => 'mobile'],
            'avatar' => ['name' => 'avatar', 'data' => 'avatar'],
            'dob' => ['name' => 'dob', 'data' => 'dob'],
            'location_meta_id' => ['name' => 'location_meta_id', 'data' => 'location_meta_id'],
            'facebook_token' => ['name' => 'facebook_token', 'data' => 'facebook_token'],
            'facebook_id' => ['name' => 'facebook_id', 'data' => 'facebook_id'],
            'google_token' => ['name' => 'google_token', 'data' => 'google_token'],
            'google_id' => ['name' => 'google_id', 'data' => 'google_id'],
            'national_id' => ['name' => 'national_id', 'data' => 'national_id'],
            'verified' => ['name' => 'verified', 'data' => 'verified'],
            'is_sp' => ['name' => 'is_sp', 'data' => 'is_sp'],
            'is_ready' => ['name' => 'is_ready', 'data' => 'is_ready'],
            'token' => ['name' => 'token', 'data' => 'token'],
            'api_token' => ['name' => 'api_token', 'data' => 'api_token'],
            'remember_token' => ['name' => 'remember_token', 'data' => 'remember_token'],
            'created_at' => ['name' => 'created_at', 'data' => 'created_at'],
            'updated_at' => ['name' => 'updated_at', 'data' => 'updated_at']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users';
    }
}
