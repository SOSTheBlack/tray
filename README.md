<p align="center"><a href="https://laravel.com" target="_blank"><img src=".github/imgs/logo_tray_site-svg.png" width="100" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Test Tray

![img.png](.github/imgs/macro_diagram.png)

## Instalação

Você pode instalar as dependências do aplicativo navegando até o diretório do aplicativo e executando o seguinte comando. 

Este comando usa um pequeno contêiner Docker contendo PHP e Composer para instalar as dependências da aplicação: 

````shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
````

Obs: O docker deve estar ligado para rodar o comando acima, caso contrário dará erro de execução.

Crie um cópia do arquivo .env.example atravez do comando abaixo

````shell
cp .env.example .env
````

Com as depêndencias instaladas e o .env criado é hora de finalmente é hora de iniciar o [laravel Sail](https://laravel.com/docs/10.x/sail)

````shell
./vendor/bin/sail up
````

No entanto, em vez de digitar repetidamente vendor/bin/sailpara executar comandos do Sail, você pode configurar um alias de shell que permita executar os comandos do Sail com mais facilidade:

````shell
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
````

Para garantir que isso esteja sempre disponível, você pode adicioná-lo ao arquivo de configuração do shell em seu diretório inicial, como `~/.zshrcou` e `~/.bashrc`, em seguida, reiniciar o shell.

Depois que o alias do shell tiver sido configurado, você poderá executar comandos Sail simplesmente digitando `sail`. O restante dos comandos desta documentação assumirá que você configurou este alias.

