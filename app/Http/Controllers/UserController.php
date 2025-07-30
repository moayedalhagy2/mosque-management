<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\BranchResource;
use App\Http\Resources\WrapCollection;
use App\Models\Branch;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{

    public function profile(Request $request)
    {
        $user = auth()->user();


        $user->load(['branch', 'roles:id,name']);
        return $this->successJson(new UserResource($user));
    }


    public function index(Request $request)
    {
        $model = QueryBuilder::for(User::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('is_active'),
                'name',
                'branch.name',
                'branch.id'
            ])
            ->allowedSorts(['id', 'created_at', 'is_active'])
            ->with(['branch', 'roles:id,name', 'creator', 'editor']);


        return new WrapCollection($model->paginate($this->pageSize()), UserResource::class);
    }

    public function show(Request $request, User $item)
    {
        $item->load(['branch', 'roles', 'creator', 'editor']);

        return $this->successJson(new UserResource($item));
    }


    public function store(StoreUserRequest $request)
    {

        $data = $request->validated();

        $item = User::create($data);

        if ($request->has('role')) {
            $item->assignRole($data['role']);
        }

        $item->load(['branch', 'roles']);


        return $this->successJson(new UserResource($item), 201);
    }


    public function update(UpdateUserRequest $request, User $item)
    {

        $data = $request->validated();

        $item->update($data);

        if ($request->has('role')) {
            $item->syncRoles([$data['role']]);
        }


        return $this->successJson([], 204);
    }



    public function destroy(Request $request, User $item)
    {
        $item->delete();

        return $this->successJson([], 204);
    }


    //enums

    public function rolesEnum()
    {
        return $this->successJson(RoleEnum::values());
    }
}
