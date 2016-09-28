<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AreaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Repositories\AreaRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

use Cornford\Googlmapper\Facades\MapperFacade as Mapper;


class AreaController extends AppBaseController
{
    /** @var  AreaRepository */
    private $areaRepository;

    public function __construct(AreaRepository $areaRepo)
    {
        $this->areaRepository = $areaRepo;
    }

    /**
     * Display a listing of the Area.
     *
     * @param AreaDataTable $areaDataTable
     * @return Response
     */
    public function index(AreaDataTable $areaDataTable)
    {
        return $areaDataTable->render('admin.areas.index');
    }

    /**
     * Show the form for creating a new Area.
     *
     * @return Response
     */
    public function create()
    {
        $map = Mapper::map(31.3546763,34.30882550000001,['zoom'=>11,'eventAfterLoad'=>"
        
            marker = new google.maps.Marker({
                map: maps[0].map, position: {
                    'lat': 31.3546763
                    , lng: 34.30882550000001
                }, clickable: true, draggable: true
            });
            function handleEvent(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
            }

            marker.addListener('drag', handleEvent);
            marker.addListener('dragend', handleEvent);
        
    "]);

        return view('admin.areas.create');
    }

    /**
     * Store a newly created Area in storage.
     *
     * @param CreateAreaRequest $request
     *
     * @return Response
     */
    public function store(CreateAreaRequest $request)
    {
        $input = $request->all();

        $area = $this->areaRepository->create($input);
        
        Flash::success('Area saved successfully.');

        return redirect(route('admin.areas.index'));
    }

    /**
     * Display the specified Area.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('admin.areas.index'));
        }

        return view('admin.areas.show')->with('area', $area);
    }

    /**
     * Show the form for editing the specified Area.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('admin.areas.index'));
        }

        return view('admin.areas.edit')->with('area', $area);
    }

    /**
     * Update the specified Area in storage.
     *
     * @param  int              $id
     * @param UpdateAreaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreaRequest $request)
    {
        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('admin.areas.index'));
        }

        $area = $this->areaRepository->update($request->all(), $id);

        Flash::success('Area updated successfully.');

        return redirect(route('admin.areas.index'));
    }

    /**
     * Remove the specified Area from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $area = $this->areaRepository->findWithoutFail($id);

        if (empty($area)) {
            Flash::error('Area not found');

            return redirect(route('admin.areas.index'));
        }

        $this->areaRepository->delete($id);

        Flash::success('Area deleted successfully.');

        return redirect(route('admin.areas.index'));
    }
}
