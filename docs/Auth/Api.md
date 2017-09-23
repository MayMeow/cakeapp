# Api Authentication and authorization

## Authorize application

If you want to allow connect to api.

```php
// at the end of beforeFilter method
return $this->_authroizeApplication($this->request, $this->response);
```

## Authorization with token

Authorization with existing token. To get token you have to register for it with user credentials

```php
// at the end of beforeFilter method
return $this->_authorizeWithToken($this->request, $this->response, $this->_getAuthApplication($this->request, $this->response));
```

## Authorization with User credentials

Authenticate User with credentials.

```php
// at the end of beforeFilter method
return $this->_authenticateUser($this->request, $this->response, $this->_getAuthApplication($this->request, $this->response));
```