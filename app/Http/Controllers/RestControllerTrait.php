<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait RestControllerTrait
{

    /**
     * @var \Arcanys\EstimationTool\Repositories\RepositoryInterface
     */
    protected $repository;

    /**
     * @var \Arcanys\EstimationTool\Validators\ValidatorInterface
     */
    protected $validator;

    /**
     * Handles get (list) resource request.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {

        $with = $this->resolveRequestWith($request);

        $perPage = $request->get('perPage', 1000);

        try {
            $data = $this->repository->paginate($perPage, $with);
        } catch (\Exception $e) {
            return $this->notFoundResponse();
        }

        return $this->listResponse($data);
    }

    /**
     * Handles get (single) resource request.
     *
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Request $request, $id)
    {
        $with = $this->resolveRequestWith($request);
        if ($data = $this->repository->find($id, $with)) {
            return $this->showResponse($data);
        }
        return $this->notFoundResponse();
    }

    /**
     * Handles post (save) resource request.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        try {

            if (method_exists($this, 'beforeStore')) {
                $this->beforeStore();
            }
            $this->validator->validate($request->all());

            if (!$this->validator->isValid()) {
                throw new \Exception("ValidationException");
            }
            $data = $this->repository->create($request->all());
            return $this->createdResponse($data);
        } catch (\Exception $ex) {
            $data = ['form_validations' => $this->validator->getErrors(), 'exception' => $ex->getMessage()];
            return $this->clientErrorResponse($data);
        }

    }

    /**
     * Handles put/patch (update) resource request.
     *
     * @param $request Request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request, $id)
    {
        if (!$data = $this->repository->find($id)) {
            return $this->notFoundResponse();
        }

        try {
            if (method_exists($this, 'beforeUpdate')) {
                $this->beforeUpdate($data);
            }

            $this->validator->validate($request->all());

            if (!$this->validator->isValid()) {
                throw new \Exception("ValidationException");
            }

            $data = $this->repository->update($id, $request->all());

            return $this->showResponse($data);
        } catch (\Exception $ex) {
            $data = ['form_validations' => $this->validator->getErrors(), 'exception' => $ex->getMessage()];
            return $this->clientErrorResponse($data);
        }
    }

    /**
     * Handles delete (delete) resource request.
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        if (!$data = $this->repository->find($id)) {
            return $this->notFoundResponse();
        }
        $this->repository->delete($id);
        return $this->deletedResponse();
    }

    /**
     * Returns created response.
     *
     * @param $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function createdResponse($data)
    {
        $response = [
            'code' => 201,
            'status' => 'success',
            'data' => $data
        ];
        return response()->json($response, $response['code']);
    }

    /**
     * Returns show response.
     *
     * @param $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function showResponse($data)
    {
        $response = [
            'code' => 200,
            'status' => 'success',
            'data' => $data
        ];
        return response()->json($response, $response['code']);
    }

    /**
     * Returns list response.
     *
     * @param $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function listResponse($data)
    {
        $response = [
            'code' => 200,
            'status' => 'success',
            'data' => $data->toArray()
        ];
        return response()->json($response, $response['code']);
    }

    /**
     * Shows not found response.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function notFoundResponse()
    {
        $response = [
            'code' => 404,
            'status' => 'error',
            'data' => 'Resource Not Found',
            'message' => 'Not Found'
        ];
        return response()->json($response, $response['code']);
    }

    /**
     * Shows deleted response.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function deletedResponse()
    {
        $response = [
            'code' => 204,
            'status' => 'success',
            'data' => [],
            'message' => 'Resource deleted'
        ];
        return response()->json($response, $response['code']);
    }

    /**
     * Shows client error response.
     *
     * @param $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function clientErrorResponse($data)
    {
        $response = [
            'code' => 422,
            'status' => 'error',
            'data' => $data,
            'message' => 'Unprocessable entity'
        ];
        return response()->json($response, $response['code']);
    }

    /**
     * Resolves resource request having with.
     *
     * @param Request $request
     * @return array
     */
    protected function resolveRequestWith(Request $request)
    {
        $with = $request->get('with') ? explode(',', $request->get('with')) : [];
        return $with;
    }

}