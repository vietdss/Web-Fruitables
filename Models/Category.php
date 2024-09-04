<?php


class Category extends BaseModel
{
    const TABLE = 'categories';
   
    public function getAllCategories()
    {
        return $this->getAll(self::TABLE);       
    }
    
}
