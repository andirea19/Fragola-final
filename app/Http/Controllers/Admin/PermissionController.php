<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Admin\StorePermissionRequest;
use App\Http\Requests\Admin\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Übersicht aller Berechtigungen.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
        $permissions = Permission::get();

        return view('admin.permissions.index', compact('permissions'));
    }

    /** Reaktion auf eine Anfrage zur Erstellung einer neuen Berechtigung.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.create');
    }

    /**
     * Speichert eine neue Berechtigung
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Permission::create($request->validated());

        return redirect()->route('admin.permissions.index')->with([
            'message' => 'Erfolgreich erstellt!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Formular zum Editieren
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Speichert die Änderungen einer Berechtigung
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request,Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->update($request->validated());

        return redirect()->route('admin.permissions.index')->with([
            'message' => 'Erfolgreich geändert!',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Entfernen von Ressourcen
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $permission->delete();

        return redirect()->route('admin.permissions.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'danger'
        ]);
    }

     /** Notwengi, alles zu löschen?

     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}

/* überflüssig?
class PermissionController extends Controller
{
    @return \Illuminate\Http\Response
     
    public function index()
    {
        $permissions = Permission::get();

        return view('admin.permissions.index', compact('permissions'));
    }
} */