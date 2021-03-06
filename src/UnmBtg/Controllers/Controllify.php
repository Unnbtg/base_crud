<?php
/**
 * Created by PhpStorm.
 * User: unm
 * Date: 23/07/17
 * Time: 00:05
 */

namespace UnmBtg\Controllers;


use UnmBtg\Services\ServiceAbstract;

/**
 * Trait Controllify
 * @package UnmBtg\Controllers
 */
trait Controllify
{

    /**
     * @var ServiceAbstract
     */
    protected $service;

    /**
     * @return ServiceAbstract
     * @throws \Exception
     */
    public function getService()
    {
        if (is_null($this->service) || ! $this->service instanceof ServiceAbstract) {
            throw new \Exception("A Service must be provided and it must be a ". ServiceAbstract::class. ".");
        }

        return $this->service;
    }

    public function indexRequest(array $request) {
        try{
            return $this->getService()->search($request);
        } catch (\Exception $e){
            var_dump($e);exit;
        }

    }

    public function deleteRequest($identifier) {
        return $this->getService()->delete($identifier);
    }

    public function storeRequest(array $request) {
        return $this->getService()->save($request);
    }

    public function updateRequest($identifier, array $request){

        return $this->getService()->update($identifier, $request);
    }

}