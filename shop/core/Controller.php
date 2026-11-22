<?php
// Base controller: gives every controller a way to load models and views.
class Controller
{
    protected function model(string $name)
    {
        require_once "models/$name.php";
        return new $name();
    }

    protected function view(string $path, array $data = []): void
    {
        extract($data);
        require 'views/layout/header.php';
        require "views/$path.php";
        require 'views/layout/footer.php';
    }
}
