<?php
/**
* DML Traits Action For Controller CRUD
* @package Trait
*/
namespace App\Traits;

use App\Model\Model;

trait Restful {

    /**
     * Get Model
     * @param  void 
     * @author  dc.To
     * @version 20250723
     */
    protected function model($name = null): Model
    {
        return new ('\\App\\Model\\'.($name ?? class_basename(static::class)));
    }
    
    /**
    * Restful create
    * @param  void 
    * @return string 
    */
    public function post()
    {
        try{
            $this->model()->create(input());
            return lang('e.post.ok');
        }catch(\Exception $e){
            throw new \App\Exception\ErrorException(lang('e.post.no') . '`'.$e->getMessage().'`');
        }
    }

    /**
    * Restful update
    * @param  void 
    * @return string
    */
    public function put()
    {
        try{
            Model::where('id', input('id'))->update($this->input());
            return lang('e.put.ok');
        }catch(\Exception $e){
            throw new \App\Exception\ErrorException(lang('e.put.no') . '`'.$e->getMessage().'`');
        }
    }

    /**
    * Restful patch
    * @param  void 
    * @return string
    */
    public function patch()
    {
        try{
            Model::where('id', input('id'))->update(['state'=>input('state')]);
            return lang('e.put.ok');
        }catch(\Exception $e){
            throw new \App\Exception\ErrorException(lang('e.put.no') . '`'.$e->getMessage().'`');
        }
    }

    /**
    * Restful delete
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

