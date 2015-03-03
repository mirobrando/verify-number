<?php

class RegonTest extends PHPUnit_Framework_TestCase {



    /**
     * @dataProvider correctREGON
     */
    public function testShouldBeCorrectNip($regon)
    {
        //given
        $validator = new \mirolabs\verify\number\validator\Regon();

        //when
        $result = $validator->verify($regon);

        //then
        $this->assertTrue($result);
    }


    /**
     * @dataProvider incorrectREGON
     */
    public function testShouldBeIncorrectNip($regon)
    {
        //given
        $validator = new \mirolabs\verify\number\validator\Regon();

        //when
        $result = $validator->verify($regon);

        //then
        $this->assertFalse($result);
    }

    public function correctREGON()
    {
        return array(
            array("140762508"),
            array("634169277"),
            array("011559486"),
            array("12345678512347")
        );
    }

    public function incorrectREGON()
    {
        return array(
            array("140762507"),
            array("634169278"),
            array("011559485"),
            array("11559486"),
            array("0011559486")
        );
    }
}
