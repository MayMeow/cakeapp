<?php

namespace MayMeow\Git;

class GitFactory {

    protected static $envOpts = [];

    protected static $bin = 'git';

    /**
     * @param $command
     * @param $cwd
     * @return bool|string
     * @throws \Exception
     */
    protected static function run_command($command, $cwd)
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

    /**
     * @param $repository
     * @param $path
     * @return bool|string
     */
    public static function cloneRepository($repository, $path)
    {
        $query = 'clone ' . $repository . ' ' . $path;

        return self::run_command($query, GIT_DATA);
    }

    /**
     * @param $path
     * @return bool|string
     */
    public static function status($path)
    {
        $query = 'status --short';

        return self::run_command($query, $path);
    }

    /**
     * @param $path
     * @return bool|string
     */
    public static function add($path)
    {
        $query = 'add .';

        return self::run_command($query, $path);
    }

    /**
     * @param $path
     * @param $message
     * @return bool|string
     */
    public static function commit($path, $message)
    {
        $query = 'commit -m "' . $message . '"';

        return self::run_command($query, $path);
    }

    /**
     * @param $path
     * @param $remote
     * @param $branch
     * @return bool|string
     */
    public static function push($path, $remote, $branch)
    {
        $query =  'push ' . $remote . ' ' . $branch;

        return self::run_command($query, $path);
    }

    /**
     * @param $path
     * @param $remote
     * @param $branch
     * @return bool|string
     */
    public static function pull($path, $remote, $branch)
    {
        $query =  'push ' . $remote . ' ' . $branch;

        return self::run_command($query, $path);
    }

    /**
     * @param $path
     * @return bool|string
     */
    public static function lsTree($repository = null, $path = null)
    {
        if ($repository == null) return false;

        $query = 'ls-tree --full-tree -lz ' . $path;


        return self::run_command($query, $repository);
    }

    /**
     * @param $path
     * @param $name
     * @return bool|string
     */
    public static function bare($path, $name)
    {
        $query = 'init --bare ' . $name . '.git';

        //var_dump('Creating ' . $name . ' repository at ' . $path);

        return self::run_command($query, $path);
    }
}
