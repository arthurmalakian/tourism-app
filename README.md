# Portal de Consulta de Passagens

Verifique a disponibilidade de passagens de ônibus
intermunicipais usando a API da [Quero Passagem](https://queropassagem.com.br/)


## Instalação

### Utilizando Sail
#### Pré-requisitos

- [Composer 2.5.^](https://getcomposer.org/)
- [Docker 20.10.^](https://www.docker.com/)
- [Docker-compose 1.25.^](https://docs.docker.com/compose/gettingstarted/)

Instale as dependencias do PHP
```bash
  composer install

```
Construa e suba os containers da aplicação
```bash
  ./vendor/bin/sail build
  ./vendor/bin/sail up -d
```
Instale as dependencias do front-end e compile os assets
```bash
  ./vendor/bin/sail exec laravel.test npm install
  ./vendor/bin/sail exec laravel.test npm run build
```

Para parar os containers utilize o comando abaixo
```bash
  ./vendor/bin/sail down
```
    
    
## Autor

- [Arthur Sérvulo](https://github.com/arthurmalakian)

