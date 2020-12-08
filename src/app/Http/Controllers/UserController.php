<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use App\Traits\ApiResponser;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class UserController extends Controller
    {
        use ApiResponser;

        /**
         * @var User
         */
        private $user;

        /**
         * Create a new controller instance.
         *
         * @param User $user
         */
        public function __construct(User $user)
        {
            $this->user = $user;
        }

        /**
         * @return \Illuminate\Http\JsonResponse
         */
        public function index()
        {
            $user = $this->user->all();
            return $this->successResponse($user, Response::HTTP_OK, 'All Users');
        }

        /**
         * Store a single user information
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         * @throws \Illuminate\Validation\ValidationException
         */
        public function create(Request $request)
        {
            $this->validate($request, [
                'name'     => 'required|string',
                'email'    => 'required|string|email|unique:users',
                'password' => 'required|string|confirmed',
            ]);

            $user = $this->user->create($request->all());
            return $this->successResponse($user, Response::HTTP_CREATED, 'Created successfully');
        }

        /**
         * Storing a single User data
         * @param $user
         * @return \Illuminate\Http\JsonResponse
         */
        public function show($user)
        {
            $user = $this->user->findOrFail($user);
            return $this->successResponse($user, Response::HTTP_OK, 'User account');
        }

        /**
         * @param Request $request
         * @param $user
         * @return \Illuminate\Http\JsonResponse
         * @throws \Illuminate\Validation\ValidationException
         */
        public function update(Request $request, $user)
        {
            $this->validate($request, [
                'first_name' => 'required|string',
                'last_name'  => 'required|string',
            ]);

            $user = $this->user->findOrFail($user);

            $user->fill($request->all());
            if ($user->isClean()) {
                return $this->errorResponse("At least one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $user->save();
            return $this->successResponse($user, Response::HTTP_OK, 'Updated successfully');
        }

        /**
         * Delete User information
         * @param $user
         * @return \Illuminate\Http\JsonResponse
         */
        public function destroy($user)
        {
            $user = $this->user->findOrFail($user);
            $user->delete();
            return $this->successResponse($user, Response::HTTP_OK, 'Deleted successfully');
        }
    }
