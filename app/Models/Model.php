<?php

namespace App\Models;

class Model
{
    use ModelTrait;

    public function __construct()
    {
    }

    public function generateInsertData($data)
    {
        $i = 0;

        $columns = "";
        $values = "";

        foreach ($data as $key => $value) {
            $columns .= $key;
            if ($i < count($data) - 1) {
                $columns .= ", ";
            }

            $values .= "'" . $value . "'";
            if ($i < count($data) - 1) {
                $values .= ", ";
            }

            $i++;
        }

        return [
            "columns" => $columns,
            "values" => $values
        ];
    }

    public function generateUpdateData($data)
    {
        $i = 0;

        $columns = "";

        foreach ($data as $key => $value) {
            $columns .= $key . " = '" . $value . "'";
            if ($i < count($data) - 1) {
                $columns .= ", ";
            }

            $i++;
        }

        return [
            "columns" => $columns
        ];
    }
}
