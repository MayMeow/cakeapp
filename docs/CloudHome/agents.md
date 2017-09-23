# Player Agent

Simple socket server to controll omxplayer.

## Requirements

* PHP 5.5 and up with dependencies
* Composer
* omxplayer

_Tested on Raspberry Pi 2 with Raspbian._

## Installation

Clone respository

```bash
https://github.com/may-meow-codes/player-agent.git
cd player-agent
composer install
```

## Running as a service

1. As root create file

`sudo touch /lib/systemd/system/playeragent.service`

2. Update file with following content

```bash
[Unit]
Description=MayMeow Codes PlayerAgent API Daemon
After=network.target

[Service]
ExecStart=/usr/bin/php /opt/player-agent/server.php
WorkingDirectory=/opt/player-agent
Type=simple
Restart=always
RestartSec=10
KillMode=process

[Install]
WantedBy=multi-user.target
```

3. Make systemd load the new unit

`sudo systemctl daemon-reload`

4. Start service

`sudo systemctl start playeragent.service`

5. Run after startup (optional)

`sudo systemctl enable mcloudapi.service`

Now you can connect to socket `tcp://your-ip-address:9878`

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request.

## Credits

[MayMeow.Codes Team](https://github.com/may-meow-codes)

## License

MIT