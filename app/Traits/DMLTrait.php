<?php
/**
* DML Traits Action For Controller CRUD
* @package Trait
*/
namespace App\Traits;


trait DMLTrait {
    
    /**
    * Common create
    * @param  void 
    * @return string 
    */
    public function create()
    {
        try{
            Model::create(input());
            return lang('e.create.ok');
        }catch(\Exception $e){
            throw new \App\Exception\ErrorException(lang('e.create.no') . '`'.$e->getMessage().'`');
        }
    }

    /**
    * Common update
    * @param  void 
    * @return string
    */
    public function update()
    {
        try{
            Model::where('id', input('id'))->update($this->input());
            return lang('e.update.ok');
        }catch(\Exception $e){
            throw new \App\Exception\ErrorException(lang('e.update.no') . '`'.$e->getMessage().'`');
        }
    }


    /**
    * Common delete
    * @param  void 
    * @return void 
    */
    public function delete()                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
    {
        try{
            Model::where('id', input('id'))->delete();
            return lang('e.delete.ok');
        }catch(\Exception $e){
            throw new \App\Exception\ErrorException(lang('e.delete.no') . '`'.$e->getMessage().'`');
        }
    }
}

