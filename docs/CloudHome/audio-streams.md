# Audio streams

To generate audio streams config and write it to file `config/maymeow/audio-stream.json`

```php
use MayMeow\Templates\Config\AudioStreamConfig;

$streamConfig = new AudioStreamConfig();

$streamConfig
    ->setStream('express', 'http://stream.expres.sk:8000/128.mp3')
    ->setStream('fun-radio', 'http://stream.funradio.sk:8000/fun128.mp3')
    ->setStream('sturko', 'http://sturko.intrak.upjs.sk:8000/StuRKo_128.mp3')
    ->write();
```