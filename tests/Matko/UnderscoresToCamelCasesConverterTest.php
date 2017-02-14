<?php

namespace Tests\Matko;

use Tests\Matko;

class UnderscoresToCamelCasesConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerTestconvertKeysWithUnderscoresToCamelCases
     */
    public function testconvertKeysWithUnderscoresToCamelCases($originalArray, $arrayWithCamelCasedKeys)
    {
        $converter = new \Matko\UnderscoresToCamelCasesConverter();

        $result = $converter->convertKeysWithUnderscoresToCamelCases($originalArray);

        $this->assertEquals($arrayWithCamelCasedKeys, $result);
    }

    /**
     * @return array
     */
    public function providerTestconvertKeysWithUnderscoresToCamelCases()
    {
        return array(
            array(['camelCaseKey' => 'value'] , ['camelCaseKey' => 'value']),
            array(['this_is_test' => true], ['thisIsTest' => true]),
            array(
                ['y_o_l_o' => ['lamb-Thumb' => 'ha-ha_hahah']],
                ['yOLO' => ['lamb-Thumb' => 'ha-ha_hahah']]
            ),
            array(
               ['outer_key' => [
                        'inner_key1' => [
                            'inner_key2' => 'iner-value'
                        ]
                    ]
               ],
               ['outerKey' => [
                        'innerKey1' => [
                            'innerKey2' => 'iner-value'
                        ]
                    ]
               ],
            ),
            array(
               ['outer_key' => [
                        'inner_key1' => [
                            'inner_key2' => [
                                'inner-key3' => [
                                    'inn_er_k_e_y' => 'the_end',
                                ]
                            ]
                        ]
                    ]
               ],
               ['outerKey' => [
                        'innerKey1' => [
                            'innerKey2' => [
                                'inner-key3' => [
                                    'innErKEY' => 'the_end',
                                ]
                            ]
                        ]
                    ]
               ],
            ),
        );
    }
}
