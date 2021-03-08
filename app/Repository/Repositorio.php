<?php
namespace App\Repository;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


abstract class Repositorio implements RepositorioInterfaz
{

    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
        DB::enableQueryLog();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->get();
    }

    public function allBy($name = 'name')
    {
        return $this->model->orderBy($name, 'asc')->get();
    }

    public function only30($name = 'name')
    {
        return $this->model->orderBy($name, 'asc')->take(5)->get();
    }

    public function onlyN($count)
    {
        return $this->model->take($count)->get();
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $data = array_map('mb_strtoupper', $data);
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        $data = array_map('mb_strtoupper', $data);
        $u = $this->model->where($attribute, '=', $id)->update($data);

        if ($u == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $f = $this->model->find($id);

        if (!is_null($f))
            return $f;
        else
            return false;
    }


    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function findBy($attribute, $value)
    {
        $F = $this->model->where($attribute, '=', $value)->first();

        if (!is_null($F)) {
            return $F;
        } else {
            return false;
        }
    }

    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function findBySelect($attribute, $value,$selected)
    {
        $F = $this->model->select($selected)->where($attribute, '=', $value)->first();

        if (!is_null($F)) {
            return $F;
        } else {
            return false;
        }
    }

    public function findAllwherein($atribute, array $in)
    {
        $all = $this->model->whereIn($atribute, $in)->get();

        if (isset($all[0])) {
            return $all;
        } else {
            return false;
        }
    }


    public function findAllWhere($attribute, $value)
    {
        $faw = $this->model->where($attribute, '=', $value)->get();

        if (!is_null($faw)) {
            return $faw;
        } else {
            return false;
        }
    }

    public function findDate($attribute, $value)
    {
        $faw = $this->model->whereDate($attribute, '=', $value)->get();

        if (!is_null($faw)) {
            return $faw;
        } else {
            return false;
        }
    }

    public function findlike($attribute, $value)
    {

        $F = $this->model->where($attribute, 'like', $value)->get();

        if (!is_null($F)) {
            return $F;
        } else {
            return null;
        }
    }

    public function findByWheres(array $wheres)
    {
        $F = $this->model->where($wheres)->first();

        if (!is_null($F)) {
            return $F;
        } else {
            return false;
        }
    }

    public function findAllWheres(array $wheres)
    {
        $F = $this->model->where($wheres)->get();

        if (!is_null($F)) {
            return $F;
        } else {
            return false;
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());//$this->app->make("App\Model\Catalogos\CatClaseVehiculo");

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }

    public function getTable()
    {
        return $this->model->getTable();
    }

    public function sync($id)
    {
        $this->model->attach($id, ['fecha_alta' => date('Y-m-d H:i:s'), 'fecha_fin' => '', 'status' => 1]);
    }

    public function count($attribute, $value)
    {
        $faw = $this->model->where($attribute, '=', $value)->count();
        return $faw;
    }

    public function countWheres(array $wheres)
    {
        $F = $this->model->where($wheres)->count();

        if (!is_null($F)) {
            return $F;
        } else {
            return false;
        }
    }
}
