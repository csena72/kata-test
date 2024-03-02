<?php

namespace Kata\CategoryTree;

class Printer
{
    public function build(Category $parent, int $spaces = 0): string
    {
        $result = $this->buildTree($parent, $spaces);
        
        return $result;
    }
    
    private function buildTree(Category $category, int $spaces): string
    {
        $tree = '';
            
        $indentation = str_repeat('  ', $spaces);
        
        $tree .= $indentation . $category->name() . PHP_EOL;
        
        $sortedChildren = $category->children();

        usort($sortedChildren, function(Category $a, Category $b) {
            return $a->name() <=> $b->name();
        });
    
    
        foreach ($sortedChildren as $child) {
            $tree .= $this->buildTree($child, $spaces + 1);
        }
    
        return $tree;
    }    
}
