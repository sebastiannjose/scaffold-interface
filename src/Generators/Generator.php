<?php

namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Filesystem\Filesystem;

/**
 * Class     Generator.
 *
 * @author   Amrani Houssain <amranidev@gmail.com>
 */
class Generator extends Filesystem
{
    /**
     * The ViewGenerate instance.
     * 
     * @var \Amranidev\ScaffoldInterface\Generators\ViewGenerate
     */
    private $view;

    /**
     * The ViewGenerate instance.
     * 
     * @var \Amranidev\ScaffoldInterface\Generators\ModelGenerate
     */
    private $model;

    /**
     * The ViewGenerate instance.
     * 
     * @var \Amranidev\ScaffoldInterface\Generators\MigrationGenerate
     */
    private $migration;

    /**
     * The ViewGenerate instance.
     * 
     * @var \Amranidev\ScaffoldInterface\Generators\ControllerGenerate
     */
    private $controller;

    /**
     * The ViewGenerate instance.
     * 
     * @var \Amranidev\ScaffoldInterface\Generators\RouteGenerate
     */
    private $route;

    /**
     * The ViewGenerate instance.
     * 
     * @var \Amranidev\ScaffoldInterface\Filesystem\Path
     */
    private $paths;

    /**
     * Create new Generator instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->view = app()->make('ViewGenerate');
        $this->model = app()->make('ModelGenerate');
        $this->migration = app()->make('MigrationGenerate');
        $this->controller = app()->make('ControllerGenerate');
        $this->route = app()->make('RouteGenerate');
        $this->paths = app()->make('Path');
    }

    /**
     * Generate index.
     * 
     * @return mixed
     */
    public function index()
    {
        $this->make($this->paths->indexPath(), $this->view->generateIndex());
    }

    /**
     * Generate create.
     * 
     * @return mixed
     */
    public function create()
    {
        $this->make($this->paths->createPath(), $this->view->generateCreate());
    }

    /**
     * Generate show.
     * 
     * @return mixed
     */
    public function show()
    {
        $this->make($this->paths->showPath(), $this->view->generateShow());
    }

    /**
     * Generate edit.
     * 
     * @return mixed
     */
    public function edit()
    {
        $this->make($this->paths->editPath(), $this->view->generateEdit());
    }

    /**
     * Generate views directory.
     * 
     * @return mixed
     */
    public function dir()
    {
        $this->makeDir($this->paths->dirPath());
    }

    /**
     * Generate Model.
     * 
     * @return mixed
     */
    public function model()
    {
        $this->make($this->paths->modelPath(), $this->model->generate());
    }

    /**
     * Generate Migration.
     * 
     * @return mixed
     */
    public function migration()
    {
        $this->make($this->paths->migrationPath, $this->migration->generate());
    }

    /**
     * Generate Controller.
     * 
     * @return mixed
     */
    public function controller()
    {
        $this->make($this->paths->controllerPath(), $this->controller->generate());
    }

    /**
     * Generate route.
     * 
     * @return mixed
     */
    public function route()
    {
        $this->append($this->paths->routePath(), $this->route->generate());
    }

    /**
     * get model generator.
     * 
     * @return \Amranidev\ScaffoldInterface\Generators\ModelGenerate
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * get migration generator.
     */
    public function getMigration()
    {
        return $this->migration;
    }

    /**
     * get view generator.
     * 
     * @return \Amranidev\ScaffoldInterface\Generators\ViewGenerate
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * get controller generator.
     * 
     * @return \Amranidev\ScaffoldInterface\Generators\ControllerGenerate
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * get route. 
     * 
     * @return \Amranidev\ScaffoldInterface\Generators\RouteGenerate
     */
    public function getRoute()
    {
        return $this->route;
    }
}
