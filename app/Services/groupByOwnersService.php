<?php

namespace App\Services;

class groupByOwnersService{
    public function groupByOwners($files){
        $result = array();
        foreach ($files as $file => $owner) {
            // If owner is not present in the result array, initialize it
            if (!isset($result[$owner])) {
                $result[$owner] = array();
            }

            // Add the file to the owner's array
            $result[$owner][] = $file;
        }

        return $result;
    }
}