<?php

namespace Ch5\Tests;

use PHPUnit\Framework\TestCase;
use Ch5\Src\LogAnalyzer3;
use Ch5\Src\LoggerInterface;
use Ch5\Src\WebServiceInterface;
use Ch5\Src\ErrorInfo;

class LogAnalyzer2Test extends TestCase
{
    // public function test_Analyze_loggerThrows_CallsWebService()
    // {
    //     $mockService = $this->createMock(WebServiceInterface::class);
    //     $stubLogger = $this->createMock(LoggerInterface::class);
    //     $stubLogger->method("logError")->with($this->isType("string"))->will($this->throwException(new \Exception("fake exception")));
    //     $mockService->expects($this->once())->method("write")->with($this->stringContains("fake exception"));

    //     $analyzer = new LogAnalyzer2($stubLogger, $mockService);
    //     $analyzer->minNameLength = 10;
    //     $analyzer->analyze("Short.txt");
    // }

    public function test_Analyze_loggerThrows_CallsWebServiceWithSubObject()
    {
        $mockService = $this->createMock(WebServiceInterface::class);
        $stubLogger = $this->createMock(LoggerInterface::class);
        $stubLogger->method("logError")->with($this->isType("string"))->will($this->throwException(new \Exception("fake exception")));
        $mockService->expects($this->once())->method("write")->with(new ErrorInfo(1000, "fake exception"));

        $analyzer = new LogAnalyzer2($stubLogger, $mockService);
        $analyzer->minNameLength = 10;
        $analyzer->analyze("Short.txt");
    }
}
// method()->expects()->with()->will()