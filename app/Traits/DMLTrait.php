<?php
/**
* The global DML Action
* @package app
* @author  dc.To
* @version 20230724
* @copyright ©2023 dc team all rights reserved.
*/
namespace App\Traits;


trait DMLTrait {
    
    /**
    * Common create
    * @param  void 
    * @return void 
    * @author  dc.To
    * @version 20230724
    */
    public function create()
    {
        if($this->model::create($this->input(__METHOD__))){
            return $this->response(lang('e.create.ok', $this->lang));
        }else{
            return $this->response(lang('e.crate.no', $this->lang), $this->code + 1 );
        }
    }

    /**
    * Common update
    * @param  void 
    * @return void 
    * @author  dc.To
    * @version 20230724
    */
    public function update()
    {
        if($this->model::where($this->where(__METHOD__))->update($this->input(__METHOD__))){
            return $this->response(lang('e.update.ok', $this->lang));
        }else{
            return $this->response(lang('e.update.no', $this->lang), $this->code + 2);
        }
    }


    /**
    * Common delete
    * @param  void 
    
    * @return void 
    * @author  dc.To
    * @version 20230724
    */
    public function delete()                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
    {
        if($this->model::where($this->where(__METHOD__))->delete()){
            return $this->response(lang('e.delete.ok', $this->lang));
        }else{
            return $this->response(lang('e.delete.no', $this->lang), $this->code + 3 );
        }
    }
}

