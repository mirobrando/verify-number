<?php

class NipTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider correctNIP
     */
    public function testShouldBeCorrectNip($nip)
    {
        //given
        $validator = new \mirolabs\verify\number\validator\Nip();

        //when
        $result = $validator->verify($nip);

        //then
        $this->assertTrue($result);
    }


    /**
     * @dataProvider incorrectNIP
     */
    public function testShouldBeIncorrectNip($nip)
    {
        //given
        $validator = new \mirolabs\verify\number\validator\Nip();

        //when
        $result = $validator->verify($nip);

        //then
        $this->assertFalse($result);
    }

    public function correctNIP()
    {
        return array(
            array("0000000000"),
            array("1111111111"),
            array("7680002466"),
            array("7680002466"),
            array("1234563218"),
            array("9876543210")
        );
    }

    public function incorrectNIP()
    {
        return array(
            array("1234567890"),
            array("5563321223"),
            array("77777777777"),
            array("444433332"),
            array("9876543211")
        );
    }
}
