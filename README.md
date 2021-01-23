# attractions-io-app

### setup

```bash
$ docker-compose up -d
$ docker exec -it `docker ps -q -f "name=attractions-io-app"` composer install -n
```

### run tests

```bash
$ docker exec -it `docker ps -q -f "name=attractions-io-app"` composer run test
```

### teardown

1. Stop/remove container
    ```bash
    $ docker-compose down
    ```

1. Remove everything (images and volume)
    ```bash
    $ docker-compose down --rmi all -v
    ```
