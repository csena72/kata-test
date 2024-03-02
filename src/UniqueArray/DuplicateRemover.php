<?php

namespace Kata\UniqueArray;

class DuplicateRemover
{
    public function __invoke(array $input): array
    {
        $uniqueValues = [];
                
        $addedValues = [];
        
        foreach ($input as $element) {      
            if (!isset($addedValues[$element])) {
                $uniqueValues[] = $element;
                $addedValues[$element] = true;
            }
        }
        
        return $uniqueValues;
    }
}
