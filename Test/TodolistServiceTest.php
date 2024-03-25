<?php

require_once __DIR__. "/../Entity/Todolist.php";
require_once __DIR__. "/../Repository/TodolistRepository.php";
require_once __DIR__. "/../Sevice/TodolistService.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testShowTodolist(): void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[] = new Todolist("Belajar php dasar");
    $todolistRepository->todolist[] = new Todolist("Belajar php oop");
    $todolistRepository->todolist[] = new Todolist("Belajar php database");

    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->showTodolist();
}

function testAddTodolist(): void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("belajar php");
    $todolistService->addTodolist("belajar php oop");
    $todolistService->addTodolist("belajar php database");

    $todolistService->showTodolist();
}

function testRemoveTodolist(): void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("belajar php");
    $todolistService->addTodolist("belajar php oop");
    $todolistService->addTodolist("belajar php database");
    $todolistService->showTodolist();
    $todolistService->removeTodolist(1);
    $todolistService->showTodolist();
}

testRemoveTodolist();
