<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/13/2017
 * Time: 2:56 PM
 */

namespace MayMeow\Git\Utility;

class Runner
{
    protected static $envOpts = [];

    protected static $bin = 'git';

    /**
     * @param $command
     * @param $cwd
     * @return bool|string
     * @throws \Exception
     */
    public static function run_command($command, $cwd)
    {
        $descriptorspec = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'], //stdout
            2 => ['pipe', 'w'] //stdout
        ];

        $pipes = [];

        if(count($_ENV) === 0) {
            $env = NULL;
            foreach(self::$envOpts as $k => $v) {
                putenv(sprintf("%s=%s",$k,$v));
            }
        } else {
            $env = array_merge($_ENV, self::$envOpts);
        }


        $process = proc_open(self::$bin . ' ' . $command, $descriptorspec, $pipes, $cwd, $env);

        $stdout = stream_get_contents($pipes[1]);
        $stderr = stream_get_contents($pipes[2]);
        foreach ($pipes as $pipe) {
            fclose($pipe);
        }

        $status = trim(proc_close($process));
        if ($status) throw new \Exception($stderr . "\n" . $stdout);

        return $stdout;
    }

    /**
     * @param $bin
     */
    public static function setBin($bin)
    {
        self::$bin = $bin;
    }
}
