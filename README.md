Buat Database dulu, setelah itu buka terminal
<ol>
<li>Clone dulu</li>
<li>lalu cd (nama hasil clone)</li>
<li>composer install</li>
<li>cp .env.example .env</li>
<li>php artisan key:generate</li>
<li>php artisan migrate:fresh --seed</li>
</ol>