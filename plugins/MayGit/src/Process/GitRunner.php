<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/23/2017
 * Time: 12:56 PM
 */

namespace MayMeow\Git\Process;

use Symfony\Component\Process\Process;

class GitRunner
{
    protected $binary = 'git';

    protected $outputLines;

    protected $rawOutput;

    /**
     * @return mixed
     */
    public function getOutputLines($stripBlankLines = false)
    {
        if($stripBlankLines) {
            $output = [];
            foreach ($this->outputLines as $line) {
                if ('' != $line) {
                    $output[] = $line;
                }
            }

            return $output;
        }

        return $this->outputLines;
    }

    public function execute($cmd, $git = true, $cwd)
    {
        if ($git) {
            $cmd = $this->binary . ' ' . $cmd;
        }

        //$cwd = is_null($cwd) ? GIT_DATA : $cwd;

        $process = new Process($cmd, $cwd);
        $process->setTimeout(15000);
        $process->run();

        $this->rawOutput = $process->getOutput();

        // PHP EOL not working so u using \n
        $values = array_map('rtrim', explode("\n", $process->getOutput()));
        $this->outputLines = $values;

        return $this;
    }

    /**
     * @return string
     */
    public function getBinary()
    {
        return $this->binary;
    }

    /**
     * @return mixed
     */
    public function getRawOutput()
    {
        return $this->rawOutput;
    }
}