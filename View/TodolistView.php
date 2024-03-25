<?php

namespace View {

    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView
    {

        private TodolistService $todolistService;

        public function __construct(todolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        function showTodolist(): void
        {
            while (true) {
                $this->todolistService->showTodolist();
        
                echo "Menu" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "x. Kelur Todo" . PHP_EOL;
        
                $pilihan = InputHelper::input("pilih");
        
                if ($pilihan == "1") {
                    $this->addTodolist();
                }elseif($pilihan == "2"){
                    $this->removeTodolist();
                }elseif($pilihan == "x"){
                    break;
                }else{
                    echo "pilihan tidak dimengerti" .PHP_EOL;
                }
            }
        
            echo "sampai jumpa lagi" . PHP_EOL;
        }

        function addTodolist(): void
        {
            echo "Menambah Todo" . PHP_EOL;

            $todo = InputHelper::input("todo (x untuk batal) :");

            if ($todo == "x") {
                echo "batal menambah todo" .PHP_EOL;
            } else {
                $this->todolistService->addTodolist($todo);
            }
        }

        function removeTodolist(): void
        {
            echo "Menghapus Todo" . PHP_EOL;

            $pilihan = InputHelper::input("nomor (x untuk batal)");
        
            if ($pilihan == "x"){
                echo "batal menghapus todo" . PHP_EOL;
            } else{
                $this->todolistService->removeTodolist($pilihan);
            }
        }
    }
}