<?php

namespace App\Repositories;

use App\Models\Mark;
use App\Repositories\Interfaces\MarkRepositoryInterfaces;

class MarkRepository implements MarkRepositoryInterfaces
{
    protected Mark $mark;
    public function __construct(Mark $mark)
    {
        $this->mark = $mark;
    }

    /**
     * @inheritDoc
     */
    public function all()
    {
       return $this->mark->paginate(10);
    }

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        return $this->mark->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function store($data)
    {
        return $this->mark->create($data->all());
    }

    /**
     * @inheritDoc
     */
    public function update($data, $id)
    {
        $requestAll = $data->except('_token', '_method');
        return $this->mark->find($id)->update($requestAll);
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        return $this->mark->destroy($id);
    }
}
