<?php

class TestSuite
{
    private $passed = 0;
    private $failed = 0;
    private $testResults = [];

    public function run($functionName)
    {
        try {
            $functionName();
            $this->passed++;
            echo ".";
        } catch (AssertionError $error) {
            $this->failed++;
            $this->testResults[] = [
                'name' => $functionName,
                'message' => $error->getMessage()
            ];
            echo "X";
        }
    }

    public function summarize()
    {
        echo PHP_EOL . "Tests passés : {$this->passed}" . PHP_EOL;
        echo "Tests échoués : {$this->failed}" . PHP_EOL;
        if ($this->failed > 0) {
            echo "Détails des échecs :" . PHP_EOL;
            foreach ($this->testResults as $result) {
                echo "- {$result['name']}: {$result['message']}" . PHP_EOL;
            }
        }
    }
}
