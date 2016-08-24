<?php

namespace App\Http\Controllers;

use App\DataTables\AnswerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Repositories\AnswerRepository;
use App\Repositories\SurveyRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class AnswerController extends AppBaseController
{
    /** @var  AnswerRepository */
    private $answerRepository;

  /** @var  SurveyRepository */
    private $surveyRepository;


    public function __construct(AnswerRepository $answerRepo,SurveyRepository $surveyRepo)
    {
        $this->answerRepository = $answerRepo;
        $this->surveyRepository = $surveyRepo;
    }

    /**
     * Display a listing of the Answer.
     *
     * @param AnswerDataTable $answerDataTable
     * @return Response
     */
    public function index(AnswerDataTable $answerDataTable)
    {
        return $answerDataTable->render('answers.index');
    }

    /**
     * Show the form for creating a new Answer.
     *
     * @return Response
     */
    public function create()
    {
        return view('answers.create',['surveys'=>$this->surveyRepository->all()->lists('subject','id')->toarray()]);
    }

    /**
     * Store a newly created Answer in storage.
     *
     * @param CreateAnswerRequest $request
     *
     * @return Response
     */
    public function store(CreateAnswerRequest $request)
    {
        $input = $request->all();

        $answer = $this->answerRepository->create($input);

        Flash::success('Answer saved successfully.');

        return redirect(route('admin.answers.index'));
    }

    /**
     * Display the specified Answer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $answer = $this->answerRepository->findWithoutFail($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('admin.answers.index'));
        }

        return view('answers.show')->with('answer', $answer);
    }

    /**
     * Show the form for editing the specified Answer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $answer = $this->answerRepository->findWithoutFail($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('admin.answers.index'));
        }

        return view('answers.edit')->with('answer', $answer);
    }

    /**
     * Update the specified Answer in storage.
     *
     * @param  int              $id
     * @param UpdateAnswerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnswerRequest $request)
    {
        $answer = $this->answerRepository->findWithoutFail($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('admin.answers.index'));
        }

        $answer = $this->answerRepository->update($request->all(), $id);

        Flash::success('Answer updated successfully.');

        return redirect(route('admin.answers.index'));
    }

    /**
     * Remove the specified Answer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $answer = $this->answerRepository->findWithoutFail($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('admin.answers.index'));
        }

        $this->answerRepository->delete($id);

        Flash::success('Answer deleted successfully.');

        return redirect(route('admin.answers.index'));
    }
}
