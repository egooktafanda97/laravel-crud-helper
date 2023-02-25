<?php

namespace App\Service\Traits;

use Illuminate\Http\Request;

trait CrudTemplating
{
    public function store(Request $request)
    {
        $inst = $this->scema->insert($request);
        if (!$res = $this->scema->getResult())
            return response()->json($inst, $inst['status'] ?? 501);
        $this->scema->users_role($res->users, ["api", "admin"]);
        return response()->json($this->scema->getResult(), 200);
    }
    public function update(Request $request, $id)
    {
        $update = $this->scema->update($request, $id);
        if (!$res =  $this->scema->getResult())
            return response()->json($update, $update['status'] ?? 501);
        return response()->json($this->scema->getResult(), 200);
    }
    public function destroy($id)
    {
        $delete = $this->scema->deleted($id);
        if (!$res =  $this->scema->getResult())
            return response()->json($delete, $delete['status'] ?? 501);
        return response()->json($this->scema->getResult(), 200);
    }
    public function getAllWhere($where = null)
    {
        $get = $this
            ->scema
            ->getModel()::with($this->scema->getListRelationName());
        if ($where != null) {
            $get =  $get->where($where);
        }
        $get = $get->orderBy("id", "DESC")
            ->get();
        return $get;
    }
    public function get()
    {
        $all = $this->scema->getModel()::with($this->scema->getListRelationName())->orderBy("id", "DESC")->get();
        return response()->json($all);
    }
    public function getById($id)
    {
        $q = $this->scema->getModel()::whereId($id)->with($this->scema->getListRelationName())->first();
        return response()->json($q);
    }
    public function getByUid($uid)
    {
        $q = $this->scema->getModel()::whereUid($uid)->with($this->scema->getListRelationName())->first();
        return response()->json($q);
    }
    public function getByAuth()
    {
        $q = $this->scema->getModel()::whereUserId(auth()->user()->id)->with($this->scema->getListRelationName())->first();
        return response()->json($q);
    }
}
