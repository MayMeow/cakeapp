<?php

/*$userRepository = new \Oauth2Server\Controller\Repositories\UserRepository();
$scopeRepository = new \Oauth2Server\Controller\Repositories\ScopeRepository();
$accsstokenRepository = new \Oauth2Server\Controller\Repositories\AccessTokenRepository();*/


/*curl -X "POST" "http://localhost:8765/cake-auth/api/v1/users/index.json" \
-H "Content-Type: application/x-www-form-urlencoded" \
-H "Accept: 1.0" \
-H "Authorization: yyytxhy6liyzp371fjx4iy11uw2d1jxwdvi939tcxseizros5xt3figqnq3fo88uroxr1r" \
--data-urlencode "grant_type=password" \
--data-urlencode "client_id=6r7o4j6bfts19v25kxzrof76g" \
--data-urlencode "client_secret=rf9ikcige26g1ulw0bo8kikjskd5bmg2bmkqvvwz4eimqrihqn" \
--data-urlencode "username=martin" \
--data-urlencode "password=martin" \
--data-urlencode "scope=basic email"*/

/*curl -X "POST" "http://localhost:8765/oauth2-server/oauth-authenticate/test.json" \
-H "Content-Type: application/x-www-form-urlencoded" \
-H "Accept: 1.0" \
-H "Authorization: BEARER asd4a6s5d4a6s5d46a5sd4a" \
--data-urlencode "grant_type=client_credentials" \
--data-urlencode "client_id=myawesomeapp" \
--data-urlencode "client_secret=abc123" \
--data-urlencode "scope=basic email"*/

/*curl -X "POST" "http://localhost:8765/oauth2-server/oauth-authenticate/refresh_token.json" \
-H "Content-Type: application/x-www-form-urlencoded" \
-H "Accept: 1.0" \
--data-urlencode "grant_type=refresh_token" \
--data-urlencode "client_id=myawesomeapp" \
--data-urlencode "client_secret=abc123" \
--data-urlencode "refresh_token=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImFkNDEwYzQwOWExNDUzMThhYzJlYzNiNTZhZjllODZhYjE4ZDgwYjZiMGVjYWM5MWViMjk5NDk3ODZkNDY1NWVmMzgwOWIwMTI0ZjYxNjY3In0.eyJhdWQiOiJteWF3ZXNvbWVhcHAiLCJqdGkiOiJhZDQxMGM0MDlhMTQ1MzE4YWMyZWMzYjU2YWY5ZTg2YWIxOGQ4MGI2YjBlY2FjOTFlYjI5OTQ5Nzg2ZDQ2NTVlZjM4MDliMDEyNGY2MTY2NyIsImlhdCI6MTQ5MTI0MjgyMywibmJmIjoxNDkxMjQyODIzLCJleHAiOjE0OTEyNDY0MjMsInN1YiI6IiIsInNjb3BlcyI6WyJiYXNpYyIsImVtYWlsIl19.J1M78wgFD62rSX79dpU38CDEbzoPl1eheX8B9Ul4qP6SB-eKGg57C2jjpAPKtgKLTyytyLTODcbdPYRrsgMfVBMD3TcGHuoHpcxOsTznhT1_6DnC-YDItFq2sj2GPQgErZma7K42lc949Zn0Jr5zYn2bWNJyozshvaGGyjYwnCE"*/


curl -X "POST" "http://localhost:8765/cake-logs/api/cloud-logs/remote-log.json" \
-H "Content-Type: application/x-www-form-urlencoded" \
-H "Accept: 1.0" \
--data-urlencode "client_id=9dph3glnk6wpqqdk6bmnp4pmv" \
--data-urlencode "client_secret=b68pist8qoyxmxoxm8vxwxoiwznz48bu6ph6ibvb73rtohsc7h"
