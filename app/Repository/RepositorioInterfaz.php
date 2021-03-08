<?php
/**
 * Created by PhpStorm.
 * User: JosuéGarcía
 * Date: 19/07/2016
 * Time: 14:09
 */

namespace App\Repository;


interface RepositorioInterfaz
{
    public function all();

    public function paginate($perPage = 15);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);

    public function findBy($field, $value);

    public function findAllWhere($field, $value);

    public function sync($id);

    public function findAllwherein($atribute, array $in);

}
