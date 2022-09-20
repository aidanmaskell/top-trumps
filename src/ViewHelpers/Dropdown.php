<?php

namespace Transformers\ViewHelpers;

class Dropdown 
{
    public static function createDropdown(array $transformers): string 
    {
        $result = '';

        foreach($transformers as $transformerName => $transformerWinRate)
        {
            $result .= '<option value="' . $transformerName . ' / '. $transformerWinRate . '">' . $transformerName . '</option>';
        }
        return $result;
    }

    public static function createDropdown2(array $transformers): string 
    {
        $result = '';

        foreach($transformers as $transformer)
        {
            $result .= '<option value="' . $transformer . '">' . $transformer->getName() . '</option>';
        }
        return $result;
    }
}