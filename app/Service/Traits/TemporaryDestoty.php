<?php

namespace App\Service\Traits;

use Illuminate\Http\Request;

trait TemporaryDestoty
{
    public function getTemp()
    {
    }
    public function restore($id)
    {
        $this->scema->getModel()::where('id', $id)->withTrashed()->restore();
        return redirect()->route('users.index', ['status' => 'archived'])
            ->withSuccess(__('User restored successfully.'));
    }
    public function forceDelete($id)
    {
        $this->scema->getModel()::where('id', $id)->withTrashed()->forceDelete();

        return redirect()->route('users.index', ['status' => 'archived'])
            ->withSuccess(__('User force deleted successfully.'));
    }
    public function restoreAll()
    {
        $this->scema->getModel()::onlyTrashed()->restore();
        return redirect()->route('users.index')->withSuccess(__('All users restored successfully.'));
    }
}
