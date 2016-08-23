<?php

namespace App\Http\Controllers;

use App\DataTables\ConfigDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use App\Repositories\ConfigRepository;
use App\Repositories\UserRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class ConfigController extends AppBaseController
{
    /** @var  ConfigRepository */
    private $configsRepository;

    /** @var  ConfigRepository */
    private $userRepository;

    public function __construct(ConfigRepository $configsRepo,UserRepository $userRepo)
    {
        $this->configsRepository = $configsRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Config.
     *
     * @param ConfigDataTable $configsDataTable
     * @return Response
     */
    public function index(ConfigDataTable $configsDataTable)
    {
        return $configsDataTable->render('configs.index');
    }

    /**
     * Show the form for creating a new Config.
     *
     * @return Response
     */
    public function create()
    {
        return view('configs.create',array("user_attrs"=>$this->userRepository->getFieldsSearchable()));
    }

    /**
     * Store a newly created Config in storage.
     *
     * @param CreateConfigRequest $request
     *
     * @return Response
     */
    public function store(CreateConfigRequest $request)
    {
        $input = $request->all();

        $configs = $this->configsRepository->create($input);

        Flash::success('Config saved successfully.');

        return redirect(route('configs.index'));
    }

    /**
     * Display the specified Config.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $configs = $this->configsRepository->findWithoutFail($id);

        if (empty($configs)) {
            Flash::error('Config not found');

            return redirect(route('configs.index'));
        }

        return view('configs.show')->with('configs', $configs);
    }

    /**
     * Show the form for editing the specified Config.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $configs = $this->configsRepository->findWithoutFail($id);

        if (empty($configs)) {
            Flash::error('Config not found');

            return redirect(route('configs.index'));
        }

        return view('configs.edit')->with('configs', $configs);
    }

    /**
     * Update the specified Config in storage.
     *
     * @param  int              $id
     * @param UpdateConfigRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConfigRequest $request)
    {
        $configs = $this->configsRepository->findWithoutFail($id);

        if (empty($configs)) {
            Flash::error('Config not found');

            return redirect(route('configs.index'));
        }

        $configs = $this->configsRepository->update($request->all(), $id);

        Flash::success('Config updated successfully.');

        return redirect(route('configs.index'));
    }

    /**
     * Remove the specified Config from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $configs = $this->configsRepository->findWithoutFail($id);

        if (empty($configs)) {
            Flash::error('Config not found');

            return redirect(route('configs.index'));
        }

        $this->configsRepository->delete($id);

        Flash::success('Config deleted successfully.');

        return redirect(route('configs.index'));
    }
}
