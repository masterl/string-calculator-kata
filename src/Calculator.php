<?php
namespace phpzeiro;

class Calculator
{
    private function get_delimiter($str)
    {
        if(preg_match('/^\/\/(.)/', $str, $matches) === 1)
        {
            return $matches[1];
        }

        return ',';
    }

    public function sum_str($str) {
        if($str === '')
        {
            return 0;
        }

        $delimiter = $this->get_delimiter($str);

        $str = str_replace("\n",$delimiter,$str);
        $values = explode($delimiter,$str);

        $sum = 0;
        $negatives = [];
        foreach ($values as $number)
        {
            $value = intval($number);

            if($value < 0)
            {
                $negatives[] = $number;
            }

            $sum += $value;
        }
        if(count($negatives) > 0)
        {
            throw new \Exception('negative not allowed ' . implode(',',$negatives));
        }

        return $sum;
    }
}
