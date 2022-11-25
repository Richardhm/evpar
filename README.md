<p>1º git clone https://github.com/Richardhm/evpar.git</p>
<p>2º cd evpar</p>
<p>3º Renomear o arquivo .env.example para .env
<p>4º Configurar o arquivo .env DB_DATABASE=evpar</p>
<p>5º Criar o BD evpar => utf8mb4_unicode_ci</p>
<p>6º Rodar as migrations junto com o seeder: php artisan migrate --seed</p>
<p>7º php artisan key:generate</p>
<p>8º php artisan server</p>
<p>9º Quiser já logar como gestor: gestor@evpar.com.br | Senha: 12345678</p>
<p>10º Caso queira cadastrar um administrador: localhost:8000/register</p>
