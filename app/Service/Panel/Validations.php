<?php

namespace App\Service\Panel;

trait Validations
{
    public function master_validation($data): array
    {
        $va = [];
        foreach ($data as $value) {
            if (array_key_exists('validate', $value)) {
                $validations = $value['validate'];
                if (array_key_exists('validate_uniq', $value))
                    $validations = $value['validate'] . $value['validate_uniq'];
                $va += [$value['name'] => $validations];
            }
        }
        return $va;
    }
}
