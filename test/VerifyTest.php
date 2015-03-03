<?php

class VerifyTest extends PHPUnit_Framework_TestCase
{


    /**
     * @dataProvider dataProvider
     */
    public function testShouldVeVerify($number, $validator, $exceptedResult)
    {
        //given
        $validator = new \mirolabs\verify\number\Verify($validator);

        //when
        $result = $validator->verify($number);

        //then
        $this->assertEquals($exceptedResult, $result);
    }


    public function dataProvider()
    {
        return array(
            array('7680002466', 'NIP', true),
            array('123-456-32-18', 'nip', true),
            array('123 456 78 90', 'nip', false),
            array('011559486', 'REGON', true),
            array('140_762_508', 'nip', false),
        );
    }
}
