<?php

namespace App\Repositories;

use App\Models\BookCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BookCategoryRepository.
 * @package App\Repositories
 */
class BookCategoryRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить модель для редактирования в админке.
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить список категорий для вывода в выпадающем списке.
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        return $this->startConditions()->all();
    }
}
