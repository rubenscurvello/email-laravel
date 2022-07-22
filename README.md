1 - composer install
2 - .env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=ad505cb86e548a
MAIL_PASSWORD=50d92f16173050
MAIL_ENCRYPTION=tls

3 - php artisan serve

4 - curl exemplo Method Post 

curl --location --request POST 'http://127.0.0.1:8001/api/email' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
    "body" : "teste",
    "to" : "rubens.curvello@hotmail.com",
    "subject": "assunto"
}'