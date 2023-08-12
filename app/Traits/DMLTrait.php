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
        if($this->model()::create($this->input(__METHOD__))){
            return $this->response(lang('msg.create.ok', $this->lang));
        }else{
            return $this->response(lang('msg.crate.no', $this->lang), $this->code + 1 );
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
        if($this->model()::where($this->where(__METHOD__))->update($this->input(__METHOD__))){
            return $this->response(lang('msg.update.ok', $this->lang));
        }else{
            return $this->response(lang('msg.update.no', $this->lang), $this->code + 2);
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
        if($this->model()::where($this->where(__METHOD__))->delete()){
            return $this->response(lang('msg.delete.ok', $this->lang));
        }else{
            return $this->response(lang('msg.delete.no', $this->lang), $this->code + 3 );
        }
    }
}

