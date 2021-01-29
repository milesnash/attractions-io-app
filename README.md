# entity-vs-value-object

### setup

```bash
$ docker-compose up -d
$ docker exec -it `docker ps -q -f "name=entity-vs-value-object"` composer install -n
```

### run tests

```bash
$ docker exec -it `docker ps -q -f "name=entity-vs-value-object"` composer run test
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
