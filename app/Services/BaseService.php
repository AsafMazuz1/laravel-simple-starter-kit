<?php


namespace App\Services;


use App\Exceptions\ModelNotDefined;


abstract class BaseService implements ModelService
{

    protected $model;

    public function __construct()
    {


        $this->model = $this->getModelClass();
    }

    protected function getModelClass(){
        if(!method_exists($this, 'model')){
            throw new ModelNotDefined();
        }
        return app()->make($this->model());
    }

    public function all(){
        return $this->model->get();
    }

    public function allLastFirst(){
        return $this->model->orderByDesc('id')->get();
    }

    public function find($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

    public function findWhere($column, $value , $op = '=' ,$take = 500 )
    {
        return $this->model->where($column,$op, $value)->take($take)->get();
    }

    public function findWhereLike($column, $value, $take = 500 ,$orderBy = 'id')
    {
        return $this->model->where($column, 'like', '%'.$value.'%')->take($take)->orderByDesc($orderBy)->get();
    }
    public function findWhereLikeFromBeg($column, $value, $take = 500 ,$orderBy = 'id')
    {
        return $this->model->where($column, 'like', $value.'%')->take($take)->orderByDesc($orderBy)->get();
    }

    public function findWhereMulti($conditions , $take = 500 ,$orderBy = 'id')
    {
        return $this->model->where($conditions)->take($take)->orderByDesc($orderBy)->get();
    }

    public function findWhereFirst($column, $value)
    {
        return $this->model->where($column, $value)->firstOrFail();
    }

    public function paginate($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->find($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->find($id);
        return $record->delete();
    }

    public function whereRaw($raw)
    {
        return  $this->model->whereRaw($raw);
    }

    public function whereIn($field , $values, $getValues = ['*'])
    {
        return  $this->model->whereIn($field, $values)
            ->get($getValues);
    }
}
