# Leaseweb-ERP

Minimum requirements to run the project:
- Command line interface 
- Docker 17.04+ (check out installation instruction [here](https://docs.docker.com/get-docker/))
- git version control system installed
- Root privilege in Unix-based machines 
- Web browser

First, clone the project with
```
$ git clone https://github.com/amir-pasha/leaseweb-erp.git
```

Go to the core directory where you cloned the project:
```
$ cd leaseweb-erp/core
```
copy environment variables according to .env.example
```
$ cp .env.example .env
```
Use the following command to start the services
```
$ docker-compose up
```
Unix-based systems such as Ubuntu may need to run this command under root privilege.
So add sudo. It may take some time to pull the images from docker-hub. After pulling is completed,
you should see the following log output to the screen:
```
core_1  |
core_1  |    INFO  Server running on [http://0.0.0.0:80].
core_1  |
core_1  |   Press Ctrl+C to stop the server
core_1  |
```
Open another terminal window/tab and go to the container where Laravel application 
is being served by:
```
$ docker-composer exec core bash
```
Migrate the database with:
```
root@leaseweb-core:/app# php artisan migrate  
```
If you would like to seed some records run the following command. It will add 30 
fake records to the database.
```
root@leaseweb-core:/app# php artisan db:seed
```
In a web browser, open `http://127.0.0.1:8001/servers`. You should see a table including
existing data from database. To create new record navigate to 
`http://127.0.0.1:8001/servers/create`.


## Notes:
Docker images:
- MySQL is run based on official docker image
- Laravel is served on a customized image `avazifehdoust/php8-fpm`. See Dockerfile on the root of 
the project.
  
## Recommendations:
- Full test coverage are ignored due to time limitation   
- UI can definitely be improved
- As complexity grows, frontend can be served with frameworks such as Vue.js and React.js. 
