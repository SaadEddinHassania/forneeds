<?php

namespace App\DataTables;

use App\Models\User;
use App\Repositories\UserRepository;
use Form;
use Yajra\Datatables\Services\DataTable;
use Yajra\Datatables\Datatables;
use Illuminate\Contracts\View\Factory;

class UserDataTable extends DataTable
{

    private $userRepository;

    public function __construct(Datatables $datatables, Factory $viewFactory, UserRepository $userRepo)
    {
        parent::__construct($datatables, $viewFactory);
        $this->userRepository = $userRepo;


    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'layouts.datatables_actions')
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
                        'extend' => 'collection',
                        'text' => '<i class="fa fa-download"></i> Export',
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
            'deleted_at' => ['name' => 'deleted_at', 'data' => 'deleted_at'],
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
