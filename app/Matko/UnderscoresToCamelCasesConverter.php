<?php

namespace Matko;

class UnderscoresToCamelCasesConverter
{
    /**
     * Runs through associative array and replaces underscores
     * with camel cases in array key names.
     * 
     * @param array $data
     *
     * @return array
     */
    public function convertKeysWithUnderscoresToCamelCases(array $data)
    {
        foreach ($data as $key => $value) {
            $camelCasedKey = $this->underscoreToCamelCase($key);
  
            $data[$camelCasedKey] = is_array($value)
                                        ? $this->convertKeysWithUnderscoresToCamelCases($value)
                                        : $value;

            if ($camelCasedKey != $key) {
                unset($data[$key]);
            }
        }

        return $data;
    }

    /**
     * @param string $string
     *
     * @return string
     */
    private function underscoreToCamelCase($string)
    {
        if (strpos($string, '_') === false) {
            return $string;
        }

        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        $str[0] = strtolower($str[0]);

        return $str;
    }
}
