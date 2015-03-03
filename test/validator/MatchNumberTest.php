<?php

class MatchNumberTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider correctMatchNumber
     */
    public function testShouldBeCorrectMatchNumber($matchNumber, $expectedResult)
    {
        //given
        $validator = new \mirolabs\verify\number\validator\MatchNumber();

        //when
        $result = $validator->match($matchNumber);

        //then
        $this->assertEquals($expectedResult, $result);
    }


    /**
     * @dataProvider incorrectMatchNumber
     */
    public function testShouldBeIncorrectMatchNumber($matchNumber)
    {
        //given
        $validator = new \mirolabs\verify\number\validator\MatchNumber();

        //when
        try {
            $result = $validator->match($matchNumber);
        } catch (Exception $e) {
            $result = $e;
        }

        //then
        $this->assertInstanceOf('mirolabs\verify\number\exception\InvalidNumberException', $result);
    }

    public function correctMatchNumber()
    {
        return array(
            array("123 456 67 89", "1234566789"),
            array("123-456-67-89", "1234566789"),
            array(" 123-456-67-89   ", "1234566789"),
            array("\t123-456-67-89\r\n", "1234566789"),
            array("123-456-67-89\n", "1234566789"),
            array("123\\456\\67\\89", "1234566789"),
            array('123\456\67\89', "1234566789"),
            array("123/456/67/89", "1234566789")
        );
    }

    public function incorrectMatchNumber()
    {
        return array(
            array("123a4567890"),
            array("123A4567890"),
            array("1234567890!"),
            array("123a4567890*"),
            array("123a4567890+"),
            array("[1234567890]"),
            array("1234567890$")
        );
    }
}
