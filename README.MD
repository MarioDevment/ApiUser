#Puesta en marcha

    composer install

Configurar database en .env 

    DATABASE_URL=mysql://root:root@127.0.0.1:3306/db_users

Crear usuario y codificar password con: 

    php bin/console security:encode-password


Crear certificados en base al JWT_PASSPHRASE del .env:

    mkdir config/jwt
    openssl genrsa -out config/jwt/private.pem -aes256 4096
    openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
    
solicitar el token:

    curl -X POST -H "Content-Type: application/json" http://localhost:8000/api/login -d '{"username":"user", "password":"pass"}'
    
probar acceso:

    curl -H "Content-Type: application/json" -H "Authorization: Bearer ReMPlaZarcOnToKeN" http://localhost:8000/api

### ERROR (Symfony y JWT)

    {"code":401,"message":"JWT Token not found"}

Revisar configuración apache, en la raiz del virtualhost (no en el directorio) agregar.

    SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1
