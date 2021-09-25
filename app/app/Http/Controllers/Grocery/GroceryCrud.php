<?php

namespace App\Http\Controllers\Grocery;

trait GroceryCrud
{
    private function _getDatabaseConnection() {

        return [
            'adapter' => [
                'driver' => 'Pdo_Mysql',
                'database' => env('DB_DATABASE'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'charset' => 'utf8'
            ]
        ];
    }

    private function _getGroceryCrudEnterprise() {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new \GroceryCrud\Core\GroceryCrud($config, $database);

        return $crud;
    }

    private function _showOutput($output) {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                ->header('Content-Type', 'application/json')
                ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;

        return view('layout.admin', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files
        ]);
    }
}
